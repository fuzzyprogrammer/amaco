<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return ($products);
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
            'unit_price' => 'required',
            'mrp' => 'required',
            'real_price' => 'required',
        ];
        
        $validatedData = $request->validate($rules);

        if($validatedData->fails()){
            $returnData = array(
                'status'=>'error',
                'message'=>'Please review fields',
                'error'=>$validatedData->errors()->all()
            );
            return response()->json($returnData, 500);
        }

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->division_id = $request->division_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_of_measure = $request->unit_of_measure;
        $product->unit_price = $request->unit_price;
        $product->mrp = $request->mrp;
        $product->real_price = $request->real_price;
        $product->save();
        return($product);
//

    }

//
    public function show($id)
    {
        $product = Product::findOrfail($id);
        return(
            [
                'id'=>$product->id,
                'name'=>$product->name,
                'description'=>$product->description,
                'mrp'=>$product->mrp,
                'real_price'=>$product->real_price,
                'unit_price'=>$product->unit_price,
                'unit_of_measure'=>$product->unit_of_measure,
                'category_id'=>$product->category_id,
                'division_id'=>$product->division_id,
                'division name'=>$product->division->name,
            ]
        );
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
