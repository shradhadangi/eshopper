<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //   $products = Product::select('*')->paginate(15);
          $products = Product::leftJoin('category as category_table', 'category_table.id','=','products.category_id')
          ->leftJoin('subcategory as subcat_table', 'subcat_table.id','=','products.subcat_id')
          ->select('products.*','subcat_table.name as sub_cat_name','category_table.name as cat_name')
          ->paginate(15);
          return view('admin.products.list',compact('products'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = DB::table('category')->get();
        return view('admin.products.add',compact('category'));

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
            'category_id'=>'required',
            'name'=>'required',
            'sku_id'=>'required',
            'price'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
    ]);
    try{
        DB::beginTransaction();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $create = Product::create([
            'category_id'=>$request->category_id,
            'subcat_id'=>$request->sub_cat_id,
            'name'=> $request->name,
            'sku_id'=> $request->sku_id,
            'price' => $request->price,
            'short_description'=>$request->short_description,
            'delivery_detail'=>$request->delivery_detail,
            'shipping_detail'=>$request->shipping_detail,
            'size_guide'=>$request->size_guide,
            'product_description'=>$request->description,
            'cms'=>$request->cms,
            'image'=>$imageName,
            'size'=>$request->size,
            'colors'=>$request->colors
          ]);

        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return redirect()->route('products.index')->with('success','Product Added Successfully.');
    }catch(\Throwable $th){

        DB::rollBack();
        throw $th;
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $category = DB::table('category')->get();
        $subcategory = DB::table('subcategory')->where('id',$product->category_id)->get();
        if(!$product){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.products.edit')->with([
                'value'=>$product,
                'category'=>$category,
                'subcategory'=>$subcategory,
                'success'=>'Record found successfully.'
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
    ]);
    try{
        DB::beginTransaction();
       // $value = Product::whereId($id)->first();
        if($product->image){
            $imageName = $product->image;
        }
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $create = Product::where('id',$product->id)->update([
            'category_id'=>$request->cat_id,
            'subcat_id'=>$request->sub_cat_id,
            'name'=> $request->name,
            'sku_id'=> $request->sku_id,
            'price' => $request->price,
            'short_description'=>$request->short_description,
            'delivery_detail'=>$request->delivery_detail,
            'shipping_detail'=>$request->shipping_detail,
            'size_guide'=>$request->size_guide,
            'product_description'=>$request->description,
            'cms'=>$request->cms,
            'image'=>$imageName,
            'size'=>$request->size,
            'colors'=>$request->colors,

        ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Product Updated Successfully.');
    }catch(\Throwable $th){
        DB::rollBack();
        throw $th;
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        if($product){
            if(file_exists('images/'.$product->image)){
                unlink("images/".$product->image);
            }
            $product->delete();
            return redirect()->route('products.index')->with('success','Product deleted successfully.');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
    public function subCat(Request $request)
    {

        $parent_id = $request->cat_id;
        $subcategories = DB::table('subcategory')->where('category_id',$parent_id)->get();
        $subcat_data = "<option value=''>Select Sub-Category</option>";
        foreach($subcategories as $sub){
            $cat_id = $sub->id;
            $cat_name = $sub->name;
            $subcat_data .= "<option value='".$cat_id."'>$cat_name</option>";
        }
        return $subcat_data;
    }

}
