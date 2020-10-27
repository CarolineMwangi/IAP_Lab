<?php
	  include 'dbconnect.php';
	  include 'process.php';
  
	  $con = new DBConnector();
	  $pdo = $con->connectToDB();

	  if(isset($_POST['change'])){

		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newpassword = password_hash($_POST["newpassword"], PASSWORD_DEFAULT);
        $conpassword= $_POST['conpassword'];

        if(password_verify($conpassword,  $newpassword)){
            $user = new User($password,$newpassword);
            $user->setPassword($password);
            $user->setNew($newpassword);

            $message = $user->changePassword($pdo);
            echo $message;
           
        }else {
            echo "Passwords don't match";
        }
		
	
		}


?>
<!DOCTYPE html>

 	<html>
		<head>
            <title> CHANGE PASSWORD </title>
			<link rel="stylesheet" type="text/css" href="change.css">	
		</head>
        <body >
            
			<center>
			<div class="change" >
				<br>
                <h1> Change Password</h1>
              
                

			    <form action="" method="POST">
				    <p>Current Password</p>
				    <input type="password" name="password" placeholder="Enter current password">
                    <br>
                    <br>
                    <br>
                    <p>New Password</p>
				    <input type="password" name="newpassword" placeholder="Enter new password">
                    </p><br>
					<p>Confirm Password</p>
				    <input type="password" name="conpassword" placeholder="Enter new password again">
                    </p><br>
                   
				    <input type="submit" name="change" value="Change Password">
				    <br>
                    <br>
                    
				    
			    </form>
            </div>
            </center>

		</body>
		</html>
