<?php
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('TSF BANK');
?>

<body style="background-color: #5CDB95;">
<?php
    navbar(1);
?>
<div class="w3-content w3-section" style="max-width:800px">
    <div class="mySlides w3-animate-right w3-container w3-red">
        <h1><b>WELCOME</b></h1>
        <h1><i>TO TSF </i></h1>
        <h1>BANK</h1>
    </div>
    <div class="mySlides w3-animate-right w3-container w3-xlarge w3-blue w3-card-4">
        <h1><b>Create User</b></h1>
        <h1><i>To Add a New User</i></h1>
        <h1><a href="./CreateUser.php" style="display:inline"><b>Click Here</b></a></h1>
    </div>
    <div class="mySlides w3-animate-right w3-container w3-xlarge w3-green w3-card-4">
        <h1><b>Transfer Money</b></h1>
        <h1><i>To Transfer Money Instanly to another User</i></h1>
        <h1><a href="./TransferMoney.php" style="display:inline"><b>Click Here</b></a></h1>
    </div>
    <div class="mySlides w3-animate-right w3-container w3-xlarge w3-yellow w3-card-4">
        <h1><b>Transaction History</b></h1>
        <h1><i>To View All the Transactions</i></h1>
        <h1><a href="./TransactionHistory.php" style="display:inline"><b>Click Here</b></a></h1>
    </div>
</div>

<div class="w3-row">
<div class="w3-third w3-card-4 " >
        <header class="w3-container w3-cyan">
            <h1>Recently Added Users</h1>
        </header>
        <div class="w3-container w3-center sk-theme-navlink" style="height: 210px;">
            <?php
                $stmt = $pdo->prepare('SELECT `first_name`,`last_name`,`balance` FROM `user` order by id DESC LIMIT 5');
                $stmt->execute();
                $user = $stmt->fetchall();
                foreach($user as $r) {
                    echo('<p><b>'.$r['first_name'].' '.$r['last_name'].' ('.$r['balance'].')</b></p>');
                }
            ?>
        </div>
    </div>
    <div class="w3-third w3-card-4 ">
        <header class="w3-container w3-cyan">
            <h1>Recent Transactions</h1>
        </header>
        <table class="w3-table-all w3-small sk-table" style="max-height:500px;">
                <tr class="w3-yellow">
                    <th>Sender</th>
                    <th>Reciver</th>
                    <th>Amount</th>
                </tr>
                <?php
                    $stmt = $pdo->prepare('SELECT * FROM `user`');
                    $stmt->execute();
                    $user = $stmt->fetchall();
                    $user_data=[];
                    foreach ($user as $r){
                        $user_data[$r['id']]=array("fname"=>$r['first_name'],"lname"=>$r['last_name']);
                    }
                    $stmt = $pdo->prepare('SELECT * FROM `transactions` Order by `timestamp` DESC Limit 5');
                    $stmt->execute();
                    $user = $stmt->fetchall();
                    $count=0;
                    foreach ($user as $r){
                        if ($count%2==0){
                            echo('<tr class="w3-light-green">');
                        } else{
                            echo('<tr class="w3-green">');
                        }
                        $count=$count+1;
                        echo('<td>'.$user_data[$r['sender_user_id']]['fname'].' '.$user_data[$r['sender_user_id']]['lname'].'</td>
                            <td>'.$user_data[$r['reciver_user_id']]['fname'].' '.$user_data[$r['reciver_user_id']]['lname'].'</td>
                            <td>'.$r['amount'].'</td>
                        </tr>');
                    }

                ?>
            </table>
    </div>
    <div class="w3-third w3-card-4 ">
        <header class="w3-container w3-cyan">
            <h1>Stats</h1>
        </header>
        <div class="w3-container w3-center sk-theme-navlink" style="height: 210px;">
            <?php
                $stmt = $pdo->prepare('SELECT count(*) FROM `user`');
                $stmt->execute();
                $usercount = $stmt->fetchall();
                echo('<p>Total No Of Users  =  <b>'.$usercount[0]['count(*)'].'</b></p>');
                
                $stmt = $pdo->prepare('SELECT * FROM `basic_data` WHERE 1');
                $stmt->execute();
                $usercount = $stmt->fetchall();
                echo('<p>Total No Of People Visited site =  <b>'.$usercount[0]['value'].'</b></p>');
                
                $stmt = $pdo->prepare('Update basic_data Set `value` = `value` + 1 Where 1');
                $stmt->execute();

            ?>
        </div>
    </div>
</div>

<?php
    foot();
?>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2500);    
}
</script>
</body>

</html>