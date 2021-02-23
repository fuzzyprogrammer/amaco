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
        $delivery_notes_details = DeliveryNoteDetail::all();
        $data = [
            $delivery_notes_details->map(function ($delivery_notes_detail) {
                return [
                    $delivery_notes_detail,
                    $delivery_notes_detail->product,
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

        $delivery_notes_detail = DeliveryNoteDetail::create($data);

        return response()->json($delivery_notes_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryNoteDetail $delivery_notes_detail
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryNoteDetail $delivery_notes_detail)
    {
        $data = [
            $delivery_notes_detail,
            $delivery_notes_detail->deliveryNote,
            $delivery_notes_detail->product,
            $delivery_notes_detail->deliveryNote->quotation,
            // $delivery_notes_detail->deliveryNote->quotation->party,
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryNoteDetail $delivery_notes_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryNoteDetail $delivery_notes_detail)
    {
        $data = $request->json()->all();
        $delivery_notes_detail->update($data);

        return response()->json($delivery_notes_detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryNoteDetail $delivery_notes_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNoteDetail$delivery_notes_detail)
    {
        $delivery_notes_detail->delete();

        return response()->json(['msg' => "Delivery Note Detail with id: " .$delivery_notes_detail->id . " has successfully Deleted"]);
    }
}
