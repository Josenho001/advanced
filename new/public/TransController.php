<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Tran;
use App\Device;
use App\Meter;

class TransController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public $table = 'trans';

    public $primaryKey = 'id';
    
     

    public function index()
    {
         $trans = Tran::all();

        $trans = Tran::orderBy('id','desc')->paginate(10);

        return view('pages.pay')->withTrans($trans);


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
        
        $meter =Meter::find($meter);


      $phone=$request->input('phone');
     $meter=$request->input('meter');
        $amount=$request->input('amount');


        //Session::flash('success', 'New device has been created');
       // return redirect()->back();
                  date_default_timezone_set('Africa/Nairobi');
                  # access token
                  $consumerKey = 'GB1duyx19WWzRzmkXgL7jLpamAi0zog4'; //Fill with your app Consumer Key
                  $consumerSecret = 'ukEhbqvqdAD5D0wS'; // Fill with your app Secret
                  $headers = ['Content-Type:application/json; charset=utf8'];
                  $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                  curl_setopt($curl, CURLOPT_HEADER, FALSE);
                  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
                  $result = curl_exec($curl);
                  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                  $result = json_decode($result);
                  $access_token = $result->access_token;
                  echo $access_token;
                  
                  # define the variales
                  # provide the following details, this part is found on your test credentials on the developer account
                  $BusinessShortCode = '174379';
                  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
                  
                  /*
                    This are your info, for
                    $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
                    $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
                    TransactionDesc can be anything, probably a better description of or the transaction
                    $Amount this is the total invoiced amount, Any amount here will be 
                    actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
                    for developer/test accounts, this money will be reversed automatically by midnight.
                  */
                  
                  $PartyA = $phone; // This is your phone number, 
                  //$AccountReference = 'CAT001';
                  $AccountReference = $meter;
                  $TransactionDesc = 'Cart Pay For Online';
                  $Amount = $amount;
                 
                  # Get the timestamp, format YYYYmmddhms -> 20181004151020
                  $Timestamp = date('YmdHis');    
                  
                  # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
                  $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
                  # header for access token
                  $headers = ['Content-Type:application/json; charset=utf8'];
                    # M-PESA endpoint urls
                  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
                  $theurl=config('app.url');
               
                  # callback url  
                  $CallBackURL = 'http://927f1b0e.ngrok.io/Callback_url.php';      
                  $curl = curl_init($access_token_url);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                  curl_setopt($curl, CURLOPT_HEADER, FALSE);
                  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
                  $result = curl_exec($curl);
                  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                  $result = json_decode($result);
                  $access_token = $result->access_token;  
                  curl_close($curl);
                  # header for stk push
                  $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
                  # initiating the transaction
                  $curl = curl_init();
                  curl_setopt($curl, CURLOPT_URL, $initiate_url);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
                  $curl_post_data = array(
                    //Fill in the request parameters with valid values
                    'BusinessShortCode' => $BusinessShortCode,
                    'Password' => $Password,
                    'Timestamp' => $Timestamp,
                    'TransactionType' => 'CustomerPayBillOnline',
                    'Amount' => $Amount,
                    'PartyA' => $PartyA,
                    'PartyB' => $BusinessShortCode,
                    'PhoneNumber' => $PartyA,
                    'CallBackURL' => $CallBackURL,
                    'AccountReference' => $AccountReference,
                    'TransactionDesc' => $TransactionDesc
                  );
                  $data_string = json_encode($curl_post_data);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_POST, true);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                  $curl_response = curl_exec($curl);
                  print_r($curl_response);
                  echo $curl_response;
                  $arr = json_decode($curl_response, true);
                  if(isset($arr["ResponseCode"])){
                  if ($arr["ResponseCode"]==0){
        $message ="successful wait for a pop up on your phone";
        return back()->with('message',$message);
        }
        else{
        $message ="failed. Please try again";
        //return back()->with('message',$message);
        }
    }

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
