<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DB;
class ProductImageController extends Controller
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
        $values = ProductImage::select('*')->where('product_id',$id)->get();
        $array = DB::table('products')->where('id',$id)->first();
        if(!$array){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.product_image.add')->with([
                'product_id'=>$id,
                'values'=>$values,
                'product'=>$array
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
                'product_id'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
        ]);
        try{
            DB::beginTransaction();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $create = ProductImage::create([
                'product_id'=>$request->product_id,
                'image'=>$imageName,
            ]);
            if(!$create){
                DB::rollBack();
                return back()->with('error','Error Occured, Try Again.');
            }
            DB::commit();
            return back()->with('success','Product Image Added Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
        if(!$productImage){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.product_image.edit')->with([
                'value'=>$productImage,
                'success'=>'Record found successfully.'
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
        $request->validate([
            'product_id'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
    ]);
    try{
        DB::beginTransaction();
        if($productImage->image){
            $imageName = $productImage->image;
        }
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $create = ProductImage::where('id',$productImage->id)->update([
                    'product_id'=>$request->product_id,
                    'image'=>$imageName,
                ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Product Image Upadetd Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        //
        if($productImage){
            if(file_exists('images/'.$productImage->image)){
                unlink("images/".$productImage->image);
            }
            $productImage->delete();
            return back()->with('success','Image deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
