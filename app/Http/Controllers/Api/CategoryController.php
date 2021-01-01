<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
            'description' => 'required',
        ];

        $messages = ['required' => 'The :attribute field is required.'];

        $validator = Validator::make($request->all(), $rule, $messages);
        $errors = $validator->errors();
        foreach ($errors as $error) {
            echo $error;
        }

        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json($category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rule = [
            'name' => 'required',
            'description' => 'required',
        ];

        $messages = ['required' => 'The :attribute field is required.'];

        $validator = Validator::make($request->all(), $rule, $messages);
        $errors = $validator->errors();
        foreach ($errors as $error) {
            echo $error;
        }


        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $res = $category->delete();
        if ($res) {
            return (['msg' => 'category'.' ' . $category->id . ' is successfully deleted']);
        }
    }

    public function products_in_category()
    {
        $cat = DB::table('categories')
        ->leftJoin('products', 'categories.id',
            '=',
            'products.category_id'
        )
        ->select(['categories.*','products.category_id'])
        ->get();
        $grouped = $cat->groupBy('category_id');
        $data =array();
        foreach($grouped as $group){
            // dd($group);
            // array_push($data,[
            //     'id' => $group[0]->id,
            //     'name' => $group[0]->name,
            //     'description' => $group[0]->description,
            //     'products' =>count($group),
            //     ]
            // );
            if($group[0]->category_id == null){
                foreach($group as $item){
                    array_push($data,[
                        'id' => $item->id,
                        'name' => $item->name,
                        'description' => $item->description,
                        'products' =>0,
                    ]);
                }
            }else{
                array_push($data, [
                    'id' => $group[0]->id,
                    'name' => $group[0]->name,
                    'description' => $group[0]->description,
                    'products' => count($group),
                ]);
            };
        }

        return response()->json($data);
    }

    public function categorized_products($id)
    {
        $products = Product::where('category_id','=',$id)->get()->toArray();
        return response()->json($products, 200);
    }
}
