<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountStatementController extends Controller
{

    public function accountStatement(Request $request)
    {
        $party = Party::where('id' , intval($request['party_id']))->first();
        if(!$party){
            return response('No party exists by this id', 400);
        }
        $data = DB::table('parties')
            ->join('invoices','invoices.party_id','=','parties.id')
            ->join('receipts', 'receipts.party_id','=','parties.id')
            ->where('parties.id',$party->id)
            ->whereBetween('invoices.created_at',[$request['from_date'], $request['to_date']])
            ->orWhereBetween('receipts.created_at',[$request['from_date'], $request['to_date']])
            ->select('parties.*',"parties.id as party_id", 'invoices.*','invoices.id as invoice_id', 'receipts.*', 'receipts.id as receipt_id')
            ->orderBy('invoices.created_at')
            ->orderBy('receipts.created_at')
            ->get();


        return response()->json($data);
    }
}
