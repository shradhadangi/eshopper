<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicDetail;
use Illuminate\Http\Request;
use DB;

class BasicDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $basic_detail = BasicDetail::select('*')->where('id','1')->first();
        // dd($basic_detail);
        return view('admin.basic_detail.list',compact('basic_detail'));
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
     * @param  \App\Models\BasicDetail  $basicDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BasicDetail $basicDetail)
    {
        //
        $basic_detail = $basicDetail;
        // $basic_detail = BasicDetail::select('*')->where('id',1)->first();
        return view('admin.basic_detail.list',compact('basic_detail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicDetail  $basicDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicDetail $basicDetail)
    {
        //
        $basic_detail = $basicDetail;
        return view('admin.basic_detail.edit',compact('basic_detail'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicDetail  $basicDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $basicDetail)
    {
        //
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
        ]);
        // dd($basicDetail);
         $basic_detail = BasicDetail::select('*')->where('id',$basicDetail)->first();

        try{
            DB::beginTransaction();
            if($basic_detail->logo){
                $imageName = $basic_detail->logo;
            }
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }
            $array = BasicDetail::where('id',$basicDetail)->update([
                'site_name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'logo'=>$imageName,
                'address'=>$request->address,
                'map'=>$request->map,
            ]);
            if(!$array)
            {
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return redirect()->route('basic-detail.index')->with('success','Basic Detail updated successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasicDetail  $basicDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicDetail $basicDetail)
    {
        //
    }
}
