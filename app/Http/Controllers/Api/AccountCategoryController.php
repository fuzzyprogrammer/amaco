<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountCategory;
use Illuminate\Http\Request;

class AccountCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountCategories = AccountCategory::where('parent_id', '=', null)->get();

        return response()->json($accountCategories);
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
        $accountCategory = AccountCategory::create($data);

        return response()->json($accountCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountCategory  $accountCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AccountCategory $accountCategory)
    {
        return response()->json($accountCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountCategory  $accountCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountCategory $accountCategory)
    {
        $data = $request->all();
        $accountCategory->update($data);

        return response()->json($accountCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountCategory  $accountCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountCategory $accountCategory)
    {
        $accountCategory->delete();

        return response()->json($accountCategory->id." has been successfully deleted.");
    }

    public function subCategory($id)
    {
        $sub_categories = AccountCategory::where('parent_id', '=', $id)->get();
        return response()->json($sub_categories);
    }

    public function search($name)
    {
        $name = strtolower($name);
        $category = AccountCategory::query()
            ->where('name', 'LIKE', "%{$name}%")
            ->get();
        return response()->json($category);
    }
}