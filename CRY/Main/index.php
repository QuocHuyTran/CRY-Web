<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRY</title>
    <script src="jssor.slider.min.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .table tr:hover{
        background-color: #0c5460;
    }
</style>
<body style="background-color: #004085">
<div class="jumbotron text-center" style="margin: 0px;">
    <h1>CRYWS.HEROKUAPP.COM</h1>
    <p>THE WORLD 'S LARGEST  WEB COIN SITE !</p>
</div>
<nav class="navbar navbar-default" style="margin: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" id="idLinkWeb" href="#">CRYWS.HEROKUAPP.COM</a>
        </div>
        <ul class="nav navbar-nav" >
            <li>
                <div class="dropdown" style="margin-left: 500%;">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <?php echo "Welcome ".$_GET["username"] ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="idMenu">
                        <li><a href="#" onclick="go_to_changePass()">Information</a></li>
                        <li><a href="#" onclick="go_to_setting()">Setting</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div id="jssor_1" style="position:relative;margin:0;top:0px;left:0px;width:1400px;height:500px;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin"
         style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1400px;height:500px;">
        <div>
            <img data-u="image" src="img/gallery/1300x500/001.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/gallery/1300x500/002.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/gallery/1300x500/003.jpg" />
        </div>
        <div style="background-color:#ff7c28;">
            <div style="position:absolute;top:50px;left:50px;width:450px;height:62px;z-index:0;font-size:16px;color:#000000;line-height:24px;text-align:left;padding:5px;box-sizing:border-box;">Photos in this slider are to demostrate jssor slider,<br />
                which are not licensed for any other purpose.
            </div>
        </div>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:16px;height:16px;">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>

<div class="container">
    <div class="btn-group" style="margin-left: 45%">
        <button type="button" class="btn btn-primary">All</button>
        <button type="button" class="btn btn-primary">Favorite</button>
    </div>
</div>

<div class="container" style="margin-top: 1px;
padding: 0px;background-color:#002752;color: white; ">
    <table class="table" style="cursor: pointer">
        <thead>
        <tr>
            <th></th>
            <th>Coin</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Change</th>
            <th>Highest</th>
            <th>Lowest</th>
            <th>Volume 24h</th>
        </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
    </table>
</div>
<div class="container">
    <ul class="pagination">
        <li onclick="loadTable(1)"><a href="#">1</a></li>
        <li onclick="loadTable(2)"><a href="#">2</a></li>
        <li onclick="loadTable(3)"><a href="#">3</a></li>
        <li onclick="loadTable(4)"><a href="#">4</a></li>
        <li onclick="loadTable(5)"><a href="#">5</a></li>
    </ul>
</div>

<div class="container" style="width: 100%;height: 500px;background-color: red">
    <ul class="list-software" style="list-style-type: none" id="ulSoftware">
            <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
            <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
            <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
        <br>
        <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
        <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
        <li><img src="http://cryws.herokuapp.com/res/coins_high/128/icon/BTC.png" alt=""></li>
    </ul>
</div>
<script>
    jssor_1_slider_init();

    function go_to_setting() {
        var token='<?php echo $_GET["token"]?>';
        // window.alert("hello");
        window.location="http://localhost:7331/CRY/ChartCoin/Setting.php?token="+token;
    }

    function go_to_changePass() {
        var token='<?php echo $_GET["token"]?>';
        // window.alert("hello");
        window.location="http://localhost:7331/CRY/EditPass/index.php?token="+token;
    }

    function loadTable(pageIndex){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table_body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "showListCoin.php?page="+pageIndex, true);
        xhttp.send();
    }

    function seeCoin(index){
        var elements=document.getElementsByClassName('tr-coin');
        var symbolElements=elements[index].getElementsByTagName('td');
        var token='<?php echo $_GET["token"]?>';
        window.alert(symbolElements[2].innerHTML);
        window.location="http://localhost:7331/CRY/ChartCoin/Chart.php?coin="+symbolElements[2].innerHTML+"&token="+token;
        // window.alert(index)
    }
    loadTable(1);
</script>
</body>
</html>