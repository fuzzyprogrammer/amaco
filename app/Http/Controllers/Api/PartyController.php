<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Party;
use App\Models\Contact;
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
        // $rules = [
        //     'firm_name' => 'required',
        //     'registration_no' => 'required|max:12',
        //     'vat_no' => 'required|max:15',
        //     'post_box_no' => 'required',
        //     'street' => 'required',
        //     'city' => 'required',
        //     'proviance' => 'required',
        //     'country' => 'required',
        //     'zip_code' => 'required',
        //     'party_type' => 'required',
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'suffix' => 'required',
        //     'contact1' => 'required',
        //     'contact2' => 'required',
        //     'fax' => 'required',
        //     'email' => 'required|email',
        //     'opening_balance' => 'required',
        //     'website' => 'required',
        // ];

        // $messages=['required'=> 'The :attribute field is required.'];

        // $validator = Validator::make($request->all(),$rules,$messages);
        // $errors = $validator->errors();
        // foreach ($errors as $error ) {
        //     echo $error;
        // }
        $party = Party::create([
            'firm_name'=>$request->firm_name,
            'registration_no'=>$request->registration_no,
            'vat_no'=>$request->vat_no,
            'post_box_no'=>$request->post_box_no,
            'street'=>$request->street,
            'city'=>$request->city,
            'proviance'=>$request->proviance,
            'country'=>$request->country,
            'zip_code'=>$request->zip_code,
            'party_type'=>$request->party_type,
            'contact'=>$request->contact,
            'website'=>$request->website,
            'fax'=>$request->fax,
            'opening_balance'=>$request->opening_balance,
        ]);
        $contact = Contact::create([
            'party_id'=>$party->id,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'designation'=>$request->designation,
            'phone1'=>$request->phone1,
            'phone2'=>$request->phone2,
            'email'=>$request->email,

        ]);
        return response()->json([$party, $contact], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {

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
        // $rules = [
        //     'firm_name' => 'required',
        //     'registration_no' => 'required|max:12',
        //     'vat_no' => 'required|max:15',
        //     'post_box_no' => 'required',
        //     'street' => 'required',
        //     'city' => 'required',
        //     'proviance' => 'required',
        //     'country' => 'required',
        //     'zip_code' => 'required',
        //     'party_type' => 'required',
        //     'contact' => 'required',
        //     'fax' => 'required',
        //     'opening_balance' => 'required',
        //     'website' => 'required',
        // ];

        // $messages = ['required' => 'The :attribute field is required.'];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // $errors = $validator->errors();
        // foreach ($errors as $error) {
        //     echo $error;
        // }
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

    public function vendor()
    {
        $vendors = Party::where('party_type','=','vendor')
        ->select('id','fname','lname')
        ->get()
        ->toArray();
        return $vendors;
    }
}
