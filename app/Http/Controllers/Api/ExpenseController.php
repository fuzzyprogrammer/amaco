<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ColumnData;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses which are not paid.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::where("status", "new")->orderBy('created_at', 'DESC')->get();
        $expenses->map(function ($expense) {
            return $expense->payment_account;
        });
        return response()->json($expenses);
    }

    // to get all paid expenses
    public function paid()
    {
        $expenses = Expense::where("status", 'verified')->orderBy('created_at', 'DESC')->get();
        $expenses->map(function ($expense) {
            return $expense->payment_account;
        });
        return response()->json($expenses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank_slip_path = null;
        if ($request->file('bank_slip')) {
            $bank_slip_path = $request->file('bank_slip')->move("expenses/bankSlip", $request->file('bank_slip')->getClientOriginalName());
        }

        if ($request->file('file_path')) {
            $filePath = $request->file('file_path')->move("expenses/filePath",  $request->file('file_path')->getClientOriginalName());
        }


        $expense = Expense::create([
            'created_by' => $request->created_by,
            'paid_date' => $request->paid_date,
            'paid_to' => $request->paid_to,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,
            'check_no' => $request->check_no,
            'transaction_id' => $request->transaction_id,
            'payment_account_id' => $request->payment_account_id,
            'description' => $request->description,
            'referrence_bill_no' => $request->referrence_bill_no,
            'tax' => $request->tax,
            'status' => $request->status,
            'paid_by' => $request->payment_account_id,
            'bank_ref_no' => $request->bank_ref_no,
            'bank_slip' => $request->file('bank_slip') ? $bank_slip_path : null,
            // 'bank_slip' =>  $path ,
            "account_category_id" => $request->account_category_id,
            "company_name" => $request->company_name ? $request->company_name : null,
            "file_path" => $filePath,

        ]);

        $tempArray = (array) json_decode($request->data, true);
        foreach ($tempArray as $column_data_) {
            $column_data = $column_data_;

            $column_type = $column_data['type'];
            if ($column_type != 'file') {
                $column_data_value = $column_data[$column_type];
            }
            $tempFile = "file" . $column_data['id'];
            if ($request->file($tempFile)) {
                $column_data_value = $request->file($tempFile)->move('expenses/files', $request->file($tempFile)->getClientOriginalName());
            }




            ColumnData::create([
                "expense_id" => $expense->id,
                "column_id" => $column_data['id'],
                "value" => $column_data_value ? $column_data_value : null,
            ]);
        }
        return response()->json(['msg' => "successfully added."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return response()->json([
            $expense,
            $expense->payment_account,
            $expense->column_data->map(function ($item) {
                if (File::exists(public_path($item->value))) {
                    $item['file'] = url($item->value);
                }
                return $item->column;
            }),
            'img' => $expense->img(),
            'referrenceImgUrl' => $expense->referrenceImg(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        // $request['is_paid'] = true;
        $expense->update($request->all());
        return response()->json($expense);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response()->json(['msg' => 'Expense ' . $expense . ' has been deleted.']);
    }
}
