<?php
    class loginController{
        var $lgoinModel;
        function __construct(){
            require_once("../models/loginModel.php");
            $this->lgoinModel= new loginModel();
        }  
        public function getlogin($username,$password){
            return $this->lgoinModel->getlogins($username,$password);
        }
        public function getEmail($email){
            return $this->lgoinModel->getEmails($email);
        }
    }
?>