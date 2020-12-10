<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();
        return response()->json($parties, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'firm_name' => 'required',
            'registration_no' => 'required|max:12',
            'vat_no' => 'required|max:15',
            'post_box_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'proviance' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'party_type' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'suffix' => 'required',
            'contact1' => 'required',
            'contact2' => 'required',
            'fax' => 'required',
            'email' => 'required|email',
            'opening_balance' => 'required',
            'website' => 'required',
        ];

        $messages=['required'=> 'The :attribute field is required.'];

        $validator = Validator::make($request->all(),$rules,$messages);
        $errors = $validator->errors();
        foreach ($errors as $error ) {
            echo $error;
        }
        // echo $errors->first('email');

        // if($validator->fails()){
            // return ("somethin went wrong");

        // $party = new Party;

        // $party->firm_name = $request->firm_name;
        // $party->registration_no = $request->registration_no;
        // $party->vat_no = $request->vat_no;
        // $party->post_box_no = $request->post_box_no;
        // $party->street = $request->street;
        // $party->city = $request->city;
        // $party->proviance = $request->proviance;
        // $party->country = $request->country;
        // $party->zip_code = $request->zip_code;
        // $party->party_type = $request->party_type;
        // $party->fname = $request->fname;
        // $party->lname = $request->lname;
        // $party->suffix = $request->suffix;
        // $party->contact1 = $request->contact1;
        // $party->contact2 = $request->contact2;
        // $party->fax = $request->fax;
        // $party->email = $request->email;
        // $party->opening_balance = $request->opening_balance;
        // $party->website = $request->website;
        // $party->save();

        $party = Party::create($request->all());

        return response()->json($party, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        // $data = [
        //         'id' => $party->id,
        //         'firm_name' => $party->firm_name,
        //         'registration_no' => $party->registration_no,
        //         'vat_no' => $party->vat_no,
        //         'post_box_no' => $party->post_box_no,
        //         'street' => $party->street,
        //         'city' => $party->city,
        //         'proviance' => $party->proviance,
        //         'country' => $party->country,
        //         'zip_code' => $party->zip_code,
        //         'party_type' => $party->party_type,
        //         'fname' => $party->fname,
        //         'lname' => $party->lname,
        //         'contact1' => $party->contact1,
        //         'contact2' => $party->contact2,
        //         'fax' => $party->fax,
        //         'email' => $party->email,
        //         'opening_balance' => $party->opening_balance,
        //         'website' => $party->website,
        //         'updated_at' => $party->updated_at,
        //         'created_at' => $party->created_at,
        //     ];
            return response()->json($party, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $rules = [
            'firm_name' => 'required',
            'registration_no' => 'required|max:12',
            'vat_no' => 'required|max:15',
            'post_box_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'proviance' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'party_type' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'suffix' => 'required',
            'contact1' => 'required',
            'contact2' => 'required',
            'fax' => 'required',
            'email' => 'required|email',
            'opening_balance' => 'required',
            'website' => 'required',
        ];

        $messages = ['required' => 'The :attribute field is required.'];

        $validator = Validator::make($request->all(), $rules, $messages);
        $errors = $validator->errors();
        foreach ($errors as $error) {
            echo $error;
        }
        // echo $errors->first('email');

        // if($validator->fails()){
        // return ("somethin went wrong");

        $party->update($request->all());

        return response()->json($party, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $res = $party->delete();
        if ($res) {
            return (['msg' => 'party' . ' ' . $party->id .' is successfully deleted']);
        }
    }
}
