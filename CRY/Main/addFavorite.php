
<?php
//$header[]='Authorization: JWT eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InF1b2NodXkiLCJydWxlIjoidXNlciJ9.
//RIBAJ_JOoiOw_Z_U4qUxb2yPZvZeOjrQKxba7iyERwM , Content-Type: application/json';

$token=$_GET["token"];
$coin=$_GET["coin"];
$header=array('Authorization: '.$token,
                  'Content-Type: application/json');
$ch = curl_init();
$favorite_coin=array();
array_push($favorite_coin,$coin);
$fields=array('favorites'=>$favorite_coin);

//rtrim($fields_string,'&');
curl_setopt($ch, CURLOPT_URL, "http://cryws.herokuapp.com/api/accounts/favorites/");
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($fields));   // post data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
$json_object=json_decode($json,true);
//echo $json_object["success"];
echo $json;
//echo json_encode($fields);
?>