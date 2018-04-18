<?php
//echo $_GET["password"];
$parameter=array(
  'password'=>$_GET["password"]
);
$header=array('Authorization: JWT eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InF1b2NodXkiLCJydWxlIjoidXNlciJ9.RIBAJ_JOoiOw_Z_U4qUxb2yPZvZeOjrQKxba7iyERwM');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://cryws.herokuapp.com/api/accounts/password/".$_GET['password']);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($parameter));   // post data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
echo $json;
?>