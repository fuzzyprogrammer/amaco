<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdvancePayment;
use App\Models\Expense;
use App\Models\PaymentAccount;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AdvancePaymentStatementController extends Controller
{

    public function getExpenseData($payment_account_id,  $to_date, $from_date = null)
    {

        $temp = new Collection();
        $temp = Expense::where('payment_account_id', $payment_account_id)
            ->whereBetween('paid_date', [$from_date . ' ' . '00:00:00', $to_date . ' ' . '23:59:59'])->get();
        return $temp;
    }

    public function getAdvancePaymentData($payment_account_id,  $to_date, $from_date = null)
    {
        $temp = new Collection();
        $temp = AdvancePayment::where('payment_account_id', $payment_account_id)
            ->whereBetween('received_date', [$from_date . ' ' . '00:00:00', $to_date . ' ' . '23:59:59'])->get();
            return $temp;
    }

    public function statement(Request $request)
    {
        $paymentAccount = PaymentAccount::where('id', intval($request['payment_account_id']))->first();

        if (!$paymentAccount) {
            return response('No paymentAccount exists by this id', 500);
        }

        // -----------------------------------
        $paymentAccountOpeningBalance = floatval(0);

        $oldExpenseCollection = $this->getExpenseData($paymentAccount->id, $request['from_date']);
        $oldAdvancePaymentCollection = $this->getAdvancePaymentData($paymentAccount->id, $request['from_date']);
        $oldData = $oldExpenseCollection->merge($oldAdvancePaymentCollection);
        if (!$oldData) {
            return response()->json(['msg' => "There are no entries between" . $request['from_date'] . " to " . $request['from_date']], 400);
        }
        $oldData = $oldData->sortBy('created_at');

        foreach ($oldData as $key => $item) {
            if ($item['paid_date']) {
                $paymentAccountOpeningBalance -= floatVal($item['amount']);
            }

            if ($item['narration']) {
                $paymentAccountOpeningBalance += floatVal($item['amount']);
            }
        }
        // ------------------------------------


        $expenseCollection = $this->getExpenseData($paymentAccount->id, $request['to_date'], $request['from_date']);

        $advancePaymentCollection = $this->getAdvancePaymentData($paymentAccount->id, $request['to_date'], $request['from_date']);
        $data = $expenseCollection->merge($advancePaymentCollection);
        $data = $data->sortBy('created_at');

        $data && ($datas['data'] = $data->map(function ($item) {
            if ($item->paid_date) {
                $item['date'] = $item->created_at;
                $item['code_no'] = $item->transaction_id;
                $item['description'] = $item->description;
                $item['debit'] = null;
                $item['credit'] = $item->amount;
                return [$item];
            }

            if ($item->received_date) {
                $item['date'] = $item->created_at;
                $item['code_no'] = null;
                $item['description'] = $item->narration;
                $item['credit'] = null;
                $item['debit'] = $item->amount;
                return [$item];
            }
        }));

        !$data && $datas['data'] = null;
        $datas['opening_balance'] = $paymentAccountOpeningBalance;
        $datas['name'] = $paymentAccount->name;
        // $datas['credit_days'] = $paymentAccount->credit_days;
        $datas['from_date'] = $request['from_date'];
        $datas['to_date'] = $request['to_date'];

        return response()->json([$datas]);
    }
}
