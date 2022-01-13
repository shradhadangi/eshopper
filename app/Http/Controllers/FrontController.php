<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BasicDetail;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\About;
use App\Models\Order;
use DB;
use Crypt;
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
  public function save_newsletter(Request $request){
    $request->validate([
      'email'=>'email|required',
    ]);
    try{
        DB::beginTransaction();
        $array = [
                'email'=>$request->email,
                'created_at'=>date('Y-m-d H:i:s'),
             ];
        if(!$array){
            DB::rollback();
            return back()->with('error','Error occured, please try again');
        }
        DB::table('newsletters')->insert($array);
        DB::commit();
        return back()->with('newsletter','Thank you for your subscription.');
    }catch(\Throwable $th){
            DB::rollBack();
            return $th;
    }
}

  public function products(Request $request){
    $sid = null;
    $id = (isset($_GET['cid'])) ? $_GET['cid'] : NUll ;
    $sid = (isset($_GET['sid'])) ?   $_GET['sid'] : '' ;
    $size_d = (isset($_GET['size'])) ?   $_GET['size'] : '' ;
    $sort = '';
    if($request->get('sort')!==null){
        $sort = $request->get('sort');
    }
    $query= Product::select('*');
   if($sid !=null && $id != null){
      $category = Category::select('*')->find($id);
      $subcategory = Subcategory::select('*')->first($sid);
      $query = $query->where(['category_id'=>$id,'subcat_id'=>$sid]);
      $subcategory_data = Subcategory::select('*')->where('category_id',$id)->get();
   }elseif($id){
      $category = Category::select('*')->find($id);
      $subcategory = NULL;
      $subcategory_data = Subcategory::select('*')->where('category_id',$id)->get();
      $query = $query->where('category_id',$id);
    }else{
      $category = NULL;
      $subcategory = NULL;
      $subcategory_data = NULL;
    }
    if($size_d){
      // $query = $query->where('size','like', '%' . $size_d. '%');
    }

    if($sort=='name'){
      $query = $query->orderBy('name','desc');
    }
    if($sort=='price_desc'){
      $query = $query->orderByRaw('CAST(price AS DECIMAL) desc');
    }
    if($sort=='price_asc'){
      $query = $query->orderByRaw('CAST(price AS DECIMAL) asc');
    }
    $query = $query->get();
    $products = $query;
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    $color_data = DB::table('color_master')->get();
    $size_data = DB::table('size_master')->get();
  return view('front.products',compact('categories','products','basic_detail','category','subcategory','subcategory_data','size_data','color_data'));
}

  public function product_detail($id){
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    // $product = Product::find(1);
    $product = Product::leftJoin('category as category_table', 'category_table.id','=','products.category_id')
    ->leftJoin('subcategory as subcat_table', 'subcat_table.id','=','products.subcat_id')
    ->select('products.*','subcat_table.name as sub_cat_name','category_table.name as cat_name')
    ->find($id);
    $product_images = ProductImage::select('*')->where('product_id',$id)->get();
    // $product_reviews = DB::table('product_reviews')->where('product_id',$id)->get();
    $product_reviews = DB::table('product_reviews')
     ->leftJoin('customers', 'customers.id','=','product_reviews.customer_id')
     ->where('product_id',$id)
     ->select('product_reviews.*','customers.first_name','customers.last_name')
     ->orderBy('id','desc')
     ->get();
    return view('front.product-detail',compact('categories','basic_detail','product','product_images','product_reviews'));
  }

  public function registration(Request $request){
    if($request->session()->has('USER_LOGIN')){
      return redirect()->route('site');
    }
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    return view('front.registration',compact('categories','basic_detail'));
  }
  public function review_submit(Request $request){
    $request->validate([
              'product_id' => 'required|numeric',
              'rating' => 'required|numeric',
          ]);
    try{
        DB::beginTransaction();
        $array = [
                'customer_id'=>$request->session()->get('USER_ID'),
                'product_id'=>$request->product_id,
                'rating'=>$request->rating,
                'review'=>$request->review,
                'created_at'=>date('Y-m-d H:i:s'),
             ];
        if(!$array){
            DB::rollback();
            return back()->with('error','Error occured, please try again');
        }
      $cust_id = DB::table('product_reviews')->insertGetId($array);
        DB::commit();
        return back()->with('success','Thank you for your valuable feedback.');
    }catch(\Throwable $th){
            DB::rollBack();
            return $th;
    }
  }
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
              'interest' => 'array|min:1|required',
              'terms' => 'accepted'
          ]);
    try{
        DB::beginTransaction();
        $array = [
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'username'=>$request->username,
                'password'=>Crypt::encrypt($request->password),
                // 'password'=>Hash::make($request->password),
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
      $cust_id = DB::table('customers')->insertGetId($array);
      $request->session()->put('USER_LOGIN',true);
      $request->session()->put('USER_ID',$cust_id);
      $request->session()->put('USER_NAME',$request->first_name.' '.$request->last_name );
        DB::commit();
        return back()->with('success','Welcome, Thank you for registering with us.');
    }catch(\Throwable $th){
            DB::rollBack();
            return $th;
    }
  }
  public function add_to_cart(Request $request){
    if($request->session()->has('USER_LOGIN')){
      $uid = $request->session()->get('USER_LOGIN');
      $user_type = 'User';
    }else{
      $uid = getUserTempId();
      $user_type = 'Guest';
    }
    $size_id = $request->post('size_id');
    $product_id = $request->post('product_id');
    $qty = ($request->post('qty')==0) ? 1 : $request->post('qty');
           $check = DB::table('cart')
                ->where(['customer_id'=>$uid])
                ->where(['customer_type'=>$user_type])
                ->where(['product_id'=>$product_id])
                ->where(['size'=>$size_id])
                ->get();
          if(isset($check[0])){
             $update_id = $check[0]->id;
             DB::table('cart')
                ->where(['id'=>$update_id])
                ->update(['qty'=>$qty,'updated_at'=>date('Y-m-d H:i:s')]);
                $msg = 'updated';
          }else{
            $array = [
              'product_id'=>$product_id,
              'customer_id'=>$uid,
              'customer_type'=>$user_type,
              'size'=>$size_id,
              'qty'=>$qty,
              'created_at'=>date('Y-m-d H:i:s'),
           ];
           $id = DB::table('cart')->insertGetId($array);
           $msg = 'added';
        }
        return $msg;
  }
  public function cart_data(){
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    if(session()->has('USER_LOGIN')){
      $uid = session()->get('USER_LOGIN');
      $user_type = 'User';
    }else{
      $uid = getUserTempId();
      $user_type = 'Guest';
    }
    $cart_data = DB::table('cart')
        ->leftJoin('products', 'products.id','=','cart.product_id')
        ->where('customer_id',$uid)
        ->select('cart.*','products.name','products.price','products.image')
        ->get();

    return view('front.cart',compact('categories','basic_detail','cart_data'));

  }
 public function delete_cart(Request $request){

    DB::table('cart')->where('id',$request->id)->delete();
    return back()->with('success','Item deleted successfully.');
 }
 public function clear_cart(){
  if(session()->has('USER_LOGIN')){
    $uid = session()->get('USER_LOGIN');
    $user_type = 'User';
  }else{
    $uid = getUserTempId();
    $user_type = 'Guest';
  }
  DB::table('cart')->where('customer_id',$uid)->delete();
  return back()->with('success','All item deleted successfully.');
}
 public function cart_update(Request $request){

  DB::table('cart')
      ->where(['id'=>$request->cart_id])
      ->update(['qty'=>$request->qty,'updated_at'=>date('Y-m-d H:i:s')]);
  return 'succcess';
}
public function ajax_cart(){
  if(session()->has('USER_LOGIN')){
    $uid = session()->get('USER_LOGIN');
    $user_type = 'User';
  }else{
    $uid = getUserTempId();
    $user_type = 'Guest';
  }
  $carts_data = DB::table('cart')
  ->leftJoin('products', 'products.id','=','cart.product_id')
  ->where('customer_id',$uid)
  ->select('cart.*','products.name','products.price','products.image')
  ->get();
  return view('front.cart_ajax_data',compact('carts_data'));
 }
 public function place_order(Request $request){
  if($request->session()->has('USER_LOGIN')){
    $uid = $request->session()->get('USER_LOGIN');
    $user_type = 'User';
  }else{
    $uid = getUserTempId();
    $user_type = 'Guest';
  }
  $request->validate([
    'address' => 'required',
    'zipcode' => 'required|numeric',
    'state' => 'required',
    'country' => 'required',
    'total' => 'required|numeric',
   ]);
  $order_number	 = 'ORD'.mt_rand(11111,99999);
         $check = DB::table('cart')
              ->where(['customer_id'=>$uid])
              ->get();
        try{
            DB::beginTransaction();
            $array = [
              'order_number'=>$order_number	,
              'customer_id'=>$uid,
              'customer_type'=>$user_type,
              'address'=>$request->address,
              'country'=>$request->country,
              'state'=>$request->state,
              'zipcode'=>$request->zipcode,
              'grand_total'=>$request->total,
              'created_at'=>date('Y-m-d H:i:s'),
          ];
        if(!$array){
            DB::rollback();
            return back()->with('error','Error occured, please try again');
        }
        $id = DB::table('orders')->insertGetId($array);
        $carts_data = DB::table('cart')
                    ->leftJoin('products', 'products.id','=','cart.product_id')
                    ->where('customer_id',$uid)
                    ->select('cart.*','products.name','products.price','products.image')
                    ->get();
        foreach($carts_data as $data){
            $product_array = [
                  'order_id'=>$id,
                  'product_id'=>$data->product_id,
                  'product_name'=>$data->name,
                  'product_image'=>$data->image,
                  'price'=>$data->price,
                  'size'=>$data->size,
                  'color'=>$data->color,
                  'qty'=>$data->qty,
                  'total'=>$data->qty*$data->price,
                  'created_at'=>date('Y-m-d H:i:s'),
          ];
          DB::table('order_details')->insertGetId($product_array);
          DB::table('cart')->where(['customer_id'=>$uid,'id'=>$data->id])->delete();
        }
          DB::commit();
          return back()->with('success','Thank you for shopping with us.');
        }catch(\Throwable $th){
          DB::rollBack();
          return $th;
        }
}
public function login_process(Request $request){
  $check_username = DB::table('customers')
  ->where(['username'=>$request->login_username])
  ->get();
  if(isset($check_username[0])){
    $db_pwd = Crypt::decrypt($check_username[0]->password);
    if($db_pwd==$request->login_password){
        $request->session()->put('USER_LOGIN',true);
        $request->session()->put('USER_ID',$check_username[0]->id);
        $request->session()->put('USER_NAME',$check_username[0]->first_name.' '.$check_username[0]->last_name );
        $uid = getUserTempId();
        DB::table('cart')
        ->where(['customer_id'=>$uid])
        ->update(['customer_id'=>$check_username[0]->id,'customer_type'=>'User']);
        $status = 'success';
        $msg = 'Logged in successfully';
      }else{
        $status = 'error';
        $msg = 'Please enter valid password';
    }
  }else{
       $status = 'error';
       $msg = 'Please enter valid username';
  }
  return response()->json(['status'=>$status,'msg'=>$msg]);
}

