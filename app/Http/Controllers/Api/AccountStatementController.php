<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;

class AccountStatementController extends Controller
{

    public function accountStatement(Request $request, Party $party)
    {
        

        return response()->json(['msg' => "haahhah"], 400);
    }
}
