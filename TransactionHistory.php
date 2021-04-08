<?php
    session_start();
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('Create User');
?>

<body style="background-color: #5CDB95;">
<?php
    navbar(4);
    flashMessage();
?><br>
<div class="w3-row">
    <div class="w3-container" > 
    <div class="w3-content" style="max-width:1000px">
            <table class="w3-table-all w3-small sk-table" style="max-height:500px;">
                <tr class="w3-yellow">
                    <th>Id</th>
                    <th>Sender</th>
                    <th>Reciver</th>
                    <th>Amount</th>
                    <th>Time Stamp</th>
                </tr>
                <?php
                    $stmt = $pdo->prepare('SELECT * FROM `user`');
                    $stmt->execute();
                    $user = $stmt->fetchall();
                    $user_data=[];
                    foreach ($user as $r){
                        $user_data[$r['id']]=array("fname"=>$r['first_name'],"lname"=>$r['last_name']);
                    }
                    $stmt = $pdo->prepare('SELECT * FROM `transactions`');
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
                        echo('<td>'.$r['transaction_id'].'</td>
                            <td>'.$user_data[$r['sender_user_id']]['fname'].' '.$user_data[$r['sender_user_id']]['lname'].'</td>
                            <td>'.$user_data[$r['reciver_user_id']]['fname'].' '.$user_data[$r['reciver_user_id']]['lname'].'</td>
                            <td>'.$r['amount'].'</td>
                            <td>'.$r['timestamp'].'</td> 
                        </tr>');
                    }

                ?>
            </table>
        </div>
    </div>
</div><br>
<?php
    foot();
?>
</body>

</html>