public  function profile(){
    if(!session()->has('USER_LOGIN')){
      return redirect()->route('register');
    }
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);
    $customer =  DB::table('customers')->where('id',session()->get('USER_ID'))->first();
    return view('front.profile',compact('basic_detail','categories','customer'));
}
public  function my_orders(){
  if(!session()->has('USER_LOGIN')){
    return redirect()->route('register');
  }
  $categories = Category::select('*')->get();
  $basic_detail = BasicDetail::find(1);
  $customer =  DB::table('customers')->where('id',session()->get('USER_ID'))->first();
  $order_data =  DB::table('orders')->where('customer_id',session()->get('USER_ID'))->get();
  return view('front.orders',compact('basic_detail','categories','customer','order_data'));
}
public function update_profile(Request $request){
  $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'required|min:10|max:10',
            //'username' => 'required|max:255|unique:customers',
            'email' => 'required|email|max:255',
            //'password' => 'required|min:6',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'interests' => 'array|min:1|required',
        ]);
  try{
      DB::beginTransaction();
      $array = [
              'first_name'=>$request->first_name,
              'last_name'=>$request->last_name,
              // 'username'=>$request->username,
              // 'password'=>Crypt::encrypt($request->password),
              'email'=>$request->email,
              'mobile'=>$request->mobile,
              'phone'=>$request->phone,
              'gender'=>$request->gender,
              'interests'=> implode(',',$request->interests),
              'status'=> 'Active',
           ];
      if(!$array){
          DB::rollback();
          return back()->with('error','Error occured, please try again');
      }
    $cust_id = DB::table('customers')->where('id',session()->get('USER_ID'))->update($array);
      DB::commit();
      return back()->with('success','Profile updated successfully');
  }catch(\Throwable $th){
          DB::rollBack();
          return $th;
  }
}
public function order_detail($id)
{
    //
    $order = Order::leftJoin('customers', 'customers.id','=','orders.customer_id')
    ->where('orders.id',$id)
    ->select('orders.*','orders.status as ord_status','orders.id as ord_id','customers.*')
    ->first();
    $order_details = DB::table('order_details')->where('order_id',$id)->get();
    $categories = Category::select('*')->get();
    $basic_detail = BasicDetail::find(1);

    return view('front.order_detail',compact('basic_detail','categories','order','order_details'));
}
}
