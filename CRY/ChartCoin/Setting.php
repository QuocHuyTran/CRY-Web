<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .dropdown button{
            background-color: #002752;
            margin-top: 15px;
            padding: 0px;
            border: none;
        }

        #idLinkWeb{
            color: white;
        }


        #idMenu{
            background-color: #002752;
            /*color: white;*/
        }

        #idMenu a{
            color: white;
        }

        .container-fluid{
            background-color: #002752;
        }

        #body-setting-page{
            width: 100%;
            height: 800px;
            position: relative;
            background-color:#0c5460 ;
        }

        #left-setting-page{
            position: relative;
            height: 100%;
            width: 20%;
            background-color:#0c5460 ;
        }

        #center-setting-page{
            position: absolute;
            height: 100%;
            width: 60%;
            background-color: green;
            top: 0px;
            left: 270px;
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
                        <?php echo "Welcome ".$_GET["username"] ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="idMenu">
                        <li><a href="#">Information</a></li>
                        <li><a href="#">Setting</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div id="body-setting-page">
    <div id="left-setting-page">
<!--        <img src="" alt="">-->
    </div>
    <div id="center-setting-page">
        <table class="table"
               style="cursor: pointer;background-color:#002752;color: white ">
            <thead>
            <tr>
                <th>Coin</th>
                <th>Price</th>
                <th>Change</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody id="table_body">

            </tbody>
        </table>
    </div>
</div>
<script>

    function loadTable(){
        var xhttp = new XMLHttpRequest();
        var token='<?php echo $_GET["token"]?>';
        window.alert(token);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // window.alert(this.responseText);
                document.getElementById("table_body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getFavorite.php?token="+token, true);
        xhttp.send();
    }

    function deleteFavorite(index)
    {
        var elements=document.getElementsByClassName('tr-favorite');
        var symbolElements=elements[index].getElementsByTagName('td');
        var xhttp = new XMLHttpRequest();
        var token='<?php echo $_GET["token"]?>';
        var coin_symbol=symbolElements[0].innerHTML;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.alert(this.responseText);
                if(this.responseText==1)
                {
                    loadTable();
                }
            }
        };
        xhttp.open("GET", "deleteFavorite.php?del="+coin_symbol+"&token="+token, true);
        xhttp.send();
    }
    loadTable();
</script>
</body>
</html>