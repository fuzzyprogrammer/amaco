<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Exception;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::all();
        $quotations_data = [
            $quotations->map(
                function ($quotation) {
                    return [
                        'id' => $quotation->id,
                        'created_at' => $quotation->created_at,
                        'updated_at' => $quotation->updated_at,
                        'status' => $quotation->status,
                        'total_value' => $quotation->total_value,
                        'party_id' => $quotation->party_id,
                        "party" => $quotation->party,
                        "vat_in_value" => $quotation->vat_in_value,
                        "net_amount" => $quotation->net_amount,
                        'discount_in_%' => $quotation['discount_in_%'],
                        'quotation_details' => $quotation->quotationDetail->map(function ($quotation_detail) {
                            $quotation_detail = QuotationDetail::where('id', '=', $quotation_detail->id)->first();
                            return [
                                "id" => $quotation_detail['id'],
                                "created_at" => $quotation_detail->created_at,
                                "updated_at" => $quotation_detail->updated_at,
                                "product_id" => $quotation_detail->product_id,
                                "product" => array($quotation_detail->product),
                                "description" => $quotation_detail->description,
                                "quantity" => $quotation_detail->quantity,
                                "total_amount" => $quotation_detail->total_amount,
                                "analyse_id" => $quotation_detail->analyse_id,
                                "purchase_price" => $quotation_detail->purchase_price,
                                "margin" => $quotation_detail->margin,
                                "sell_price" => $quotation_detail->sell_price,
                            ];
                        }),
                    ];
                }
            ),
        ];
        return response()->json($quotations_data[0], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // return $request;

        try {

        $quotation = Quotation::create([
            'party_id' => $data['party_id'],
            'rfq_id' => $data['rfq_id'],
            'status' => 'New',
            'total_value' => $data['total_value'],
            'net_amount' => $data['net_amount'],
            'vat_in_value' => $data['vat_in_value'],
            'discount_in_p' => $data['discount_in_p'],
        ]);

        global $quotation_id;
        $quotation_id = $quotation->id;
            // dd($request->quotation_details);
        foreach($data['quotation_details'] as $quotation_detail){
            QuotationDetail::create([
            'quotation_id' => $quotation_id,
            'total_amount' => $quotation_detail['total_amount'],
            'analyse_id' => null,
            'product_id' => $quotation_detail['product_id'],
            'purchase_price' => $quotation_detail['purchase_price'],
            'description' => $quotation_detail['description'],

            'quantity' => $quotation_detail['quantity_required'],
            'margin' => $quotation_detail['margin'],
            'sell_price' => $quotation_detail['sell_price'],
            ]);
        }
        return response()->json(['msg' => 'successfully added']);
        }

        catch(Exception $e){
            return $e;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {

        $data = [
            "id" => $quotation->id,
            "party_id" => $quotation->party_id,
            "rfq_id" => $quotation->rfq_id,
            "status" => $quotation->status,
            "total_value" => $quotation->total_value ,
            "discount_in_p" => $quotation->discount_in_p ,
            "vat_in_value" => $quotation->vat_in_value ,
            "net_amount" => $quotation->net_amount ,
            "created_at" => $quotation->net_amount,
            "updated_at" => $quotation->updated_at,
            "quotation_details" => $quotation->quotationDetail->map(function ($quotation_detail){
                return[
                "id"=> $quotation_detail->id,
                "total_amount"=> $quotation_detail->total_amount,
                "analyse_id"=> $quotation_detail->analyse_id,
                "product_id"=> $quotation_detail->product_id,
                "purchase_price"=> $quotation_detail->purchase_price,
                "description"=> $quotation_detail->description,
                "quantity"=> $quotation_detail->quantity,
                "margin"=> $quotation_detail->margin,
                "sell_price"=> $quotation_detail->sell_price,
                "created_at"=> $quotation_detail->created_at,
                "updated_at"=> $quotation_detail->updated_at
                ];
            })

        ];
        return response()->json([
            $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
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

        // $validator = Validator::make($request->all(), $rules, $messages);
        // $errors = $validator->errors();
        // foreach ($errors as $error) {
        //     echo $error;
        // }

        //                             //
        // $data = $request->json()->all();

        // try {
        //     $quotation->update([
        //         // 'requested_date' => $data['requested_date'],
        //         // 'require_date' => $data['require_date'],
        //         'party_id' => $data['party_id'],
        //     ]);


        //     global $_quotation_id;
        //     $_quotation_id = $quotation['id'];

        //     foreach ($data['quotation_details'] as $quotation_detail) {
        //         $quotation_update_data = QuotationDetail::findOrFail($quotation_detail['id']);
        //         $_quotation_detail = $quotation_update_data->update([
        //             'product_id' => $quotation_detail['id'],
        //             'description' => $quotation_detail['descriptionss'],
        //             'quantity' => $quotation_detail['quantity'],
        //             'quotation_id' => $_quotation_id,
        //         ]);
        //     }

        //     return response()->json(['msg' => 'successfully updated']);
        // } catch (Exception $e) {
        //     return $e;
        // }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $res = $quotation->delete();
        if ($res) {
            return (['msg' => 'Quotation' . ' ' . $quotation->id . ' is successfully deleted']);
        }
    }
}
