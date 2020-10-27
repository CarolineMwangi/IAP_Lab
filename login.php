<?php
	include 'dbconnect.php';
	include 'process.php';

	$con = new DBConnector();
    $pdo = $con->connectToDB();
	
	if(isset($_POST['login'])){
		

		$email = $_POST['email'];
		$password = $_POST['password'];

		$login = new User($email,$password);
		echo $login->login($pdo);
	}

?>
<!DOCTYPE html>

 	<html>
		<head>
            <title> LOGIN </title>
			<link rel="stylesheet" type="text/css" href="login.css">	
		</head>
        <body >
            
			<center>
			<div class="login" >
				<br>
                <h1> Login Form</h1>
                <p class="par">No Account?<a href="signup.php"> Set up a new account</a></p>
                <img src="icon.png" class="icon">

			    <form action="" method="POST">
				    <p>Username</p>
				    <input type="text" name="email" placeholder="Email">
                    <br>
                    <br>
                    <p>Password</p>
				    <input type="password" name="password" placeholder="Enter password">
				    </p><br>
				    <input type="submit" name="login" value="Login">
				    <br>
                    <br>
                    
				    
			    </form>
            </div>
            </center>

		</body>
		</html>
