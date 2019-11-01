<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidentified;
use Session;
use Image;
use Storage;

class UnidentifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin,web');
    }
    public function index()
    {
        $unidentifieds = Unidentified::orderBy('id', 'desc')->paginate(5);
        return view('pages.unknown')->withUnidentifieds($unidentifieds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.unidentified');
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
            'skin'        =>  'required|max:255',
            'height'         =>  'required|numeric|between:0,99.99',
            'avg'  =>  'required|numeric|between:0,99.99',
            'marks' => 'required',
            'gender' => 'required',
            'area' => 'required|max:20',
            'ob' => 'min:5|max:15',
            'pname' => 'required|max:100',
            'national' => 'required|min:7',
            'phone' => 'required|min:10',
            'featured_image' => 'sometimes|image'
        ));
        //store
        $unidentified = new Unidentified;
        $unidentified->skin= $request->skin;
        $unidentified->height= $request->height;
        $unidentified->avg=$request->avg;
        $unidentified->marks=$request->marks;
        $unidentified->gender= $request->gender;
        $unidentified->area=$request->area;
        $unidentified->ob=$request->ob;
        $unidentified->pname=$request->pname;
        $unidentified->national=$request->national;
        $unidentified->phone=$request->phone;

         if ($request->hasFile('featured_image')) {
            # code...
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/photos/' . $filename);
            Image::make($image)->resize(150, 150)->save($location);

             $unidentified->image = $filename;
       
         }
        $unidentified->save();

        Session::flash('savedeceasedd','The Deceased was successfully saved in the system');

        //return
        return redirect()->route('unidentified.index');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $unidentified = Unidentified::find($id);
        return view('pages.show1')->withUnidentified($unidentified);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $unidentified = Unidentified::find($id);
        
        

        //return a view andreturn it in the var we created
        return view('pages.edit1')->withUnidentified($unidentified);
    
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
        //validate the data
        $unidentified = Unidentified::find($id);

        $this->validate($request, array(
            'skin'        =>  'required|max:255',
            'height'         =>  'required|numeric|between:0,99.99',
            'avg'  =>  'required|numeric|between:0,99.99',
            'marks' => 'required',
            'gender' => 'required',
            'area' => 'required|max:20',
            'ob' => 'min:5|max:15',
            'pname' => 'required|max:100',
            'national' => 'required|min:7',
            'phone' => 'required|min:8',
            'featured_image' => 'image'
        ));//save the data in db
          $unidentified = Unidentified::find($id);


           // $unidentified = new Unidentified;
        $unidentified->skin= $request->input('skin');
        $unidentified->height= $request->input('height');
        $unidentified->avg=$request->input('avg');
        $unidentified->marks=$request->input('marks');
        $unidentified->gender= $request->input('gender');
        $unidentified->area=$request->input('area');
        $unidentified->ob=$request->input('ob');
        $unidentified->pname=$request->input('pname');
        $unidentified->national=$request->input('national');
        $unidentified->phone=$request->input('phone');

         if ($request->hasFile('featured_image')) {
          
            //add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/photos/' . $filename);
            Image::make($image)->resize(150, 150)->save($location);
            $oldFilename = $unidentified->image;
       
            //update the db

             $unidentified->image = $filename;
       
                //delete old image
             Storage::delete($oldFilename); 
         }
       
          $unidentified->save();


        //set flash with success msg

          Session::flash('success','This post was successfully saved');
        //redirect with flash data
          return redirect()->route('unidentified.show',$unidentified->id);

    
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
