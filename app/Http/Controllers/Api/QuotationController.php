<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Exception;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrentYear()
    {
        return substr(date('Y'), 2);
    }

    public function getLastQuotationNo()
    {
        $quotation = Quotation::where('transaction_type','sale')
            ->latest('created_at')->first();
        if($quotation){
        $latest_quotation_no = $quotation->quotation_no ? $quotation->quotation_no : 0;
        return($latest_quotation_no);
        }else{
            return('AMCT-' . $this->getCurrentYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getLastPONo()
    {
        $quotation = Quotation::where('transaction_type', 'purchase')
            ->latest('created_at')->first();
        if($quotation){
        $latest_po_number = $quotation->po_number ? $quotation->po_number : 0;
        return($latest_po_number);
        }else{
            return('AMPO-' . $this->getCurrentYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getQuotationNo()
    {
        $latest_quotation_no = $this->getLastQuotationNo();
        $last_year = substr($latest_quotation_no, 5, 2);
        $current_year = $this->getCurrentYear();
        // dd([$last_year, $current_year]);
        if($current_year != $last_year){
            return ('AMCT-'.$current_year.'-'.sprintf("%04d",1));
        }else{
            return ('AMCT-' . $current_year . '-' . sprintf("%04d",((int)substr($this->getLastQuotationNo(),9))+1));
        }
    }

    public function getPONo()
    {
        $latest_po_number = $this->getLastPONo();
        $last_year = substr($latest_po_number, 5, 2);
        $current_year = $this->getCurrentYear();
        // dd([$last_year, $current_year]);
        if($current_year != $last_year){
            return ('AMPO-'.$current_year.'-'.sprintf("%04d",1));
        }else{
            return ('AMPO-' . $current_year . '-' . sprintf("%04d",((int)substr($this->getLastPONo(),9))+1));
        }
    }

    public function index() // Purchase List
    {
        $quotations = Quotation::where(['status'=>'New', 'transaction_type' => 'purchase'])
        ->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('invoices')
                ->whereRaw('invoices.quotation_id = quotations.id');
        })->orderBy('created_at', 'DESC')
        ->get();
        // $quotations = Quotation::where('status','=','New')->orderBy('created_at','DESC')->get();
        $quotations_data = [
            $quotations->map(
                function ($quotation) {
                    $data =[
                        'id' => $quotation->id,
                        'quotation_no' => $quotation->quotation_no,
                        'created_at' => $quotation->created_at,
                        'updated_at' => $quotation->updated_at,
                        'status' => $quotation->status,
                        'total_value' => $quotation->total_value,
                        'party_id' => $quotation->party_id,
                        "contact_id" => $quotation->contact_id,
                        "contact" => $quotation->contact,
                        "party" => $quotation->party,
                        "vat_in_value" => $quotation->vat_in_value,
                        "net_amount" => $quotation->net_amount,
                        "transaction_type" => $quotation->transaction_type,
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
                                "remark" => $quotation_detail->remark,
                            ];
                        }),
                    ];
                    return $data;
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
            $datas = [
                'party_id' => $data['party_id'],
                'rfq_id' => $data['rfq_id'],

                'status' => 'New',
                'total_value' => $data['total_value'],
                'net_amount' => $data['net_amount'],
                'vat_in_value' => $data['vat_in_value'],
                'discount_in_p' => $data['discount_in_p'],
                'validity' => $data['validity'],
                'payment_terms' => $data['payment_terms'],
                'warranty' => $data['warranty'],
                'delivery_time' => $data['delivery_time'],
                'inco_terms' => $data['inco_terms'],

                'contact_id' => $data['contact_id'],
                'transaction_type' => $data['transaction_type'],
            ];

            if ($data['transaction_type'] == 'sale') {
                return response("I am in sale");
                $datas['quotation_no']=$this->getQuotationNo();
            }elseif($data['transaction_type'] == 'purchase'){
                $datas['po_number']=$this->getPONo();
            }else{
                $datas['quotation_no'] = null;
                $datas['po_number'] =null;
            }

        $quotation = Quotation::create($datas);

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
            'remark' => $quotation_detail['remark'],
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
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);
        $data = [
            "id" => $quotation->id,
            'quotation_no' => $quotation->quotation_no,
            "party_id" => $quotation->party_id,
            "rfq_id" => $quotation->rfq_id,
            "status" => $quotation->status,
            "total_value" => $quotation->total_value ,
            "discount_in_p" => $quotation->discount_in_p ,
            "vat_in_value" => $quotation->vat_in_value ,
            "net_amount" => $quotation->net_amount ,
            "created_at" => $quotation->net_amount,
            "updated_at" => $quotation->updated_at,
            "validity" => $quotation->validity,
            "payment_terms" => $quotation->payment_terms,
            "warranty" => $quotation->warranty,
            "delivery_time" => $quotation->delivery_time,
            "inco_terms" => $quotation->inco_terms,
            "po_number" => $quotation->po_number,
            "transaction_type" => $quotation->transaction_type,
            "contact" => $quotation->contact,
            "party" => $quotation->party,
            "party"=> $quotation->party,
            "rfq" => $quotation->rfq,
            "quotation_details" => $quotation->quotationDetail->map(function ($quotation_detail){
                return[
                "id"=> $quotation_detail->id,
                "total_amount"=> $quotation_detail->total_amount,
                "analyse_id"=> $quotation_detail->analyse_id,
                "product_id"=> $quotation_detail->product_id,
                "product" => $quotation_detail->product,
                "purchase_price"=> $quotation_detail->purchase_price,
                "description"=> $quotation_detail->description,
                "quantity"=> $quotation_detail->quantity,
                "margin"=> $quotation_detail->margin,
                "sell_price"=> $quotation_detail->sell_price,
                "remark"=> $quotation_detail->remark,
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
    public function update(Request $request, $id)
    {
        $quotation = Quotation::findOrFail($id);

        $quotation->update(['status'=>$request->status]);
        // $quotation->update(['po_number'=>$this->getPONo()]);
        return response()->json($quotation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);

        $res = $quotation->delete();
        if ($res) {
            return (['msg' => 'Quotation' . ' ' . $quotation->id . ' is successfully deleted']);
        }
    }

    public function invoice_list()
    {
        $quotations = Quotation::where('status','=','po')->orderBy('created_at', 'DESC')->get();
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
                        'quotation_no' => $quotation->quotation_no,
                        "vat_in_value" => $quotation->vat_in_value,
                        "net_amount" => $quotation->net_amount,
                        'discount_in_%' => $quotation['discount_in_%'],
                        "party" => $quotation->party,
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
                                "remark" => $quotation_detail->remark,
                            ];
                        }),
                    ];
                }
            ),
        ];
        return response()->json($quotations_data[0], 200);
    }

    public function history()
    {
        $quotations = Quotation::whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('invoices')
            ->whereRaw('invoices.quotation_id = quotations.id');
        })->orderBy('created_at', 'DESC')
        //->where('status', '=', 'po')
        ->get();

        return response()->json($quotations);
    }

    public function salesList()
    {
        $quotations = Quotation::where(['status' => 'New', 'transaction_type' => 'sale'])
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('invoices')
                    ->whereRaw('invoices.quotation_id = quotations.id');
            })->orderBy('created_at', 'DESC')
            ->get();
        // $quotations = Quotation::where('status','=','New')->orderBy('created_at','DESC')->get();
        $quotations_data = [
            $quotations->map(
                function ($quotation) {
                    return [
                        'id' => $quotation->id,
                        'quotation_no' => $quotation->quotation_no,
                        'created_at' => $quotation->created_at,
                        'updated_at' => $quotation->updated_at,
                        'status' => $quotation->status,
                        'total_value' => $quotation->total_value,
                        'party_id' => $quotation->party_id,
                        "contact_id" => $quotation->contact_id,
                        "contact" => $quotation->contact,
                        "party" => $quotation->party,
                        "vat_in_value" => $quotation->vat_in_value,
                        "net_amount" => $quotation->net_amount,
                        "transaction_type" => $quotation->transaction_type,
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
                                "remark" => $quotation_detail->remark,
                            ];
                        }),
                    ];
                }
            ),
        ];
        return response()->json($quotations_data[0], 200);
    }


}
