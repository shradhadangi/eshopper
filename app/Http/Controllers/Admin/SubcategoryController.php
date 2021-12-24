<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use DB;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $array = DB::table('category')->where('id',$id)->get();
        $sub_array = DB::table('subcategory')
            ->leftJoin('category', 'subcategory.category_id', '=', 'category.id')
            ->select('subcategory.*','subcategory.name as sub_cat_name','category.name as cat_name')
            ->where('subcategory.category_id',$id)
            ->get();
        // dd($array);
        if(!$array){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.subcategory.add')->with([
                'cat_id'=>$id,
                'subcategory'=>$sub_array,
                'category'=>$array,
                'success'=>'Subcategory'
            ]);
        }

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
            'cat_id'=>'required',
        ]);
        try{
            DB::beginTransaction();
            $array = Subcategory::create([
                'name'=>$request->name,
                'category_id'=>$request->cat_id,
            ]);
            if(!$array)
            {
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return redirect()->route('subcategory.create',['id'=>$request->cat_id])->with('success','SubCategory added successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
        $category = DB::table('category')->get();
        if(!$subcategory){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.subcategory.edit')->with([
                'category'=>$category,
                'value'=>$subcategory,
                'success'=>'SubCategory'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$subcategory)
    {
        //
        $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
        ]);
        try{
            DB::beginTransaction();
            $array = Subcategory::where('id',$subcategory)->update([
                'name'=>$request->name,
                'category_id'=>$request->cat_id,
            ]);
            if(!$array)
            {
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return back()->with('success','SubCategory updated successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
        if($subcategory){
            $subcategory->delete();
            return redirect()->route('category.index')->with('success','SubCategory deleted successfully.');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
