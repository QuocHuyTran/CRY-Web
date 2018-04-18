
<?php
//$header[]='Authorization: JWT eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InF1b2NodXkiLCJydWxlIjoidXNlciJ9.
//RIBAJ_JOoiOw_Z_U4qUxb2yPZvZeOjrQKxba7iyERwM , Content-Type: application/json';
include ("C:/xampp/htdocs/CRY/Main/Object/CoinAPI.php");
$token=$_GET["token"];
$coin=$_GET["coin"];
$index=$_GET["index"];
$coinAPI =new CoinAPI();
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
//echo $json;
$json_string=file_get_contents($coinAPI->getAPI_COIN_NONCHART($coin));
$json_array=json_decode($json_string,true);
$response_text="";

$response_text="<tr class='tr-favorite' onclick='tempFavorite(".$index.")'>
                    <td>".$json_array[0]["symbol"]."</td>
                    <td>". $json_array[0]["last_values"]["price"]."</td>";
if( $json_array[0]["last_values"]["change_1h"] < 0)
{
    $response_text=$response_text.
        "<td style='color: red'>". $json_array[0]["last_values"]["change_1h"]."</td>";
}
else{
    $response_text=$response_text.
        "<td style='color: green'>". $json_array[0]["last_values"]["change_1h"]."</td>";
}
$response_text=$response_text."</tr>";
echo $response_text;
//echo json_encode($fields);
?>