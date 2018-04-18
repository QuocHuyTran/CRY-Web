<?php
include ("Object/Coin.php");
include ("Object/Last_Values.php");
include ("Object/Max7Days_Values.php");
include  ("Object/CoinAPI.php");
$coinAPI=new CoinAPI();
$PageIndexx=$_GET["page"]-1;
$start=$PageIndexx*20;
$end=$start+19;
//echo $coinAPI->getAPI_COINS_LIMIT($start,$end);
$json_String=file_get_contents($coinAPI->getAPI_COIN_LIMIT_FULL($start,$end));
//echo $json_String;
$json_array=json_decode($json_String,true);
$responseTable="";
for ($i=0;$i<19;$i++)
{
//    $arrayValue=array($json_array[$i]["all_values"]);
//    echo count($json_array[$i]["all_values"]);
    $minValue=min($json_array[$i]["all_values"]);
    $maxValue=max($json_array[$i]["all_values"]);
//    echo $minValue["price"];
    $coin=new Coin($json_array[$i]["name"],
        $json_array[$i]["symbol"],$json_array[$i]["available_supply"]);
    $last_values=new Last_Values(
        $json_array[$i]["last_values"]["timeStamp"],
        $json_array[$i]["last_values"]["price"],
        $json_array[$i]["last_values"]["marketcap"],
        $json_array[$i]["last_values"]["volume24"],
        $json_array[$i]["last_values"]["change_1h"],
        $json_array[$i]["last_values"]["change_24h"]
    );
    $coin->setLastValues($last_values);
    $json_symbol=file_get_contents($coinAPI->getAPI_COIN_SYMBOL($json_array[$i]["symbol"]));
    $responseTable=$responseTable."<tr class='tr-coin' onclick='seeCoin(".$i.")'>
            <td>"."<img src=\" ".$coinAPI->getAPI_COIN_SYMBOL().$coin->getSymbol().".png"."\">"."</td>
            <td>".$coin->getName()."</td>
            <td>".$coin->getSymbol()."</td>
            <td>".$coin->getLastValues()->getPrice()."</td>";
            if($coin->getLastValues()->getChange1h()<0){
                $responseTable=$responseTable.
                    "<td style='color: red'>".$coin->getLastValues()->getChange1h()."&darr;"."</td>";
            }
            else{
                $responseTable=$responseTable.
                    "<td style='color: green'>".$coin->getLastValues()->getChange1h()."&uarr;"."</td>";
            }

          $responseTable=$responseTable.
            "<td>".$maxValue["price"]."</td>
            <td>".$minValue["price"]."</td>
            <td>".$coin->getLastValues()-> getVolume24()."</td>
        </tr>";

//    echo $json_symbol;
}
echo $responseTable;
//echo $json_symbol;
?>
