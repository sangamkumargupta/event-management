<?php 
    class servicemodel{
        /*var $conObj;
        function __construct(){
            require_once('../config/connection.php');
           $this->conObj=new connection();
        }*/

        var $conObj;
        function __construct(){
            require_once('../admin/config/connection.php');
            $this->conObj=new connection();
        }

        #fetch elements...
        public function getService(){
            $query = "SELECT * FROM service";
           return $this->conObj->fetchByArray($query);
        }
    }
?>