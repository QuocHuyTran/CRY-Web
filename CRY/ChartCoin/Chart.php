<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Chart.css">
    <script src="index.js"></script>
    <script src="highcharts.js"></script>
    <script src="series-label.js"></script>
    <script src="exporting.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .table tr:hover{
            background-color: #0c5460;
        }

        #coin-field{
            position: relative;
            width: 100%;
            height: 50px;
            background-color: #000040;
            color: white;
        }

        #list-coin-field{
            position: relative;
            margin: 5px;
            width: 96%;
            height:50%;
            background-color: #1e7e34;
            overflow: scroll;
        }

        #list-coin-field-favorite{
            position: relative;
            margin: 5px;
            width: 96%;
            height:30%;
            background-color: #1e7e34;
            overflow: scroll;
        }

        #left-page{
            width: 20%;
            height: 1200px;
            background-color: #002752;
            position: absolute;
            margin-top: 10px;
        }


    </style>
</head>
<body style="background-color: #004085">

<nav class="navbar navbar-default" style="margin: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" id="idLinkWeb" href="#">CRYWS.HEROKUAPP.COM</a>
        </div>
        <ul class="nav navbar-nav" >
            <li>
                <div class="dropdown" style="margin-left: 500%;">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <?php echo "Welcome Trần Quốc Huy" ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="idMenu">
                        <li><a href="#">Information</a></li>
                        <li><a onclick="go_to_setting()">Setting</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div id="body-page">
    <div id="left-page">
        <div id="logo-field"></div>
        <div id="list-coin-field">
            <table class="table"
                   style="cursor: pointer;background-color:#002752;color: white ">
                <thead>
                <tr>
                    <th>Coin</th>
                    <th>Price</th>
                    <th>Change</th>
                </tr>
                </thead>
                <tbody id="table_body">

                </tbody>
            </table>
        </div>

        <div id="list-coin-field-favorite">
            <table class="table"
                   style="cursor: pointer;background-color:#002752;color: white ">
                <thead>
                <tr>
                    <th>Coin</th>
                    <th>Price</th>
                    <th>Change</th>
                </tr>
                </thead>
                <tbody id="table_body_favorite">

                </tbody>
            </table>
        </div>
    </div>
    <div id="right-page">
        <div id="coin-field">

            <?php
            include "C:/xampp/htdocs/CRY/Main/Object/CoinAPI.php";
            $coin_name=$_GET["coin"];
            $coinAPI=new CoinAPI();
            $json_string=file_get_contents($coinAPI->getAPICOIN($coin_name));
            $json_array=json_decode($json_string,true);

            echo "  <table class=\"table\"
                   style=\"cursor: pointer;background-color:#002752;color: white \">
                <thead>
                <tr class='tr-theme'>
                    <th>".$json_array[0]["name"].".</th>
                    <th>"."PRICE ".$json_array[0]["last_values"]["price"]."</th>
                    <th>"."CHANGE ".$json_array[0]["last_values"]["change_1h"]."</th>
                </tr>
                </thead>
            </table>"
            ?>
        </div>
        <div id="chart-field">

        </div>
        <div class="btn-group" style="margin-left: 80%;">
            <button id="id_btn_favorite" type="button" class="btn btn-primary" onclick="addFavorite()">Favorite</button>
            <button type="button" class="btn btn-primary">Notification</button>
        </div>
    </div>
</div>
<script>

    function go_to_setting() {
        var token='<?php echo $_GET["token"]?>';
        window.alert("hello");
        window.location="http://localhost:7331/CRY/ChartCoin/Setting.php?token="+token;
    }

    
    function addFavorite() {
        var countFavorite=document.getElementsByClassName('tr-favorite');
        var coin_choose='<?php echo $_GET["coin"]?>';
        var token='<?php echo $_GET["token"]?>';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table_body_favorite").innerHTML =
                    document.getElementById("table_body_favorite").innerHTML+this.responseText;
            }
        };
        xhttp.open("GET", "addFavorite.php?index="+countFavorite+"&coin="+coin_choose+"&token="+token, true);
        xhttp.send();
    }

    function temp(index) {
        var elements=document.getElementsByClassName('tr-coin');
        var symbolElements=elements[index].getElementsByTagName('td');
        window.location="http://localhost:7331/CRY/ChartCoin/Chart.php?coin="+symbolElements[0].innerHTML;
    }

    function tempFavorite(index) {
        var elements=document.getElementsByClassName('tr-favorite');
        var symbolElements=elements[index].getElementsByTagName('td');
        window.location="http://localhost:7331/CRY/ChartCoin/Chart.php?coin="+symbolElements[0].innerHTML;
    }
    // temp('ETH');

    function loadTable(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table_body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "showListCoin_All.php", true);
        xhttp.send();

        xhttp = new XMLHttpRequest();
        var token='<?php echo $_GET["token"]?>';
        window.alert(token);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // window.alert(this.responseText);
                document.getElementById("table_body_favorite").innerHTML = this.responseText;
                // var countFavorite=document.getElementsByClassName('tr-favorite');
                // window.alert(countFavorite.length);
                checkFavorite();
            }
        };
        xhttp.open("GET", "getFavorite.php?token="+token, true);
        xhttp.send();
    }

    loadTable();

    function ConvertStringtoArray(string,array)
    {
        for(var i=0;i<string.length;i++)
        {
            if(string[i]=='/')
            {
                array.push(parseFloat(string.slice(0,i)));
                string=string.slice(i+1);
                i=0;
            }
        }
        // array.push(parseFloat(string));
    }

    function loadChart() {
        var coin_name='<?php echo $_GET["coin"]?>';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var array=[];
                ConvertStringtoArray(this.responseText,array);
                showBieuDo(array,coin_name);
            }
        };
        xhttp.open("GET", "getChart.php?coin="+coin_name+"&number=7", true);
        xhttp.send();
    }

    function checkFavorite(){
        var coin='<?php echo $_GET["coin"]?>';
        var elements=document.getElementsByClassName('tr-favorite');
        var btnFavorite=document.getElementById('id_btn_favorite');

        for (var i=0;i<elements.length;i++)
        {
            var symbolElements=elements[i].getElementsByTagName('td');
            if(symbolElements[0].innerHTML==coin)
            {
                btnFavorite.style.display='none';
                break;
            }
        }
    }


    setInterval(loadChart, 3000);
    loadChart();
</script>
</body>
</html>