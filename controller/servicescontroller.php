<?php 
    class servicescontroller{
        var $serviceModel;
        function __construct(){
            require_once("../models/servicemodel.php");
            $this->serviceModel= new servicemodel();
        }
        #event fetch elements
        public function getServices(){
            return $this->serviceModel->getService();
        }

    }
?>