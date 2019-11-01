<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tran;
use App\Device;
use App\Meter;
use DB;
use App\Quotation;
use Session;

class CallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "pinging";



        //
         $stkCallbackResponse = file_get_contents('php://input');   
         $arr = json_decode($stkCallbackResponse,true);

        if($arr["Body"]["stkCallback"]["ResultCode"]==0){
           $array2 = $arr["Body"]["stkCallback"]["CallbackMetadata"]["Item"];
           $stkresponse = "Response Code: ".$arr["Body"]["stkCallback"]["ResultCode"]."--"."Amount: ".$array2[0]["Value"]."--"."MpesaReceiptNumber: ".$array2[1]["Value"]."--"."TransactionDate: ".$array2[3]["Value"]."--"."PhoneNumber: ".$array2[4]["Value"];
             
         
            $phone=$array2[4]["Value"];
            $amount=$array2[0]["Value"];
            $reference=$array2[1]["Value"];

        DB::insert('insert into trans (phone,amount,reference) values(?,?,?)',$phone,$amount,$reference);


           // DB::insert('insert into trans (phone,amount,reference) values(?,?,?)',[25470000000,1,"MTKWEA90"]);
                                 
                                       
          }
          else{
           $stkresponse= "Response Code: ".$arr["Body"]["stkCallback"]["ResultCode"]."--"."Failed";
          }
             
         
         $logFile = "stkPushCallbackResponse8.txt";
         $log = fopen($logFile, "w");
         fwrite($log, $stkresponse );
         fclose($log);
         

    }

    /**
   
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
