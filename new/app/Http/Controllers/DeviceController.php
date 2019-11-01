<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Meter;
use App\Tran;
use Session;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */

    
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        
        return view('devices.device');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        //save new category then redirect back to index
        $this->validate($request, array('meter'=>'required|min:12|max:12'));
        $meter = new Meter;
        $meter->meter = $request->meter;
        $meter->save();

          \Session::flash('success', '  New Water Meter Successfully Added To The System.' );
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $meter =Meter::find($id);
        return view('devices.edit')->withMeter($meter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$meters = Meter::all();
        $meter = Meter::find($id);
        $this->validate($request,['meter'=>'required|min:9|max:15']);
        $meter->meter=$request->meter;
        $meter->save();
          \Session::flash('update', '  New Water Meter Successfully Updated.' );

        //return view('pages.admin')->withMeters($meters);
                 return redirect()->route('admin.dashboard',$meter->id );

         //return redirect()->route('pages.admin',$meter->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */

    public function delete($id)
    {
        $meter = Meter::find($id);
        return view('devices.delete')->withMeter($meter);
    }
    public function destroy($id)
    {
    
        $meter = Meter::find($id);

        $meter->delete();

          \Session::flash('delete', '  Water Meter Successfully Deleted.' );

        return redirect()->route('admin.dashboard');
        //return redirect()->route('admin');
    }
    
}
