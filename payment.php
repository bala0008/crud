<?php
session_start();
require_once("config/config.php");
include_once('easebuzz-lib/easebuzz_payment_gateway.php');
$MERCHANT_KEY = "10PBP71ABZ2";
$SALT = "ABC55E8IBW";         
$ENV = "test";   // set enviroment name
$easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
// echo "<pre>";
// print_r($easebuzzObj);
$text_id='Test'.rand(1,100);
$amount=$_POST['analystID'];
$postData = array ( 
    "txnid" => $text_id, 
    "amount" => $amount.".0", 
    "firstname" => $_SESSION['name'], 
    "email" =>  $_SESSION['email'], 
    "phone" => "1231231235", 
    "productinfo" => "Test", 
    "surl" => "http://localhost/crud/success.php", 
    "furl" => "http://localhost/crud/failed.php", 
    "udf1" => "aaaa", 
    "udf2" => "aaaa", 
    "udf3" => "aaaa", 
    "udf4" => "aaaa", 
    "udf5" => "aaaa", 
    "address1" => "aaaa", 
    "address2" => "aaaa", 
    "city" => "aaaa", 
    "state" => "aaaa", 
    "country" => "aaaa", 
    "zipcode" => "123123" 
);

$data=$easebuzzObj->initiatePaymentAPI($postData);    
echo"<pre>";
print_r($data);

?>