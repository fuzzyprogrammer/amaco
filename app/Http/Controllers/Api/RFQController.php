<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use App\Models\RFQ;
use App\Models\RFQDetails;
use Exception;
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
        $data =[
            $rfqs->map(
                function($rfq){
                    $party = Party::find($rfq->party_id);
                    return [
                        'id' => $rfq->id,
                        'requested_date' => $rfq->requested_date,
                        'require_date' => $rfq->require_date,
                        'party_id' => $rfq->party_id,
                        'party_fname' => $party ? $party->fname : $party,
                        'party_lname' => $party ? $party->lname : $party,
                        'user_id' => $rfq->user_id,
                        'created_at' => $rfq->created_at,
                        'updated_at' => $rfq->updated_at,

                    ];
                }
            ),
        ];
        return response()->json($data[0], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'requested_date' => 'required',
        //     'require_date' => 'required',
        //     'party_id' => 'required',
        //     'user_id' => 'required',
        // ];


        // $messages = [
        //     'required' => 'The :attribute field is required.',
        // ];

        // $validator = Validator::make($request->all() , $rules, $messages);
        // $errors = $validator->errors();
        // return response()->json($errors);
        // foreach ($errors as $error) {
        //     echo $error;
        // }

        // [
        //     "party_id":1,
        //     "requested_date":"2018-12-21",
        //     "required_date":"2018-12-21",
        //     "rfq_details":
        //     [
                // {
                //     "id": 1,
                //     "quantity": 2,
                //     "descriptionss": "dfdgddsafdsaf",
                // }
        //     ],
        // ]

        // $rfq = RFQ::create($request->all());

        // return response()->json($rfq, 200);
        $data = $request->json()->all();
        // return $data;

        try{

            $rfq = RFQ::create([
                'requested_date' => $data['requested_date'],
                'require_date' => $data['require_date'],
                'party_id' => $data['party_id'],
            ]);

            global $_rfq_id;
            $_rfq_id = $rfq['id'];

            foreach ($data['rfq_details'] as $rfq_detail) {
                $_rfq_detail = RFQDetails::create([
                    'product_id' => $rfq_detail['id'],
                    'description' => $rfq_detail['descriptionss'],
                    'quantity_required' => $rfq_detail['quantity'],
                    'rfq_id' => $_rfq_id,
                ]);

            }

            return response()->json(['msg' => 'successfully added']);

        }catch(Exception $e){
            return $e;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFQ  $rfq
     * @return \Illuminate\Http\Response
     */
    public function show($rfq)
    {
        $_rfq = RFQ::findOrFail($rfq);

        $rfq_detail = DB::table('r_f_q_s')
        ->leftJoin('r_f_q_details', 'r_f_q_s.id','=', 'r_f_q_details.rfq_id')
        ->where('r_f_q_s.id',$rfq)
        ->get();

        $data = [
            'id' => $_rfq->id,
            'requested_date' => $_rfq->requested_date,
            'require_date' => $_rfq->require_date,
            'party_id' => $_rfq->party_id,
            'user_id' => $_rfq->user_id,
            'created_at' => $_rfq->created_at,
            'updated_at' => $_rfq->updated_at,
            'rfq_details' => $rfq_detail,
        ];
        // dd($data);
        return response()->json([
            // $rfq_,
            $data
        ]);
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
