<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Party;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountStatementController extends Controller
{

    public function getInvoiceData($party_id,  $to_date, $from_date = null)
    {
        $temp = new Collection();
        $temp = Invoice::where('party_id', $party_id)
            ->whereBetween('created_at', [$from_date .' '. '00:00:00', $to_date . ' ' . '23:59:59'])->get();
        return $temp;
    }

    public function getReceiptData($party_id,  $to_date, $from_date = null)
    {
        $temp = new Collection();
        $temp = Receipt::where('party_id', $party_id)
            ->whereBetween('created_at', [$from_date . ' ' . '00:00:00', $to_date . ' ' . '23:59:59'])->get();
        return $temp;
    }

    public function accountStatement(Request $request)
    {
        // $request = $request[0];
        return response()->json($request);
        $party = Party::where('id', intval($request['party_id']))->first();
        if (!$party) {
            return response('No party exists by this id', 400);
        }

        // -----------------------------------
        $partyOpeningBalance = floatval($party->opening_balance);

        $oldInvoiceCollection = $this->getInvoiceData($party->id, $request['from_date']);
        $oldReceiptCollection = $this->getReceiptData($party->id, $request['from_date']);
        $oldData = $oldInvoiceCollection->merge($oldReceiptCollection);
        $oldData = $oldData->sortBy('created_at');

        foreach ($oldData as $key => $item ) {
            if ($item->has('total_value'))
            {
                $partyOpeningBalance += floatVal($item['total_value']);
            }

            if ($item->has('paid_amount'))
            {
                $partyOpeningBalance -= floatVal($item['paid_amount']);
            }
        }
        // ------------------------------------


        $invoiceCollection = $this->getInvoiceData($party->id, $request['to_date'], $request['from_date']);

        $receiptCollection = $this->getReceiptData($party->id, $request['to_date'], $request['from_date']);
        $data = $invoiceCollection->merge($receiptCollection);
        $data = $data->sortBy('created_at');
        $data->each(function ($item) {
            if($item->total_value){
                $item['date'] = $item->created_at;
                $item['code_no']= $item->invoice_no;
                $item['description']= "Sale";
                $item['debit']= $item->total_value;
                $item['credit'] = null;
                return $item;

            }

            if($item->paid_amount){
                $item['date'] = $item->created_at;
                $item['code_no']= $item->receipt_no;
                $item['description']= "Return";
                $item['credit']= $item->paid_amount;
                $item['debit'] = null;
                return $item;
            }
        });

        $data['opening_balance'] = $partyOpeningBalance;
        $data['firm_name'] = $party->firm_name;
        $data['credit_days'] = $party->credit_days;
        $data['from_date'] = $request['from_date'];
        $data['to_date'] = $request['to_date'];
        return response()->json($data);
    }
}
