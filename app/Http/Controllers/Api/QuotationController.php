<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;
use App\Models\DeliveryNote;
use App\Models\DeliveryNoteDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function checkDeliveredProductQuantity($quotation_detail)
    // {
    //     $product_quantity = $quotation_detail->product->quantity;
    //     $product_id = $quotation_detail->product->id;
    //     $quotation_id = $quotation_detail->quotation->id;
    //     $deliveryNote = DeliveryNote::where('quotation_id',$quotation_id)->firstOrFail();
    //     $res = $deliveryNote->deliveryNoteDetail ?? $deliveryNote->deliveryNoteDetail->map(function($deliveryNoteD, $this->product_quantity,$this->product_id){
    //         if($deliveryNoteD->product_id == $product_id){
    //             if($product_quantity - $deliveryNoteD->quantity != 0){
    //                 return true;
    //             }else{
    //                 return false;
    //             }
    //         }
    //     });
    //     // dd($quotation_detail);
    //     return $res;
    // }

    public function getCurrentYear()
    {
        return substr(date('Y'), 2);
    }

    public function getCurrentMonth()
    {
        return date('m');
    }

    public function getLastQuotationNo()
    {
        $quotation = Quotation::where('transaction_type','sale')
            ->latest('created_at')->first();
        if($quotation){
        $latest_quotation_no = $quotation->quotation_no ? $quotation->quotation_no : 0;
        return($latest_quotation_no);
        }else{
            return('AMC-QT-' . $this->getCurrentYear() . '-' .$this->getCurrentMonth() . sprintf("%02d", 0));
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
            return('AMC-PO-' . $this->getCurrentYear() . '-' .$this->getCurrentMonth() . sprintf("%02d", 0));
        }
    }

    public function getLastSONo()
    {
        $quotation = Quotation::where('transaction_type', 'sale')
            ->latest('created_at')->first();
        if($quotation){
            $latest_sales_order_number = $quotation->sales_order_number ? $quotation->sales_order_number : 0;
        return($latest_sales_order_number);
        }else{
            return('ASON-' . $this->getCurrentYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getQuotationNo()
    {
        $latest_quotation_no = $this->getLastQuotationNo();
        $last_year = substr($latest_quotation_no, 7, 2);
        $last_month = substr($latest_quotation_no, 10, 2);
        $current_year = $this->getCurrentYear();
        $current_month = $this->getCurrentMonth();
        if($current_year != $last_year){
            return ('AMC-QT-'.$current_year . '-' . $current_month  . sprintf("%02d", 1));
        }else{
            if ($current_month != $last_month) {
                return ('AMC-QT-'.$current_year . '-' . $current_month  . sprintf("%02d", 1));
            }else{
                if(((int)substr($this->getLastQuotationNo(), 12) < 99)){
                    return ('AMC-QT-' . $current_year . '-' .$current_month. sprintf("%02d",((int)substr($this->getLastQuotationNo(),12))+1));
                }else{
                    return ('AMC-QT-' . $current_year . '-' .$current_month. sprintf("%03d",((int)substr($this->getLastQuotationNo(),12))+1));
                }
            }
        }
    }




    public function getPONo()
    {
        $latest_po_number = $this->getLastPONo();
        $last_year = substr($latest_po_number, 7, 2);
        $last_month = substr($latest_po_number, 10, 2);
        $current_year = $this->getCurrentYear();
        $current_month = $this->getCurrentMonth();
        if ($current_year != $last_year) {
            return ('AMC-PO-' . $current_year . '-' . $current_month  . sprintf("%02d", 1));
        } else {
            if ($current_month != $last_month) {
                return ('AMC-PO-' . $current_year . '-' . $current_month  . sprintf("%02d", 1));
            } else {
                if (((int)substr($this->getLastPONo(), 12) < 99)) {
                    return ('AMC-PO-' . $current_year . '-' . $current_month . sprintf("%02d", ((int)substr($this->getLastPONo(), 12)) + 1));
                } else {
                    return ('AMC-PO-' . $current_year . '-' . $current_month . sprintf("%03d", ((int)substr($this->getLastPONo(), 12)) + 1));
                }
            }
        }
    }

    public function getSalesOrderNumber()
    {
        $latest_sales_order_number = $this->getLastSONo();
        $last_year = substr($latest_sales_order_number, 5, 2);
        $current_year = $this->getCurrentYear();
        // dd([$last_year, $current_year]);
        if($current_year != $last_year){
            return ('ASON-'.$current_year.'-'.sprintf("%04d",1));
        }else{
            return ('ASON-' . $current_year . '-' . sprintf("%04d",((int)substr($this->getLastSONo(),9))+1));
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
                        'po_number' => $quotation->po_number,
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
                        'discount_in_p' => $quotation->discount_in_p,
                        'ps_date' => $quotation->ps_date,
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
                // 'rfq_id' => $data['rfq_id'],
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
                'ps_date' => $data['ps_date'],
            ];

            if ($request->transaction_type === 'sale') {
                $datas['quotation_no']=$this->getQuotationNo();
            }elseif($request->transaction_type === 'purchase'){
                $datas['po_number']=$this->getPONo();
            }else{
                $datas['quotation_no'] = null;
                $datas['po_number'] =null;
            }

        $quotation = Quotation::create($datas);

        global $quotation_id;
        $quotation_id = $quotation->id;
            // dd($request->quotation_details);
        // foreach($data['quotation_details'] as $key => $quotation_detail){

            // $temp = (object) $quotation_detail;
            $index = 0;
        while($request['quotation_detail'.$index] != null){
            $quotation_detail =(array) json_decode($request['quotation_detail' . $index], true);
            if( $request->file('file'.$index)){
                $filePath = $request->file('file' . $index)->move('quotation/quotation_detail/'.$quotation_id);
            }

            QuotationDetail::create([
            'quotation_id' => $quotation_id,
            'total_amount' => $quotation_detail['total_amount'],
            'analyse_id' => null,
            'product_id' => $quotation_detail['product_id'],
            'purchase_price' => $quotation_detail['purchase_price'],
            'description' => $quotation_detail['description'],
            'quantity' => $quotation_detail['quantity'],
            'margin' => $quotation_detail['margin'],
            'sell_price' => $quotation_detail['sell_price'],
            'remark' => $quotation_detail['remark'],
            'file_img_url' => $filePath,
            ]);
            $index++;
        }
        return response()->json(['msg' => 'successfully added']);
        }

        catch(Exception $e){
            return response()->json($e, 201);
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
        $quotation = Quotation::where('id',$id)->first();
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
            "ps_date" => $quotation->ps_date,
            "sales_order_number" => $quotation->sales_order_number,
            "contact" => $quotation->contact,
            "party" => $quotation->party,
            "rfq" => $quotation->rfq,
            "quotation_details" => $quotation->quotationDetail->map(function ($quotation_detail){
                $filePath = $quotation_detail->file_img_url && $quotation_detail->file_img_url;
                $urlPath = url($filePath) || '';
                return[
                "id"=> $quotation_detail->id,
                "total_amount"=> $quotation_detail->total_amount,
                "analyse_id"=> $quotation_detail->analyse_id,
                "product_id"=> $quotation_detail->product_id,
                "descriptionss" => $quotation_detail->product->description,
                "product" => $quotation_detail->product,
                "product_price_list" => $quotation_detail->product->productPrice->map(function ($productP){
                    return [
                        'price'=>$productP->price,
                        'firm_name'=>$productP->party->firm_name
                    ];
                }),
                // "product_price_list" => $quotation_detail->product->productPrice->party,
                "purchase_price"=> $quotation_detail->purchase_price,
                "description"=> $quotation_detail->description,
                "quantity"=> $quotation_detail->quantity,
                // "delivered_quantity"=> $quotation_detail->quantity,
                "delivered_quantity"=> $quotation_detail->getDeliveredQuantity($quotation_detail),
                "margin"=> $quotation_detail->margin,
                "sell_price"=> $quotation_detail->sell_price,
                "remark"=> $quotation_detail->remark,
                "file" => $urlPath,
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
        $quotation = Quotation::where("id",$id)->firstOrFail();
        $data = $request->all();
        $quotation->update([
            'po_number' => $data['po_number'],
            // 'status' => $data['status'],
            'total_value' => $data['total_value'],
            'party_id' => $data['party_id'],
            'contact_id' => $data['contact_id'],
            'vat_in_value' => $data['vat_in_value'],
            'net_amount' => $data['net_amount'],
            'transaction_type' => $data['transaction_type'],
            'discount_in_p' => $data['discount_in_p'],
            'ps_date' => $data['ps_date'],
            // 'sales_order_number' => $data['sales_order_number'],
            ]);
            if($data['quotation_details']){
                foreach($data['quotation_details'] as $quotation_detail){
                    $quotationDetail = QuotationDetail::where('id', $quotation_detail['id'])->first();
                    if(isset($quotationDetail)){
                        $quotationDetail->update([
                        'total_amount' => $quotation_detail['total_amount'],
                        'analyse_id' => $quotation_detail['analyse_id'],
                        'product_id' => $quotation_detail['product_id'],
                        'purchase_price' => $quotation_detail['purchase_price'],
                        'description' => $quotation_detail['description'],
                        'quantity' => $quotation_detail['quantity'],
                        'margin' => $quotation_detail['margin'],
                        'sell_price' => $quotation_detail['sell_price'],
                        'remark' => $quotation_detail['remark'],
                        ]);
                    }else{
                        QuotationDetail::create([
                            'quotation_id' => $quotation->id,
                            'total_amount' => $quotation_detail['total_amount'],
                            // 'analyse_id' => $quotation_detail['analyse_id'],
                            'product_id' => $quotation_detail['product_id'],
                            'purchase_price' => $quotation_detail['purchase_price'],
                            'description' => $quotation_detail['description'],
                            'quantity' => $quotation_detail['quantity'],
                            'margin' => $quotation_detail['margin'],
                            'sell_price' => $quotation_detail['sell_price'],
                            'remark' => $quotation_detail['remark'],
                        ]);
                    }
                }
            return response()->json(['msg' => 'successfully added']);
        }
        // return response()->json($quotation);
    }

    public function updateQuotation(Request $request, $id)
    {

        // add validation

        // $validator = Validator::make($request->all(), [
        //     'title' => 'unique:quotations'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['msg' => 'P.O.Number is already exists'],201);
        // }

        // new validation logic for po_number

        $unique_po_no = Quotation::where('po_number', $request->po_number)->first();
        if(isset($unique_po_no)){
            return response()->json(['msg'=>'P.O.Number is exsits']);
        }

        $data = $request->all();
        $data['sales_order_number'] = $this->getSalesOrderNumber();
        $quotation = Quotation::where("id",$id)->firstOrFail();
        $quotation->update([
            'status' => $data['status'],
            'sales_order_number' => $data['sales_order_number'],
            'po_number' => $data['po_number'],
        ]);

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
        $quotation = Quotation::where('id',$id)->first();

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
                        'discount_in_p' => $quotation['discount_in_p'],
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
                        'discount_in_p' => $quotation['discount_in_p'],
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

    public function acceptedList()
    {
        $quotations = Quotation::where(['status' => 'accept', 'transaction_type' => 'sale'])
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
                        'discount_in_p' => $quotation['discount_in_p'],
                        'quotation_details' => $quotation->quotationDetail->map(function ($quotation_detail) {
                            $quotation_detail = QuotationDetail::where('id', '=', $quotation_detail->id)->first();
                            // $isDelivered = $this->checkDeliveredProductQuantity($quotation_detail);
                            // dd($isDelivered);
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

    public function rejectedList()
    {
        $quotations = Quotation::where(['status' => 'reject', 'transaction_type' => 'sale'])
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
                        'discount_in_p' => $quotation['discount_in_p'],
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
