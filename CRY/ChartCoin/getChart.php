<?php
    include "C:/xampp/htdocs/CRY/Main/Object/CoinAPI.php";
    $coin_name=$_GET["coin"];
    $number_nearly_day=$_GET["number"];
    $coinAPI=new CoinAPI();
    $json_string=file_get_contents($coinAPI->getAPICOIN($coin_name));
    $json_array=json_decode($json_string,true);
    $json_response="";
    for($i=0;$i<$number_nearly_day;$i++)
    {
        $json_response=$json_response.$json_array[0]["all_values"][$i]["price"]."/";
    }
    echo $json_response;
//    echo count($json_array[0]["all_values"])
?>