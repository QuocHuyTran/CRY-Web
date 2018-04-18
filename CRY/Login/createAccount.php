
<?php
$username=$_GET['username'];
$password=$_GET['password'];
$ch = curl_init();
$data="username=".$username."&password=".$password;
curl_setopt($ch, CURLOPT_URL, "http://cryws.herokuapp.com/api/accounts/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);   // post data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
$json_object=json_decode($json,true);
echo  $json_object["success"];
// echo $json;
?>