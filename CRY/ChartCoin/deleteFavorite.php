<?php
$token=$_GET["token"];
$parameter=array(
    'del'=>$_GET["del"]
);
$header=array('Authorization: '.$token);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://cryws.herokuapp.com/api/accounts/favorites/".$_GET['del']);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($parameter));   // post data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
$json_array=json_decode($json,true);
echo $json_array["success"];
?>