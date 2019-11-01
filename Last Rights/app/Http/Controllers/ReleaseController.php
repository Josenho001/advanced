<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identified;
use Validator;
use Session;
use Image;
use Storage;
use Carbon\Carbon;


class ReleaseController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $timenow = date('M j, Y H:i a');

        $identified = Identified::find($id);
    $date = Carbon::parse(date('M j, Y h:i a',strtotime( $identified->created_at)));
$now = Carbon::now();

$diff = $date->diffInDays($now);
   $total = $diff*16000+2000;
   Session::put('total', $total);
   

        //$timethen = date('M j, Y h:i a',strtotime( $identified->created_at));

        return view('pages.final')->withIdentified($identified);
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
