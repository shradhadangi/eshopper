<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use DB;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $values = Size::all();
        return view('admin.size.add')->with([
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
            'name' => 'required',
        ]);
        try{
            DB::beginTransaction();
                $create = Size::create([
                  'size'=>ucfirst($request->name),
            ]);
            if(!$create){
                DB::rollBack();
                return back()->with('error','Error Occured, Try Again.');
            }
            DB::commit();
            return back()->with('success','Size Added Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $Size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $Size)
    {
        //
        if(!$Size){
            return back()->with('error','Record not found.');
        }else{
            return view('admin.size.edit')->with([
                'value'=>$Size,
                'success'=>'Record found successfully.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $Size)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        try{
         DB::beginTransaction();
        $create = Size::where('id',$Size->id)->update([
            'size'=>ucfirst($request->name),
      ]);
        if(!$create){
            DB::rollBack();
            return back()->with('error','Error Occured, Try Again.');
        }
        DB::commit();
        return back()->with('success','Size  Upadetd Successfully.');
        }catch(\Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $Size)
    {
        //
        if($Size){
            $Size->delete();
            return back()->with('success','Size  deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
