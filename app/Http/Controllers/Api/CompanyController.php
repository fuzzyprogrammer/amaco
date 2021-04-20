<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();

        return response()->json($company);
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
        if ($request->file('img1')) {
            $img1_name = $request->img1->getClientOriginalName();
            $img1_path = $request->file('img1')->move('company/', $img1_name);
            $data['img1'] = $img1_path;
        }
        if ($request->file('img2')) {
            $img2_name = $request->img2->getClientOriginalName();
            $img2_path = $request->file('img2')->move('company/', $img2_name);
            $data['img2'] = $img2_path;
        }
        if ($request->file('img3')) {
            $img3_name = $request->img3->getClientOriginalName();
            $img3_path = $request->file('img3')->move('company/', $img3_name);
            $data['img3'] = $img3_path;
        }

        $company = Company::create($data);
        if ($company) {

            return response()->json($company);
        }
        return response()->json(['msg' => "Error ", 500]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->img1 && $company['img1'] = url($company->img1);
        $company->img2 && $company['img2'] = url($company->img2);
        $company->img3 && $company['img3'] = url($company->img3);
        // $company = (array)$company;
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->all();
        if ($request->file('img1')) {
            $img1_name = $request['img1']->getClientOriginalName();
            $img1_path = $request->file('img1')->move('company/', $img1_name);
            $data['img1'] = $img1_path;
        }
        if ($request->file('img2')) {
            $img2_name = $request['img2']->getClientOriginalName();
            $img2_path = $request->file('img2')->move('company/', $img2_name);
            $data['img2'] = $img2_path;
        }
        if ($request->file('img3')) {
            $img3_name = $request['img3']->getClientOriginalName();
            $img3_path = $request->file('img3')->move('company/', $img3_name);
            $data['img3'] = $img3_path;
        }

        $company->update($data);

        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json(['msg' => "Successfully Delelted"]);
    }
}
