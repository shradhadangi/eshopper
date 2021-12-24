<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $values = Slider::all();
        return view('admin.slider.add')->with([
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
        ]);
        try{
            DB::beginTransaction();
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $create = Slider::create([
                  'image'=>$imageName,
            ]);
            if(!$create){
                DB::rollBack();
                return back()->with('error','Error Occured, Try Again.');
            }
            DB::commit();
            return back()->with('success','Slider Image Added Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
        if(!$slider){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.slider.edit')->with([
                'value'=>$slider,
                'success'=>'Record found successfully.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
        ]);
        try{
         DB::beginTransaction();
        if($slider->image){
           $imageName = $slider->image;
        }
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $create = Slider::where('id',$slider->id)->update([
                    'image'=>$imageName,
                ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Slider Image Upadetd Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        if($slider){
            if (file_exists('images/'.$slider->image)){
               unlink("images/".$slider->image);
              }
            $slider->delete();
            return back()->with('success','Slider Image deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
