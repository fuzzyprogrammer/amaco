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

    public function getAccountStatement(Request $request)
    {
        # code...
    }

    public function accountStatement(Request $request)
    {
        // return response()->json($request);
        $party = Party::where('id' , intval($request['party_id']))->first();
        if(!$party){
            return response('No party exists by this id', 400);
        }

        // $data = DB::table('parties')
        //     ->join('invoices','invoices.party_id','=','parties.id')
        //     ->join('receipts', 'receipts.party_id','=','parties.id')
        //     ->where('parties.id',$party->id)
        //     ->orWhereBetween('receipts.created_at',[$request['from_date'], $request['to_date']])
        //     ->select('parties.*',"parties.id as party_id", 'invoices.*','invoices.id as invoice_id', 'receipts.*', 'receipts.id as receipt_id')
        //     ->orderBy('invoices.created_at')
        //     ->orderBy('receipts.created_at')
        //     ->get();
        $invoiceCollection = new Collection();
        $invoiceCollection = Invoice::where('party_id',$request['party_id'])
            ->whereBetween('created_at',[$request['from_date'], $request['to_date']])
            ->get();

            $receiptCollection = new Collection();
            $receiptCollection = Receipt::where('party_id', $request['party_id'])
            ->whereBetween('created_at',[$request['from_date'], $request['to_date']])
            ->get();
        // return response($invoiceCollection);

            $data = $invoiceCollection->merge($receiptCollection);
        // foreach ($receiptCollection as $receipt) {
        // }

        return response()->json($data);
    }
}
