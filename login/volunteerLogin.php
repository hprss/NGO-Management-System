<?php 
session_start();
require_once "../pdo.php";
if ( isset($_POST['username'])) {
    if((strlen($_POST['username'])>0) && (strlen($_POST['password'])>=0)){
        $stmt3 = $pdo->query("SELECT `volunteer_id` FROM `volunteer_login` WHERE USERNAME = '".$_POST['username']."' AND PASSWORD ='".$_POST['password']."'");
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows2)>=1){
           $_SESSION['volunteer_id']=$rows2[0]['volunteer_id'];
           $_SESSION['role']= 3;
           header("Location:../index.php");
           return;
        } else {
            $_SESSION['error']="Wrong Username and Password";
            header("Location: volunteerLogin.php");
            return;
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO - login</title>
    <?php include("bootstrap.php"); ?>
</head>
<body>

<?php
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset ($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

    <form action="" method="post">    
    <p><label for="username">Username :</label>
    <input type="text" name = "username" id = "username">
    </p>
    <p><label for="password">Password :</label>
    <input type="password" name = "password" id ="password">
    </p>
    <p><input type="submit" name="submit">  <input type="submit" name="cancel" value = "cancel"></p>

    </form>

</body>
</html>