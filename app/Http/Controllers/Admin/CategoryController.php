<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::select('*')->get();
        return view('admin.category.list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.add');

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
        ]);
        try{
            DB::beginTransaction();
            $array = Category::create([
                'name'=>$request->name,
                'slug'=>strtolower(str_replace(' ','-',$request->name)),

            ]);
            if(!$array)
            {
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return redirect()->route('category.index')->with('success','Category added successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        // $array = Category::whereId($category)->first();
        // dd($array);
        if(!$category){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.category.edit',compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        //
        $request->validate([
            'name'=>'required',
        ]);
        try{
            DB::beginTransaction();
            $array = Category::where('id',$category)->update([
                'name'=>$request->name,
                'slug'=>strtolower(str_replace(' ','-',$request->name)).'-'.$category,
            ]);
            if(!$array)
            {
                DB::rollback();
               return back()->with('error','Error occured, please try again');
            }
            DB::commit();
            return redirect()->route('category.index')->with('success','Category updated successfully.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if($category){
            $category->delete();
            return redirect()->route('category.index')->with('success','Category deleted successfully.');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
