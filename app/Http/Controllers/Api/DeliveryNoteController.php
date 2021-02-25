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

     public function getCurrentDeliveryYear()
    {
        return substr(date('Y'), 2);
    }

    public function getLastDeliveryNo()
    {
        $deliverynote = DeliveryNote::latest('created_at')->first();
        if ($deliverynote) {
            $latest_delivery_no = $deliverynote->delivery_no ? $deliverynote->delivery_no : 0;
            return ($latest_delivery_no);
        } else {
            return ('AMDLV-' . $this->getCurrentDeliveryYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getDeliveryNo()
    {
        $latest_delivery_no = $this->getLastDeliveryNo();
        $last_year = substr($latest_delivery_no, 6, 2);
        $current_year = $this->getCurrentDeliveryYear();
        // dd([$last_year, $current_year]);
        if ($current_year != $last_year) {
            return ('AMDLV-' . $current_year . '-' . sprintf("%04d", 1));
        } else {
            return ('AMDLV-' . $current_year . '-' . sprintf("%04d", ((int)substr($this->getLastDeliveryNo(), 9)) + 1));
        }
    }


    public function index()
    {
        $deliveryNotes = DeliveryNote::orderBy('created_at','DESC')->get();

        $data = $deliveryNotes->map(function($deliveryNote){
            return[
                $deliveryNote,
                $deliveryNote->deliveryNoteDetail,
            ];
        });


        return response()->json($deliveryNotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'quotation_id' => $request->quotation_id,
            'delivery_number' => $this->getDeliveryNo(),
            'po_number' => $request->po_number,
            'delivery_date' => $request->delivery_date,
        ];

        $deliveryNote = DeliveryNote::create($data);

        foreach($request->delivery_note_details as $deliveryNoteDetail){
            $deliveryNoteDetailData = [
                'delivery_note_id' => $deliveryNote->id,
                'product_id' => $deliveryNoteDetail['product_id'],
                'delivered_quantity' => $deliveryNoteDetail['delivered_quantity'],
            ];
            $deliveryNoteDetails = DeliveryNoteDetail::create($deliveryNoteDetailData);
        };

        // return response->json(['msg'=>"successfully added"]);
        return response("Success");
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
            $deliveryNote->deliveryNoteDetail->map(function ($deliveryNoteDetailItem){
                return $deliveryNoteDetailItem->showDeliveredNoteDetail($deliveryNoteDetailItem->id);
            }),
            $deliveryNote,
            $deliveryNote->quotation,
            $deliveryNote->quotation->contact,
            $deliveryNote->quotation->party,

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
