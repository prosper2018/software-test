<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Traits\ImageUpload;

use App\Profile;

use App\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = new User();
        $datas = new Profile();

        $datas->photo = $request->photo;
        if($datas->photo){
           try {
            $filePath = $this->UserImageUpload($datas->photo); //Passing $data->image as parameter to our created method
            $data->name = $request->name;
            $data->email = $request->email;
            $data->role = 'user';
            $data->password = Hash::make($request->password);

            $datas->phone = $request->phone;
            $datas->name = $request->name;
            $datas->photo = $filePath;
            $data->save();
            $datas->save();
            

            //return redirect()->route('/')
                      //  ->with('success','User Account created successfully.');
                      return view('welcome');

       } catch (Exception $e) {
           //Write your error message here
           $message = "Error sending image";
       }
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('customers.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
