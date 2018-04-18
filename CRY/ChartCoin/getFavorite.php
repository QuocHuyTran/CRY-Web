<?php

include ("C:/xampp/htdocs/CRY/Main/Object/CoinAPI.php");

$token=$_GET["token"];
//echo $token;
$header=array();
$header[]='Authorization: '.$token;
$coinAPI=new CoinAPI();
//JWT eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InF1b2NodXkiLCJydWxlIjoidXNlciJ9.RIBAJ_JOoiOw_Z_U4qUxb2yPZvZeOjrQKxba7iyERwM';
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,'http://cryws.herokuapp.com/api/accounts/favorites/');
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json=curl_exec($curl);
//echo $json;
$json_object=json_decode($json,true);
$coin_favorite=array();
$coin_favorite=$json_object["favorites"];
//echo count($coin_favorite);
$response_text="";
for($i=0;$i<count($coin_favorite);$i++)
{
//    echo $coin_favorite[$i]." ";
    $json_string=file_get_contents($coinAPI->getAPI_COIN_NONCHART($coin_favorite[$i]));
    $json_array=json_decode($json_string,true);
//    echo $json_string;
    $response_text=$response_text."<tr class='tr-favorite' onclick='tempFavorite(".$i.")'>
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
    $response_text=$response_text. "<td style='color: red'>"."<button onclick='deleteFavorite(".$i.")'>delete</button>"."</td>"."</tr>";
//    echo $json_array[0]["symbol"];
}
echo $response_text;
?>