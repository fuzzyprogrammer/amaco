<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\payment_account;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment_account  $payment_account
     * @return \Illuminate\Http\Response
     */
    public function show(payment_account $payment_account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment_account  $payment_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment_account $payment_account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment_account  $payment_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment_account $payment_account)
    {
        //
    }
}
