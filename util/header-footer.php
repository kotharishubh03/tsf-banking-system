<?php

    function head($title) {

    echo('<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" type="text/css" href="./util/w3.css">
        <title>'. $title .'</title>
    </head>');

    }

    function flashMessage()
{
    if (isset($_SESSION['error'])) {
        echo('<div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-red"> 
                <span onclick="document.getElementById('."'id01'".').style.display='."'none'".'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h2>ERROR !!</h2>
            </header>
            <div class="w3-container w3-pale-red">
                <p>'.$_SESSION['error'].'</p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('."'id01'".').style.display='."'block'".'
    </script>');
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {

    echo('<div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-green"> 
                    <span onclick="document.getElementById('."'id01'".').style.display='."'none'".'" 
                        class="w3-button w3-display-topright">&times;</span>
                    <h2>SUCCESS !!</h2>
                </header>
                <div class="w3-container w3-pale-green">
                    <p>'.htmlentities($_SESSION['success']).'</p>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('."'id01'".').style.display='."'block'".'
        </script>');

  unset($_SESSION['success']);
    }





}

    function navbar($st) {
        echo('<div class="w3-bar w3-large sk-theme-navlink w3-border-bottom" style="background-color: #5CDB95;">');
        if ($st==0){echo('<a href="#" class="w3-bar-item w3-button " style="text-shadow:1px 1px 0 #444;color:#EDf5E1">TSF BANK</a>');}
            else {echo('<a href="#" class="w3-bar-item w3-button " style="text-shadow:1px 1px 0 #444;color:#EDf5E1">TSF BANK</a>');}
        if ($st==1){echo('<a href="./index.php" class="w3-bar-item w3-button w3-green"><b>Home</b></a>');}
            else {echo('<a href="./index.php" class="w3-bar-item w3-button "><b>Home</b></a>');}
        if ($st==2){echo('<a href="./CreateUser.php" class="w3-bar-item w3-button w3-hide-small w3-green"><b>Create User</b></a>');}
            else {echo('<a href="./CreateUser.php" class="w3-bar-item w3-button w3-hide-small"><b>Create User</b></a>');}
        if ($st==3){echo('<a href="./TransferMoney.php" class="w3-bar-item w3-button w3-hide-small w3-green"><b>Transfer Money</b></a>');}
            else {echo('<a href="./TransferMoney.php" class="w3-bar-item w3-button w3-hide-small"><b>Transfer Money</b></a>');}
        if ($st==4){echo('<a href="./TransactionHistory.php" class="w3-bar-item w3-button w3-hide-small w3-green"><b>Transaction History</b></a>');}
            else {echo('<a href="./TransactionHistory.php" class="w3-bar-item w3-button w3-hide-small"><b>Transaction History</b></a>');}
        echo('<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
            </div>

            <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium sk-theme-navlink w3-border-bottom" style="background-color: #5CDB95;">');
                if ($st==2){echo('<a href="#" class="w3-bar-item w3-button w3-green"><b>Create User</b></a>');}
                    else{echo('<a href="#" class="w3-bar-item w3-button "><b>Create User</b></a>');}
                if ($st==3){echo('<a href="./TransferMoney.php" class="w3-bar-item w3-button w3-green"><b>Transfer Money</b></a>');}
                    else{echo('<a href="./TransferMoney.php" class="w3-bar-item w3-button "><b>Transfer Money</b></a>');}
                if ($st==4){echo('<a href="./TransactionHistory.php" class="w3-bar-item w3-button w3-green"><b>Transaction History</b></a>');}
                    else{echo('<a href="./TransactionHistory.php" class="w3-bar-item w3-button"><b>Transaction History</b></a>');}
            echo('</div>');
    }

    function foot() {

        echo('<div class=" sk-theme-navlink" style="background-color: #5CDB95; border-color:#05386B">
                <footer class="w3-container w3-center w3-round-small w3-border-top">
                    <p>&copy 2021. Made by <b>Shubham Kothari</b><br>For GRIP APRIL-2021 The Sparks Foundation.</p>
                </footer>
            </div>

            <script>
                function myFunction() {
                    var x = document.getElementById("demo");
                    if (x.className.indexOf("w3-show") == -1) {
                        x.className += " w3-show";
                    } else { 
                        x.className = x.className.replace(" w3-show", "");
                    }
                }
            </script>');
    }


?>