<?php

    Interface Account{

        public function register ($pdo);
        public function login ($pdo);
        public function logout ($pdo);
        
    } 

    class User implements Account{
        
        protected $full_name;
        protected $city;
        protected $email;
        protected $password;
        protected $new;

        function __construct($user, $pass){
            $this->email =$user;
            $this->password = $pass;
        }

        public function setFullName ($full_name){
        	$this->full_name = $full_name;
        }
        public function setCity ($city){
        	$this->city = $city;
        }
        public function setEmail ($email){
        	$this->email = $email;
        }
        public function setPassword ($password){
        	$this->password = $password;
        }
        public function getFullName (){
        	return $this->full_name;
        }
        public function getCity (){
        	return $this->city;
        }
        public function getEmail (){
        	return $this->email;
        }
        public function getPassword (){
        	return $this->password;
        }
        public function setNew ($newpassword){
        	$this->newpassword = $newpassword;
        }
        public function getNew (){
        	return $this->newpassword;
        }
      
       

        public function register ($pdo){
            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO registration (full_name,city,email,password) VALUES(?,?,?,?)');
                $stmt->execute([$this->getFullName(),$this->getCity(),$this->getEmail(),$passwordHash]);
                return "Registration was successiful";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }            
        }

        public function login ($pdo){
            session_start();
            try {
                $stmt = $pdo->prepare("SELECT * FROM registration WHERE email=?");
                $stmt->execute([$this->getEmail()]);
                $row = $stmt->fetch();
                if(empty($row)){
                    echo '<script>alert("Invalid Credentials")</script>';
                    echo '<script>windo.location = "login.php"</script>';
                }
                else{ 
                        if (password_verify($this->password,$row['password'])){
                            $_SESSION['$this->getEmail()'] = $row['email'];
                             echo '<script>alert("Login Successful")</script>';
                            echo '<script>window.location = "user.php"</script>';
                        }else{
                            echo '<script>alert("Incorrect username or password")</script>';
                            echo '<script>windo.location = "login.php"</script>';
                        }
            }
            } catch (PDOException $e) {
            	return $e->getMessage();
            }
        }

        public function logout ($pdo){

            session_start();

            $_SESSION=array();

            session_destroy();

            header("Location: login.php");
            exit();
        }

        public function changePassword($pdo){
            session_start();
            try{
               $stmt = $pdo->prepare("UPDATE `registration` SET `password` = '?' WHERE `email`= '?'");
               $stmt->execute([$this->newpassword,$_SESSION['$this->getEmail()']]);
               $result = $stmt->fetch();
               $stmt = null;
               echo 'Password has been changed'; 
               header("Location:user.php");
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

    
    }
          




?>

       
