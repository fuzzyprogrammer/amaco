<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Role;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return ($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if($validatedData){
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
            return(
                $product
            );
        }
        else{
            return ['error'=>'complete all the fields'];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
