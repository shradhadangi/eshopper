<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\BasicDetail;
use DB;
class FrontController extends Controller
{
    //
    public function index(){
        $categories = Category::select('*')->get();
        $products = Product::select('*')->get();
        return view('front.home',compact('categories','products'));
    }
    public function products(){
        // $id = ($_GET['category_id']) ? $_GET['category_id'] : '';
      //   if($id){
      //     $products = Product::select('*')->where('category_id',$id)->get();
      //  }else{
         $products = Product::select('*')->get();
      //  }
      $categories = Category::select('*')->get();

        return view('front.products',compact('categories','products'));
    }
    public function contact(){
      $categories = Category::select('*')->get();
      $products = Product::select('*')->get();
      $basic_detail = BasicDetail::find(1);

      return view('front.contact',compact('categories','products','basic_detail'));
  }
  public function save_enquiry(Request $request){
        $request->validate([
          'name'=>'required',
          'email'=>'email|required',
          'subject'=>'required',
          'message'=>'required',
      ]);
        try{
            DB::beginTransaction();
            $array = [
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ];
            if(!$array){
                DB::rollback();
                return back()->with('error','Error occured, please try again');
            }
            DB::table('enquiries')
            ->insert($array);
            DB::commit();
            return back()->with('success','Thank you, we will get back to you soon.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
  }

}
