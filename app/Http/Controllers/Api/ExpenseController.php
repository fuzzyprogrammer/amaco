<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ColumnData;
use App\Models\Expense;
use Illuminate\Http\Request;
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
        $expenses = Expense::where("is_paid", false)->orderBy('created_at', 'DESC')->get();
        return response()->json($expenses);
    }

    // to get all paid expenses
    public function paid()
    {
        $expenses = Expense::where("is_paid", true)->orderBy('created_at', 'DESC')->get();
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
        if($request->file('bank_slip')){
            $path = $request->file('bank_slip')->move(public_path("/expenses/bankSlip"));
            $temp = explode('/',$path);
            $dig = count($temp)-1;
            $new_path = $temp[$dig];
        }
        $expense = Expense::create([
            'created_by'=>$request->created_by,
            'paid_date'=>$request->paid_date,
            'paid_to'=>$request->paid_to,
            'amount'=>$request->amount,
            'payment_type'=>$request->payment_type,
            'check_no'=>$request->check_no,
            'transaction_id'=>$request->transaction_id,
            'payment_account_id'=>$request->payment_account_id,
            'description'=>$request->description,
            'referrence_bill_no'=>$request->referrence_bill_no,
            'tax'=>$request->tax,
            'status'=>$request->status,
            'bank_ref_no'=>$request->bank_ref_no,
            'bank_slip'=> $request->file('bank_slip') ? '/expenses/bankSlip/'.$new_path :"No file uploaded",
        ]);

        $tempArray = json_decode($request->data, true);
        foreach ((array)$tempArray as $column_data ) {
            // return response($column_data);
            $column_type = $column_data['type'];
            if($column_type == 'file'){
                $obj_column_data =(object) $column_data;
                $column_path = $obj_column_data->file('file')->move(public_path('expences/'.$expense->id));
                $column_data_value = $column_path;
            }else{
                $column_data_value = $column_data[$column_type];
            }
            ColumnData::create([
                "expense_id" => $expense->id,
                "column_id" => $column_data['column_id'],
                "value" => $column_data_value,
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
        $path = $expense->bank_slip;
        $imgUrl = url($path);
        return response()->json([
            $expense,
            $expense->payment_account,
            $expense->column_data->map(function($item){
                return $item->column;
            }),
            $imgUrl
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
        return response()->json(['msg' => 'Expense '.$expense.' has been deleted.']);
    }


}
