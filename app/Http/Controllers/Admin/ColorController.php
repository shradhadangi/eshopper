<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use DB;
class ColorController extends Controller
{
    public function index()
    {
        //
        $values = Color::all();
        return view('admin.color.add')->with([
                'values'=>$values]);
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
        $request->validate([
            'name' => 'required',
        ]);
        try{
            DB::beginTransaction();
                $create = Color::create([
                  'color'=>ucfirst($request->name),
                  'color_code'=>$request->color_code,
            ]);
            if(!$create){
                DB::rollBack();
                return back()->with('error','Error Occured, Try Again.');
            }
            DB::commit();
            return back()->with('success','Color  Added Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $Color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $Color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $Color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $Color)
    {
        //
        if(!$Color){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.color.edit')->with([
                'value'=>$Color,
                'success'=>'Record found successfully.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $Color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $Color)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        try{
         DB::beginTransaction();
        $create = Color::where('id',$Color->id)->update([
            'color'=>ucfirst($request->name),
            'color_code'=>$request->color_code,
      ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Color  Upadetd Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $Color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $Color)
    {
        //
        if($Color){
            $Color->delete();
            return back()->with('success','Color  deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
