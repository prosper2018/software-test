<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Traits\ImageUpload;

use App\Profile;

use App\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ImageUpload;
    public function index()
    {
        $user = Profile::latest()->paginate(5);
  
        return view('users.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            

            return redirect()->route('users.index')
                        ->with('success','User created successfully.');

       } catch (Exception $e) {
           //Write your error message here
           $message = "Error sending image";
       }
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
  
        $user->update($request->all());
        $profile->update($request->all());
  
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Profile $profile)
    {
        $user->delete();
        $profile->delete();
  
        return redirect()->route('users.index')
                        ->with('success','Users deleted successfully');
    }
}
