<?php 
    class registerModel{
        var $conObj;
        function __construct(){
            require_once('../admin/config/connection.php');
            $this->conObj=new connection();
        }

        #insert method
        function userregister($data){
            extract($data);
            $query="INSERT INTO user_login(firstname, lastName, user_email, username, password) VALUES ('$firstname','$lastName','$user_email','$username','$password')";
            return $this->conObj->excuteQuery($query);
        }
         #Update Password : 
         public function updateUserPassword($Id,$newPassword){
            $passUpdate="UPDATE user_login SET password = '$newPassword' WHERE user_id= '$Id'";
            echo $passUpdate;
            return $this->conObj->updateQuery($passUpdate);
        }
    }
?>