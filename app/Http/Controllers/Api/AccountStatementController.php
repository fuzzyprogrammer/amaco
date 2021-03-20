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

    public function accountStatement(Request $request)
    {
        // return response()->json($request);
        $party = Party::where('id', intval($request['party_id']))->first();
        if (!$party) {
            return response('No party exists by this id', 400);
        }

        $invoiceCollection = $this->getInvoiceData($party->id, $request['to_date']);
        // $invoiceCollection = Invoice::where('party_id', $request['party_id'])
        //     ->whereBetween('created_at', [$request['from_date'] .' '. '00:00:00', $request['to_date'] . ' ' . '23:59:59'])
        //     ->get();

        $receiptCollection = new Collection();
        $receiptCollection = Receipt::where('party_id', $request['party_id'])
            ->whereBetween('created_at', [$request['from_date'] .' '.'00:00:00', $request['to_date'] .' '.'23:59:59'])
            ->get();

        $data = $invoiceCollection->merge($receiptCollection);
        $data = $data->sortBy('created_at');

        return response()->json($data);
    }
}
