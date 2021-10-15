<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

use App\Traits\ImageUpload;

class ServicesController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Services::latest()->paginate(5);
  
        return view('services.index',compact('service'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);
       
        //Services::create($request->all());
        $data = new Services();

        $data->photo = $request->photo;
        if($data->photo){
           try {
            $filePath = $this->UserImageUpload($data->photo); //Passing $data->image as parameter to our created method
            $data->name = $request->name;
            $data->price = $request->price;
            $data->photo = $filePath;
            $data->description = $request->description;

            $data->save();
   
        return redirect()->route('services.index')
                        ->with('success','Service created successfully.');
            } catch (Exception $e) {
                        //Write your error message here
                        $message = "Error sending image";
            }
        }             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $service)
    {
        return view('services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
  
        $service->update($request->all());
  
        return redirect()->route('services.index')
                        ->with('success','Services updated successfully');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        $service->delete();
  
        return redirect()->route('services.index')
                        ->with('success','Services deleted successfully');
    }
}
