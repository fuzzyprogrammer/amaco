<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
// use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductController extends Controller
{

    public function index()
    {
        // $products = Product::all();
        // return ($products);
        $products = DB::table('products')
            ->leftJoin('categories','categories.id','=','products.category_id')
            ->leftJoin('divisions','divisions.id','=','products.division_id')
            ->select('products.*','categories.name as category_name', 'divisions.name as division_name')
            ->get();
        return $products;
    }
//
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'division_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'unit_of_measure' => 'required',
            // 'unit_price' => 'required',
            'type' => 'required',
            'hsn_code' => 'required',
            'initial_quantity' => 'required',
            'minimum_quantity' => 'required',
        ];

        $validatedData = $request->validate($rules);

        // if($validatedData->fails()){
        //     $returnData = array(
        //         'status'=>'error',
        //         'message'=>'Please review fields',
        //         'error'=>$validatedData->errors()->all()
        //     );
        //     return response()->json($returnData, 500);
        // }
            // dd($request->all());
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->division_id = $request->division_id;
        // $product->party_id = $request->party_id;
        $product->name = $request->name;
        // $product->name_in_ar = $request->name == null ? null : GoogleTranslate::trans($request->name, 'ar');
        $product->description = $request->description;
        $product->unit_of_measure = $request->unit_of_measure;
        // $product->unit_price = $request->unit_price;
        $product->type = $request->type;
        $product->hsn_code = $request->hsn_code;
        $product->initial_quantity = $request->initial_quantity;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->model_no = $request->model_no;
        $product->minimum_quantity = $request->minimum_quantity;
        $product->save();
        return($product);
//

    }

//
    public function show($product)
    {
        $product = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('divisions', 'divisions.id', '=', 'products.division_id')
            ->leftJoin('product_prices', 'product_id', '=', 'products.id')
            ->leftJoin('manufacturers','products.manufacturer_id', '=','manufacturers.id')
            ->select('products.*', 'categories.name as category_name', 'divisions.name as division_name', 'product_prices.*','manufacturers.*')
            ->where('products.id','=',$product)
            ->get();
        return response()->json($product);

    }

//
    public function update(Request $request, $id)
    {
        // $rules = [
        //     'category_id' => 'required',
        //     'division_id' => 'required',
        //     'name' => 'required|max:255',
        //     'description' => 'required|max:500',
        //     'unit_of_measure' => 'required',
        //     'unit_price' => 'required',
        //     'mrp' => 'required',
        //     'real_price' => 'required',
        // ];
        // $validatedData = $request->validate($rules);

        $product = Product::findOrfail($id);
        $product->update($request->all());
        return ($product);
    }
    //
    public function destroy($id)
    {
        $product=Product::findOrfail($id);
        $res = $product->delete();
        if($res){
            return (['msg'=>$product->name.' is successfully deleted']);
        }
    }
}
