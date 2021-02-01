<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseInvoiceDetail;
use Illuminate\Http\Request;


class PurchaseInvoiceController extends Controller
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

    public function getLastInvoiceNo()
    {
        $invoice = PurchaseInvoice::latest('created_at')->first();
        if ($invoice) {
            $latest_invoice_no = $invoice->invoice_no ? $invoice->invoice_no : 0;
            return ($latest_invoice_no);
        } else {
            return ('AMINV-' . $this->getCurrentYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getInvoiceNo()
    {
        $latest_invoice_no = $this->getLastInvoiceNo();
        $last_year = substr($latest_invoice_no, 6, 2);
        $current_year = $this->getCurrentYear();
        // dd([$last_year, $current_year]);
        if ($current_year != $last_year) {
            return ('AMINV-' . $current_year . '-' . sprintf("%04d", 1));
        } else {
            return ('AMINV-' . $current_year . '-' . sprintf("%04d", ((int)substr($this->getLastInvoiceNo(), 9)) + 1));
        }
    }
    public function index()
    {
        $invoices = PurchaseInvoice::where('status','!=','Delivered')
        ->orderBy('created_at','DESC')->get();
        return $invoices;
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
        // dd($data);
        // dd($request->vat_in_value);
        // dd($request->vat_in_value);
        $data['invoice_no'] = $this->getInvoiceNo();
        $data['issue_date'] = now();
        $data['status'] = "New";
        $data['quotation_id'] = $request['quotation_id'];
        $data['total_value'] = $request['total_value'];
        $data['discount_in_percentage'] = $request['discount_in_percentage'];
        $data['vat_in_value'] = $request['vat_in_value'];
        $data['grand_total'] = $request['grand_total'];
        $invoice = PurchaseInvoice::create([
            'invoice_no' => $data['invoice_no'],
            'issue_date' => $data['issue_date'],
            'status' => $data['status'],
            'quotation_id' => $data['quotation_id'],
            'total_value' => $data['total_value'],
            'discount_in_percentage' => $data['discount_in_percentage'],
            'vat_in_value' => $data['vat_in_value'],
            'grand_total' => $data['grand_total'],
            'bill_no' => null,
        ]);

        global $_invoice_id;
        $_invoice_id = $invoice['id'];

        foreach($data['invoice_details'] as $invoice_detail) {
            $_invoice_detail = PurchaseInvoiceDetail::create([
                'quotation_detail_id' => $invoice_detail['id'],
                'product_id' => $invoice_detail['product_id'],
                'sell_price' => $invoice_detail['sell_price'],
                'quantity' => $invoice_detail['quantity'],
                'total_amount' => $invoice_detail['total_amount'],
                'invoice_id' => $_invoice_id,
            ]);
        }
        // return 'success';
        return response()->json($invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseInvoice $purchaseInvoice)
    {
        return [
            $invoice,
            $invoice->quotation->party,
            $invoice->quotation->quotationDetail,
            $invoice->invoiceDetail->map(function ($invoice_detail){
                return [
                    $invoice_detail->quotationDetail,
                    $invoice_detail->product
                ];
            }),
            // $invoice->invoiceDetail->map(function ($invoice_detail){
            //     return [
            //         $invoice_detail->quotationDetail,
            //     ];
            // }),
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */

    public function getCurrentDeliveryYear()
    {
        return substr(date('Y'), 2);
    }

    public function getLastDeliveryNo()
    {
        $invoice = PurchaseInvoice::latest('created_at')->first();
        if ($invoice) {
            $latest_bill_no = $invoice->bill_no ? $invoice->bill_no : 0;
            return ($latest_bill_no);
        } else {
            return ('AMDLV-' . $this->getCurrentDeliveryYear() . '-' . sprintf("%04d", 0));
        }
    }

    public function getDeliveryNo()
    {
        $latest_bill_no = $this->getLastDeliveryNo();
        $last_year = substr($latest_bill_no, 6, 2);
        $current_year = $this->getCurrentDeliveryYear();
        // dd([$last_year, $current_year]);
        if ($current_year != $last_year) {
            return ('AMDLV-' . $current_year . '-' . sprintf("%04d", 1));
        } else {
            return ('AMDLV-' . $current_year . '-' . sprintf("%04d", ((int)substr($this->getLastDeliveryNo(), 9)) + 1));
        }
    }

    public function update(Request $request, PurchaseInvoice $purchaseInvoice)
    {
        $data = $request->all();
        $data['status'] = 'Delivered';
        $data['bill_no'] = $this->getDeliveryNo();
        $invoice->update($data);
        return $invoice;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseInvoice $purchaseInvoice)
    {
        return ($invoice->delete());
    }

    public function history()
    {
        $invoices = PurchaseInvoice::where('status', '=', 'Delivered')
        ->orderBy('created_at', 'DESC')->get();
        return response()->json($invoices);
    }
}



