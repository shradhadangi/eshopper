<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\BasicDetail;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\About;
use DB;
class FrontController extends Controller
{
    //
    public function index(){
        $categories = Category::select('*')->get();
        $products = Product::select('*')->limit(4)->get();
        $basic_detail = BasicDetail::find(1);
        $testimonials = Testimonial::all();
        $sliders = Slider::all();
        return view('front.home',compact('categories','products','basic_detail','testimonials','sliders'));
    }
    public function products(){
        $sid = null;
        $id = ($_GET['cid']) ? $_GET['cid'] : NUll ;
        $sid = (isset($_GET['sid'])) ?   $_GET['sid'] : '' ;
       if($sid !=null && $id != null){
          $category = Category::select('*')->find($id);
          $subcategory = Subcategory::select('*')->first($sid);
          $products = Product::select('*')->where(['category_id'=>$id,'subcat_id'=>$sid])->get();
       }elseif($id){
          $category = Category::select('*')->find($id);
          $subcategory = NULL;
          $products = Product::select('*')->where('category_id',$id)->get();
       }else{
          $category = NULL;
          $subcategory = NULL;
         $products = Product::all();
       }
        $categories = Category::select('*')->get();
        $basic_detail = BasicDetail::find(1);
        return view('front.products',compact('categories','products','basic_detail','category','subcategory'));
    }
    public function contact(){
      $categories = Category::select('*')->get();
      $basic_detail = BasicDetail::find(1);
      return view('front.contact',compact('categories','basic_detail'));
  }
  public function about_us(){
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    $about = About::find(1);
    return view('front.aboutus',compact('categories','about','basic_detail'));
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
                    'created_at'=>date('Y-m-d H:i:s'),
                 ];
            if(!$array){
                DB::rollback();
                return back()->with('error','Error occured, please try again');
            }
            DB::table('enquiries')->insert($array);
            DB::commit();
            return back()->with('success','Thank you, we will get back to you soon.');
        }catch(\Throwable $th){
                DB::rollBack();
                return $th;
        }
  }
  public function product_detail($id){
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    $product = Product::find(1);
    $product_images = ProductImage::select('*')->where('product_id',$id)->all(1);
    return view('front.registration',compact('categories','basic_detail','product','product_images'));
  }

  public function registration(){
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    return view('front.registration',compact('categories','basic_detail'));
  }

  // 'list.*' => 'required|numeric',
  public function save_customer(Request $request){
    $request->validate([
              'first_name' => 'required|max:255',
              'last_name' => 'required|max:255',
              'mobile' => 'required|min:10|max:10',
              'username' => 'required|max:255|unique:customers',
              'email' => 'required|email|max:255',
              'password' => 'required|min:6',
              'gender' => 'required',
              'phone' => 'required|numeric',
              'interest.*' => 'required',
              'terms' => 'accepted'
          ]);
    try{
        DB::beginTransaction();
        $array = [
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->username,
                'password'=>Hash::make($request->password),
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'interests'=> implode(',',$request->interest),
                'status'=> 'Active',
             ];
        if(!$array){
            DB::rollback();
            return back()->with('error','Error occured, please try again');
        }
        DB::table('customers')->insert($array);
        DB::commit();
        return back()->with('success','Welcome, Thank you for registering with us.');
    }catch(\Throwable $th){
            DB::rollBack();
            return $th;
    }
  }
}
