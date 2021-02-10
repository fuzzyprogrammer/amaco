<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeliveryNote;
use App\Models\DeliveryNoteDetail;
use Illuminate\Http\Request;

class DeliveryNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryNotes = DeliveryNote::all();
        $data = [
            $deliveryNotes->map(function($deliveryNote){
                return[
                    $deliveryNote,
                    $deliveryNote->deliveryNoteDetail,
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
        return($data);

        $deliveryNote = DeliveryNote::create($data);
        if ($data['delivery_note_details']){
            $data['delivery_note_details']->map(function ($deliveryNoteDeatilData){
                DeliveryNoteDetail::create($deliveryNoteDeatilData);
            });
        }

        return response()->json($deliveryNote, $deliveryNote->deliveryNoteDetail);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryNote $deliveryNote)
    {
        $data = [
            $deliveryNote,
            $deliveryNote->deliveryNoteDetail,
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryNote $deliveryNote)
    {
        $data = $request->all();
        $deliveryNote->update($data);

        return response()->json($deliveryNote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNote $deliveryNote)
    {
        $deliveryNote->delete();

        return response()->json(['msg'=>"Delivery Note with id: ".$deliveryNote->id." has successfully Deleted"]);
    }
}
