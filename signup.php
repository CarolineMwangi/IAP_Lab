<?php
    include 'dbconnect.php';
    include 'process.php';
    $con = new DBConnector();
    $pdo = $con->connectToDB();
    if(isset($_POST['register']))
    {
	    
        $full_name = $_POST['full_name'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User($email,$password);
        $user->setFullName($full_name);
        $user->setCity($city);
        $user->setEmail($email);
        $user->setPassword($password);

       echo $user->register($pdo);
    }

?>
<!DOCTYPE html>
 	<html>

		<head>
			<title> SIGN UP </title>
		    <link rel="stylesheet" type="text/css" href="signup.css">
        </head>
        
        <body>
            
            <center>
			<div class="signup">
				<br>
                <h1> Signup Form</h1>

                <span>Already signed up?<a href="login.php">LOG IN</a></span>
                <img src="icon.png" class="icon">
                <br>
               
                
                <form action="" method="post">
					<p>Full Name</p>
					<input type="text" name="full_name" placeholder="Enter username" ><br>
                    <br>
                    <p>City of Residence</p>
					<input type="text" name="city" placeholder="Enter city"><br>
                    <br>
                    <p>Email Address</p>
					<input type="email" name="email" placeholder="Enter email">
                    <br>
                   
                    <p>Password</p>
					<input type="password" name="password" placeholder="Enter password">
                    <br>
                   
                    <p>Choose profile picture</p>	
                    <input type="file" name="upload" style="margin-left: 50px;">		
                    <br>
                    <br>
					<input type="submit" name="register" value="Register"><br>		
                </form>
                
            </div>
            </center>
		</body>
		</html>
