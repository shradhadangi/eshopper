<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use DB;
class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enquiries = Enquiry::select('*')->get();
        return view('admin.enquiry.list',compact('enquiries'));
    }

    public function newsletters()
    {
        //
        $enquiries = DB::table('newsletters')->get();
        return view('admin.enquiry.newsletters',compact('enquiries'));
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
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy($enquiry)
    {
        //
        if($enquiry){
            Enquiry::where('id',$enquiry)->delete();
            return back()->with('success','Enquiry deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
    public function delete_newsletter($enquiry)
    {
        //
        if($enquiry){
            DB::table('newsletters')->where('id',$enquiry)->delete();
            return back()->with('success','Enquiry deleted successfully');
        }else{
            return back()->with('error','Error occured, try again.');
        }
    }
}
