<?php 
    class loginModel{
        var $conObj;
        function __construct(){
            require_once('../admin/config/connection.php');
            $this->conObj=new connection();
        }
        public function getlogins($username,$password){
            $query = "SELECT * FROM user_login where username='$username' AND  password='$password'";
            var_dump($query);
            return $this->conObj->fetchLogin($query);
        }
        
        public function getEmails($email){
            $query = "SELECT * FROM user_login where user_email='$email'";
            var_dump($query);
            return $this->conObj->fetchByArray($query);
        }
    }
?>