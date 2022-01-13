<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $orders = Order::select('*')->get();
        $orders = Order::leftJoin('customers', 'customers.id','=','orders.customer_id')
        ->select('orders.*','orders.id as ord_id','orders.status as ord_status','customers.id as cust_id','customers.*')
        ->paginate(15);
        return view('admin.orders.list',compact('orders'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::leftJoin('customers', 'customers.id','=','orders.customer_id')
        ->where('orders.id',$id)
        ->select('orders.*','orders.status as ord_status','orders.id as ord_id','customers.*')
        ->first();
        $order_details = DB::table('order_details')->where('order_id',$id)->get();
       // dd($order_details);
        return view('admin.orders.show',compact('order','order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        $request->validate([
            'name'=>'status',
       ]);
    try{
        DB::beginTransaction();
        $create = Order::where('id',$order->id)->update([
            'status'=>$request->status,
            'remark'=>$request->remark,
        ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Status Updated Successfully.');
    }catch(\Throwable $th){
        DB::rollBack();
        throw $th;
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        if($order){
            $order->delete();
            DB::table('order_details')->where('order_id',$order->id)->delete();
            return redirect()->route('order.index')->with('success','Order deleted successfully.');
        }else{
            return back()->with('error','Error occured, try again.');
        }

    }
}
