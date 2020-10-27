<?php
    session_start();
    $username = $_SESSION['$this->getEmail()'];
    if(isset($_POST['$this->getEmail()'])){
        $_SESSION["full_name"] = htmlentities($_POST["full_name"]);
    }
    else{
        $_SESSION["full_name"]="";
    }

    include 'dbconnect.php';
    include 'process.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    if(isset($_POST['logout'])){

    $logout = new User($email,$password);
    echo $logout->logout($pdo);

    }

    if(isset($_POST['change'])){
        header("Location: change.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USER PAGE</title>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>

    <p>

        HELLO 
        <?php
            echo $username;
            echo ",";
        ?>
        </p>

    <form action="" method="post">
    <input type="submit" name="change" value="Change password">
    <input type="submit" name="logout" value="Logout">
    </form>
   
</body>
</html>