<?php

namespace App\Http\Controllers;
use App\UserRegistration;
use App\UserImages;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('display')->with('data',UserRegistration::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegistrationRequest $request)
    {
        $user = UserRegistration::create([
            'company_name'=>$request->company_name,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'hr_name'=> $request->hr_name,
            'password'=> Hash::make($request->user_password),
            'address' => $request->address
        ]);

        if($request->hasFile('user_files')) {
            $files = $request->file('user_files');
            foreach($files as $file){
                $filename = time().$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/user_files/', $filename);
                UserImages::create([
                'user_registration_id' => $user->id,
                'image_name' => $filename
                ]);
            }
        }



        session()->flash('success','Data added successfully..!');
        return redirect(route('user-registeration.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
