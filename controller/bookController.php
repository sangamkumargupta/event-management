<?php 
    class bookController{
        var $bookModel;
        function __construct(){
            require_once("../models/bookModel.php");
            $this->bookModel= new bookModel();
        }  
        /*  country  */
        public function getCountrys(){
            return $this->bookModel->getCountry();
        }

        /*  Event  */
        public function getEvent(){
            return $this->bookModel->getEvents();
        }

        /*  Services  */
        public function getService(){
            return $this->bookModel->getServices();
        }
        public function insertPayment($data,$user_id,$payment_code,$total){
            //var_dump($data);
            $insertQuery = array('cardNumber' => $data['cardNumber'], 'cvv' => $data['cvv'],'expiry_mm' => $data['expiry_mm'],'expiry_yy'=>$data['expiry_yy'],'zipcode'=>$data['zipcode']);
            // //var_dump($insertQuery);
             return $this->bookModel->payments($insertQuery,$user_id,$payment_code,$total);
            
         }

        /* INSERT BOOKING */
        public function insertBook($data,$userId,$payment_code){
            $insertQuery = array('candidateName' => $data['candidateName'], 'candidateNumber' => $data['candidateNumber'],'yourEmail' => $data['bookEmail'],'country'=>$data['country'],'state'=>$data['state'],'city'=>$data['city'],'selectEvent'=>$data['selectEvent'],'selectService'=>$data['selectService'],'numOfGuest'=>$data['numOfGuest'],'evetDate'=>$data['evetDate']);
            return $this->bookModel->insertBook($insertQuery,$userId,$payment_code);
         }

         #PAYMENT INSERT
         
        
          #get booking
          public function getBookings(){
            return $this->bookModel->getBooking();
        }
        #update Status
        public function updateStatus($status){
            return $this->bookModel->updateStatuss($status);
        }
       
    }
?>