<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountStatementController extends Controller
{

    public function accountStatement(Request $request, Party $party)
    {
        return response('hahaha');
        // $data = DB::table('parties')
        //     ->join('invoices','invoices.party_id','=','parties.id')
        //     ->join('receipts', 'receipts.party_id','=','parties.id')
        //     ->where('id',$party->id)
        //     ->whereBetween('created_at',[$request->from_date, $request->to_date])
        //     ->orderBy('created_at')
        //     ->get();

        // return response()->json($data);
    }
}
