<?php 
    class registerController{
        var $registerModel;
        function __construct(){
            require_once("../models/registerModel.php");
            $this->registerModel= new registerModel();
        }
        #event insert function
        public function userregister($data){
            var_dump($data);
            $registerData = array('firstname' => $data['fname'], 'lastName' => $data['lname'],'user_email' => $data['registerEmail'],'username'=>$data['username'],'password'=>$data['password']);
            return $this->registerModel->userregister($registerData);
         }
         #Update Password : 
         public function updatePassword($Id,$newPassword){
            $this->registerModel->updateUserPassword($Id,$newPassword);
         }
    }
?>