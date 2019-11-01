<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identified;
use Validator;
use Session;
use Image;
use Storage;

class IdentifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $identifieds = Identified::orderBy('id', 'desc')->paginate(5);
        return view('pages.known')->withIdentifieds($identifieds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages.identified');
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
            'name'        =>  'required|max:255',
            'height'         =>  'required',
            'avg'  =>  'required',
            'marks' => 'required',
            'gender' => 'required',
            'pname' => 'required|max:255',
            'national' =>'required|min:7',
            'phone' => 'sometimes',
            'featured_image' => 'sometimes|image'
        ));
        //store

        $identified = new Identified;
        $identified->name= $request->name;
        $identified->height= $request->height;
        $identified->avg=$request->avg;
        $identified->marks=$request->marks;
        $identified->gender= $request->gender;
        $identified->pname= $request->pname;
        $identified->national= $request->national;
        $identified->phone= $request->phone;

        if ($request->hasFile('featured_image')) {
            # code...
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/photos/' . $filename);
            Image::make($image)->resize(150, 150)->save($location);

             $identified->image = $filename;
        }
        $identified->save();

        Session::flash('savedeceased','The Deceased was successfully saved in the system');

        //return
        return redirect()->route('identity.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $identified = Identified::find($id);
        return view('pages.show')->withIdentified($identified);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $identified = Identified::find($id);
        
        

        //return a view andreturn it in the var we created
        return view('pages.edit')->withIdentified($identified);
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
        $identified = Identified::find($id);

         $this->validate($request, array(
            'name'        =>  'required|max:255',
            'height'         =>  'required',
            'avg'  =>  'required',
            'marks' => 'required',
            'gender' => 'required',
            'pname' => 'required|max:255',
            'national' =>'required|min:7',
            'phone' => '',
            'featured_image' => 'image'
        ));
         $identified = Identified::find($id);


       $identified = new Identified;
        $identified->name= $request->input('name');
        $identified->height= $request->input('height');
        $identified->avg=$request->input('avg');
        $identified->marks=$request->input('marks');
        $identified->gender= $request->input('gender');
        $identified->pname= $request->input('pname');
        $identified->national= $request->input('national');
        $identified->phone= $request->input('phone');

            if ($request->hasFile('featured_image')) {
          
            //add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/photos/' . $filename);
            Image::make($image)->resize(150, 150)->save($location);
            $oldFilename = $identified->image;
       
            //update the db

             $identified->image = $filename;
       
                //delete old image
             Storage::delete($oldFilename); 
         }
       
        
         
       
          $identified->save();


        //set flash with success msg

          Session::flash('success','This post was successfully saved');
        //redirect with flash data
          return redirect()->route('identity.show',$identified->id);

    
    
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
