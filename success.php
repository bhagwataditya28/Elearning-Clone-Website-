<?php
 //session start
session_start();

require("./instamojo-php-0.4/src/Instamojo.php");
require("./credn.php");
require('./connection.php');
//create api object
$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');



try {
    $payment_re_id=$_GET['payment_request_id'];
    $payment_id=$_GET['payment_id'];
    $response = $api->paymentRequestPaymentStatus($payment_re_id,$payment_id);
 echo('<pre>');
       print_r($response);
// fetch data
//
$status=$response['status'];

if(strcmp($status,'failed')==0){

    echo('failed');
}
else
{
    //sending to database
$orderid=$_SESSION["orderid"];
$buyerid=$_SESSION["buyerid"];
$amount=$_SESSION["amount"];


$query="Insert into `payment`(`orderid`, `paymentid`, `buyerid`, `amount`, `txnstatus`)
    values('$orderid','$paymentid','$buyerid','$amount','$txnstatus')";

if(mysqli_query($conn,$query)){
    
echo 'order done';
echo 'payment_id: '.$payment_id;
}
else{
echo'error' .mysqli_error($conn);
}
}
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>
 //