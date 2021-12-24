<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use DB;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $values = Testimonial::all();
        return view('admin.testimonial.list',compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonial.add');
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
            'name'=>'required',
            'image'  =>'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'description' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $array = Testimonial::create([
                'name'=>$request->name,
                'designation'=>$request->designation,
                'description'=>$request->description,
                'image'=>$imageName,
            ]);
            if(!$array){
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return back()->with('success','Testimoni added successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
        if(!$testimonial){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.testimonial.edit',compact('testimonial'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        $request->validate([
            'name'=>'required',
            'image'  =>'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'description' => 'required',
        ]);
        try{
            DB::beginTransaction();
            if($testimonial->image){
                $imageName = $testimonial->image;
             }
             if($request->image){
                 $imageName = time().'.'.$request->image->extension();
                 $request->image->move(public_path('images'), $imageName);
             }
            $array = Testimonial::where('id',$testimonial->id)->update([
                'name'=>$request->name,
                'designation'=>$request->designation,
                'description'=>$request->description,
                'image'=>$imageName,
            ]);
            if(!$array){
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return back()->with('success','Testimoni updated successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        if($testimonial){
            if (file_exists('images/'.$testimonial->image)){
               unlink("images/".$testimonial->image);
              }
            $testimonial->delete();
            return back()->with('success','Testimoni deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
