<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeliveryNoteDetail;
use Illuminate\Http\Request;

class DeliveryNoteDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryNoteDetails = DeliveryNoteDetail::all();
        $data = [
            $deliveryNoteDetails->map(function ($deliveryNoteDetail) {
                return [
                    $deliveryNoteDetail,
                    $deliveryNoteDetail->product,
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $deliveryNoteDetail = DeliveryNoteDetail::create($data);

        return response()->json($deliveryNoteDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryNoteDetail  $deliveryNoteDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryNoteDetail $deliveryNoteDetail)
    {
        $data = [
            $deliveryNoteDetail,
            $deliveryNoteDetail->product,
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryNoteDetail  $deliveryNoteDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryNoteDetail $deliveryNoteDetail)
    {
        $data = $request->json()->all();
        $deliveryNoteDetail->update($data);

        return response()->json($deliveryNoteDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryNoteDetail  $deliveryNoteDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNoteDetail $deliveryNoteDetail)
    {
        $deliveryNoteDetail->delete();

        return response()->json(['msg' => "Delivery Note Detail with id: " . $deliveryNoteDetail->id . " has successfully Deleted"]);
    }
}
