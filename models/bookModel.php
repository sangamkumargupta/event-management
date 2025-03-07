<?php 
   class bookModel{
        var $conObj;
        function __construct(){
            require_once('../admin/config/connection.php');
            $this->conObj=new connection();
        }

        /* country  */
        public function getCountry(){
            $query = "SELECT * FROM country";
            return $this->conObj->fetchByArray($query);
        }

        /*  Events  */
        public function getEvents(){
            $query = "SELECT * FROM events";
            return $this->conObj->fetchByArray($query);
        }

        /*  Services  */
        public function getServices(){
            $query = "SELECT * FROM service";
            return $this->conObj->fetchByArray($query);
        }

        /* INSERT BOOKING METHOD */
        public function insertBook($data,$userId,$payment_code){
            extract($data);
            $query= "INSERT INTO book_event(candidate_name, candidate_number, email, country_id, state_id, city_id, event_id, service_id, num_of_guest, event_date, status, payment_code, user_id) VALUES ('$candidateName','$candidateNumber','$yourEmail','$country','$state','$city','$selectEvent','$selectService','$numOfGuest','$evetDate','Pending','$payment_code','$userId')";
            return $this->conObj->excuteQuery($query);
        }

        #PAYMENT METHOD
        public function payments($data,$user_id,$payment_code,$total){
            extract($data);
            $currentTime = date( 'd-m-Y h:i:s A',time()); //echo $currentTime; 
            $expriy =$expiry_mm.="/".$expiry_yy;
            $query = "INSERT INTO payment(card_number, cvv_number, expiry_date, zip_code, payment_date, user_id, payment_code,total_amount)VALUES ('$cardNumber','$cvv','$expriy','$zipcode','$currentTime','$user_id','$payment_code','$total')";
            return $this->conObj->excuteQuery($query);
        }

        # GET BOOKING
        public function getBooking(){
            $query = "SELECT * FROM book_event";
            return $this->conObj->fetchByArray($query);
        }

        
        #UPDATE STATUS
        public function updateStatuss($dates){
            $query="UPDATE book_event SET status = 'Complete' WHERE event_date='$dates'";
            return $this->conObj->updateQuery($query);
        }
        
        
    }
?>