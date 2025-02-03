<?php
//session start
session_start();

require("./instamojo-php-0.4/src/Instamojo.php");
require("./credn.php");
//create api object
$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');

// fetch data from form
$name=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];


$custid="aditya";
// storing in session


$_SESSION["name"]=$name;
$_SESSION["email"]=$email;
$_SESSION["contact"]=$contact;
$_SESSION["custid_id"]=$custid;


// 1. payment request creation
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Payment For Registration",
            "amount" => "149.00",
            "buyer_name" => "$name",
            "email" => "$email",
            "phone" => "$contact",
           
            
        "redirect_url" => "http://localhost/elearning1/success.php"
        ));
 echo("<pre>"); 
 print_r($response);
echo $url=$response["longurl"];
    header("location:$url");

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



?>