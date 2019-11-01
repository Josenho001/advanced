        $amount=$request->input('amount');
          $phone=$request->input('phone');
            $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
              
              $curl = curl_init();
              curl_setopt($curl, CURLOPT_URL, $url);
    $credentials = base64_encode('S2LUXRrHr9x5ow6bz7sluhrgTNx7g2hy:0BFJ6j4EBnJvK5gM');
              curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
              
              $curl_response = curl_exec($curl);
              
              $json_decode = json_decode($curl_response);
              $access_token = $json_decode->access_token;


              $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
  
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


            $curl_post_data = array(
              //Fill in the request parameters with valid values
              'ShortCode' => '600000',
              'ResponseType' => 'Completed',
              'ConfirmationURL' => 'http://79b98077.ngrok.io/confirm.php',
              'ValidationURL' => 'http://79b98077.ngrok.io/validate.php'
            );

            $data_string = json_encode($curl_post_data);


            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

            $curl_response = curl_exec($curl);
            //return $curl_response;

            //return $curl_response;

              $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
            
              $curl = curl_init();
              curl_setopt($curl, CURLOPT_URL, $url);
              curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header
            
              $curl_post_data = array(
            //Fill in the request parameters with valid values
                     'ShortCode' => '600000',
                     'CommandID' => 'CustomerPayBillOnline',
                     'Amount' => $amount,
                     'Msisdn' => $phone,
                     'BillRefNumber' => 'WaterToken'
              );

              //return $curl_post_data;
            
              $data_string = json_encode($curl_post_data);
            
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($curl, CURLOPT_POST, true);
              curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            
              $curl_response = curl_exec($curl);
            
            $CallBackURL = 'http://96c9de74.ngrok.io/confirm.php';      


