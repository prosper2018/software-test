<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Traits\ImageUpload;

use App\OrderItem;

use App\Services;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $order = OrderItem::where('user_id', $id)->latest()->paginate(5);
        
        return view('myorder.index',compact('order'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('myorder.create');
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
            'user_id'=>'required',
            'service_id'=>'required',
            'price'=>'required',
            'quantity'=>'required'
        ]);
        //dd($request->all());
        $cart = $request->session()->get('cart', function(){ return 'default'; });
        //dd($cart);
        //$data = new OrderItem();
        $user_id = auth()->user()->id;

          foreach($cart as $key => $data) {
              OrderItem::create([
                  'user_id' => $user_id,
                  'service_id' => $data['id'],
                  'price' => $data['price'],
                  'quantity' => $data['quantity'],
                  'status' => 'pending'
              ]);
          }
           
            session()->forget("cart");
            //return redirect()->route('/')
                      //  ->with('success','User Account created successfully.');
            return redirect()->back()->with('success', 'Order placed successfully. You will be contacted for delivery of order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $order)
    {
        return view('myorder.show',compact('order'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'required',
            'service_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'status'=>'required'
        ]);

        $order = OrderItem::find($id);
        if($order->status != 'completed'){
            $order->update($request->all());

        return redirect()->route('order.index')
                        ->with('success','Order Cancelled successfully');
        }else{
            return redirect()->route('order.index')
                        ->with('success','You cannot cancel a completed order!!!');
        }
        // $data = new OrderItem();
        // $data->status = $request->status;
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $user)
    {

    }
}
