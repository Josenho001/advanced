<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Police;
use Image;
use Session;

class PoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$missings = Missing::orderBy('id', 'desc')->paginate(5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.missing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'image' => 'sometimes|image',
            'name' => 'required|max:255',
            'gender' => 'required',
            'skin' => 'required',
            'last' => 'required|max:255',
            'avg' => 'sometimes',
            'height' => 'sometimes',
            'mind' => 'required|max:255',
            'cloth' => 'required|max:255',
            'parent' => 'required|max:255',
            'phone' => 'required|max:12|min:9'
            
        ));
        $police = new Police;
        $police->name = $request->name;
        $police->gender = $request->gender;
        $police->skin = $request->skin;
        $police->last = $request->last;
        $police->avg = $request->avg;
        $police->height = $request->height;
        $police->mind = $request->mind;
        $police->cloth = $request->cloth;
        $police->parent = $request->parent;
        $police->phone = $request->phone;


        if ($request->hasFile('missing_image')) {
            $image = $request->file('missing_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/missing/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);
            $police->image = $filename;
        }
         $police->save();
      Session::flash('save','missing personal were saved in the system!!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
