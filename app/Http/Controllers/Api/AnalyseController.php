<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Analyse;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyse = Analyse::all();
        // dd($analyse);
        $analyse_data = $analyse->map(function($a){
            return [
                'id' => $a->id,
                'rfq_details_id' => $a->rfq_details_id,
                'rfq_detail' => $a->rfq_details,
                'description' => $a->description,
                'party_id' => $a->party_id,
                // 'party' => $a->rfq_details,
                'brand_name' => $a->brand_name,
                'unit_price' => $a->unit_price,
                'user_id' => $a->user_id,
                'created_at' => $a->created_at,
                'updated_at' => $a->updated_at,
            ];
        });

        return response()->json($analyse_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $analyse = Analyse::create($request->all());
        return response()->json($analyse);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function show(Analyse $analyse)
    {
            return response()->json([
                'id' => $analyse->id,
                'rfq_details_id' => $analyse->rfq_details_id,
                'rfq_details' => $analyse->rfq_details,
                'description' => $analyse->description,
                'party_id' => $analyse->party_id,
                // 'party' => $analyse->rfq_details->rfq->party,
                'brand_name' => $analyse->brand_name,
                'unit_price' => $analyse->unit_price,
                'user_id' => $analyse->user_id,
                'created_at' => $analyse->created_at,
                'updated_at' => $analyse->updated_at,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analyse $analyse)
    {
        $res = $analyse->update($request->all());
        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analyse  $analyse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analyse $analyse)
    {
        $analyse->delete();
        return response()->json("$analyse has been successfully deleted.");
    }
}
