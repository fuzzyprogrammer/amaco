<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\column;
use Illuminate\Http\Request;

class ColumnController extends Controller
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
     * @param  \App\Models\column  $column
     * @return \Illuminate\Http\Response
     */
    public function show(column $column)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\column  $column
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, column $column)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\column  $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(column $column)
    {
        //
    }
}
