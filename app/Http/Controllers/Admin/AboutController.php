<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use DB;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $about = About::select('*')->where('id','1')->first();
        return view('admin.about_us.list',compact('about'));
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
        return view('admin.about_us.list',compact('about'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
        return view('admin.about_us.edit',compact('about'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        // dd($about);
        try{
            DB::beginTransaction();
            //if($about->image){
                $imageName = $about->image;
            //}
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }
            $array = About::where('id',$about->id)->update([
                'title'=>$request->name,
                'description'=>$request->description,
                'image'=>$imageName,
             ]);
            if(!$array)
            {
               DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return redirect()->route('about.index')->with('success','About us detail updated successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
