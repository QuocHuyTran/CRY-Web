<?php
include ("C:/xampp/htdocs/CRY/Main/Object/CoinAPI.php");
include ("C:/xampp/htdocs/CRY/Main/Object/Coin.php");
include ("C:/xampp/htdocs/CRY/Main/Object/Last_Values.php");

$coinAPI=new CoinAPI();
$start=0;
$end=200;
$json_string=file_get_contents($coinAPI->getAPI_COINS_LIMIT($start,$end));
$json_array=json_decode($json_string,true);
$response_text="";

for ($i=$start;$i<$end-1;$i++)
{
    $coin=new Coin(
        $json_array[$i]["name"],
        $json_array[$i]["symbol"],
        $json_array[$i]["available_supply"]
    );

    $last_values=new Last_Values(
        $json_array[$i]["last_values"]["timeStamp"],
        $json_array[$i]["last_values"]["price"],
        $json_array[$i]["last_values"]["marketcap"],
        $json_array[$i]["last_values"]["volume24"],
        $json_array[$i]["last_values"]["change_1h"],
        $json_array[$i]["last_values"]["change_24h"]
    );



    $coin->setLastValues($last_values);

    $response_text=$response_text."<tr class='tr-coin' onclick='temp(".$i.")'>
                    <td>".$coin->getSymbol()."</td>
                    <td>".$coin->getLastValues()->getPrice()."</td>";
                    if($coin->getLastValues()->getChange1h() < 0)
                    {
                        $response_text=$response_text.
                            "<td style='color: red'>".$coin->getLastValues()->getChange1h()."</td>";
                    }
                    else{
                        $response_text=$response_text.
                            "<td style='color: green'>".$coin->getLastValues()->getChange1h()."</td>";
                    }
                    $response_text=$response_text."</tr>";
}


echo $response_text;
//echo $json_array[0]["all_values"][1]["price"];
//$mang1 = array(360,310,310,330,313,375,456,111,256);
//$min=max($mang1);
//echo $min;
?>

