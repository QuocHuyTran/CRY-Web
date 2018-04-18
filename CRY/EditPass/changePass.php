<?php
//echo $_GET["password"];
$token=$_GET["token"];
$parameter=array(
  'password'=>$_GET["password"]
);
echo $_GET["password"];
$header=array('Authorization: '.$token);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://cryws.herokuapp.com/api/accounts/password/".$_GET['password']);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($parameter));   // post data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
echo $json;
?>