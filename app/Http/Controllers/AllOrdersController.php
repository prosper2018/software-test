<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\Services;
use Illuminate\Http\Request;

class AllOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderItem::latest()->paginate(5);
  
        return view('allorders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orders, $id)
    {
        //dd($orders);
        $orders = OrderItem::where('id', $id)->first();

        return view('allorders.show',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orders, $id)
    {
        $orders->delete();
  
        return redirect()->route('orders.index')
                        ->with('success','Services deleted successfully');
    }

    public function changeStatus(Request $request, $id)
    {
        //dd($order->pizza->medium_pizza_price);
        $order = OrderItem::find($id);
        OrderItem::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
