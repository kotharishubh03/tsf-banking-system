<?php
    session_start();
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";

    $stmt = $pdo->prepare('SELECT * FROM `user`');
    $stmt->execute();
    $user = $stmt->fetchall();

    if(isset($_GET["add"])) {
        $stmt = $pdo->prepare('SELECT `balance` FROM `user` WHERE id=:id');
        $stmt->execute(array( 'id'=> $_GET['sender']));
        $sender_bal= $stmt->fetchall();
        $sender_bal=$sender_bal[0]['balance'];

        $stmt = $pdo->prepare('SELECT `balance` FROM `user` WHERE id=:id');
        $stmt->execute(array( 'id'=> $_GET['reciver']));
        $rec_bal= $stmt->fetchall();
        $rec_bal=$rec_bal[0]['balance'];

        if ($sender_bal==0 or $sender_bal-$_GET['amt']<=0){
            $_SESSION['error'] = 'Sender Have a less balance or No balance in Account!! <br> <b>TRANSACTION CANCELED</b>';
            header("Location: selecteduserdetail.php?id=".$_GET['add']);
            return; 
        }

        if ($_GET['amt']<=0 ){
            $_SESSION['error'] = 'Amount to be send cannot be 0 or negative!! <br> <b>TRANSACTION CANCELED</b>';
            header("Location: selecteduserdetail.php?id=".$_GET['add']);
            return; 
        }
            $stmt = $pdo->prepare('INSERT INTO `transactions`(`sender_user_id`, `reciver_user_id`, `amount`) VALUES (:sender_user_id, :reciver_user_id, :amount)');
            $stmt->execute(array( ':sender_user_id'=> $_GET['sender'], ':reciver_user_id'=> $_GET['reciver'], ':amount'=> $_GET['amt']));
            
            $sender_bal=$sender_bal-$_GET['amt'];
            $rec_bal=$rec_bal+$_GET['amt'];
            $stmt = $pdo->prepare('UPDATE `user` SET `balance`=:sender_bal WHERE `id`=:sender_id;UPDATE `user` SET `balance`=:reciver_bal WHERE `id`=:reciver_id');
            $stmt->execute(array( ':sender_bal'=> $sender_bal, ':reciver_bal'=> $rec_bal, ':sender_id'=> $_GET['sender'], ':reciver_id'=> $_GET['reciver']));

            $_SESSION['success'] = 'Transaction Sucessfull';
            header("Location: selecteduserdetail.php?id=".$_GET['add']);
            return; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('Send Money');
?>

<body style="background-color: #5CDB95;">
<?php
    navbar(3);
    flashMessage();
?>
<div class="w3-row">
    <div class="w3-display-container" style="height:500px;"> 
        <div class="w3-twothird w3-display-middle">
    
            <div class="w3-card-4">
                <div class="w3-container w3-green">
                <h2>SEND MONEY</h2>
            </div>

            <form id="add_new_user_form" class="w3-container sk-theme-navlink" method="GET">
                <p>
                <select class="w3-select w3-border w3-round-large" name="sender" required> 
                <option value="" disabled selected>Select sender</option>
                    <?php
                        foreach ($user as $r){
                            if ($r['id']!=$_GET["id"]) {
                                echo('<option value="'.$r['id'].'">'.$r['first_name'].' '.$r['last_name'].' ('.$r['balance'].') '.'</option>');
                            }
                        }
                    ?>
                </select>
                <label>Sender</label></p>
                <p>     
                <select class="w3-select w3-border w3-round-large" name="reciver" required>
                    <?php
                        if (isset($_GET["id"])) {
                            $stmt = $pdo->prepare('SELECT * FROM `user` where id=:id');
                            $stmt->execute(array(':id'=>$_GET["id"]));
                            $user = $stmt->fetchall();
                            echo('<option value="'.$user[0]['id'].'" selected>'.$user[0]['first_name'].' '.$user[0]['last_name'].' ('.$user[0]['balance'].') '.'</option>');
                        }
                    ?>
                </select>
                <label>Reciver</label></p>
                <p>
                <input name="amt" class="w3-input w3-border w3-round-large" type="number" required>
                <label>Amount</label></p>
                <div class="w3-row w3-margin">
                    <button class="w3-button w3-block w3-dark-grey w3-half" type="submit" name="add" value=<?php echo($_GET['id']); ?> >SEND MONEY </button>
                    <input class="w3-button w3-block w3-dark-grey w3-half" type="reset" value="Reset"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    foot();
?>
</body>

</html>