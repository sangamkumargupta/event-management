<?php 
    class usereventController{
        var $userEvent;
        function __construct(){
            require_once("../models/userevent.php");
            $this->userEvent= new userevent();
        }
        #event fetch elements
        public function getEvents(){
            return $this->userEvent->getEvents();
        }

    }
?>