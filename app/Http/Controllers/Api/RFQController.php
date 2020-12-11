<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RFQ;
use App\Models\RFQDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RFQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfqs = RFQ::all();
        return response()->json($rfqs, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'requested_date' => 'required',
            'require_date' => 'required',
            'party_id' => 'required',
            'user_id' => 'required',
        ];


        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all() , $rules, $messages);
        $errors = $validator->errors();
        foreach ($errors as $error) {
            echo $error;
        }

        $rfq = RFQ::create($request->all());

        return response()->json($rfq, 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function show(RFQ $rfq)
    {
    //     $rfq_details = RFQDetails::where('rfq_id',$rfq->id)->get();
    //     return response()->json([
    //         'rfq' => $rfq,
    //         'rfq_details' => $rfq_details
    // ], 200);
        $rfq_detail = DB::table('r_f_q_s')
        ->join('r_f_q_details', 'r_f_q_s.id','=', 'r_f_q_details.rfq_id')
        ->where(['r_f_q_details.rfq_id' => $rfq])
        ->get();
        dd($rfq_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RFQ $rfq)
    {
        $rules = [
            'requested_date' => 'required',
            'require_date' => 'required',
            'party_id' => 'required',
            'user_id' => 'required',
        ];


        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $errors = $validator->errors();
        foreach ($errors as $error) {
            echo $error;
        }

        $rfq->update($request->all());

        return response()->json($rfq, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFQ $rfq)
    {
        $res = $rfq->delete();
        if ($res) {
            return (['msg' => 'RFQ' . ' ' . $rfq->id . ' is successfully deleted']);
        }
    }
}
