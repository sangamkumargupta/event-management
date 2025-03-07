<?php 
     class Connection{
        var $con;
        function __construct(){
            $this->con = new mysqli("localhost","root","","eventphp");
        }

        #user id excute query... 
        function excuteQuery($query){
            if($this->con->query($query)){
                echo '<script>alert("User Id Created")</script>';
                return $this->con->insert_id;                
            }else{
                return $this->con->error;
            }
        }
        
        public function fetchByArray($query){
            $result = $this->con->query($query);
            if($result->num_rows > 0){
                $data = [];
                $i =0;
                while($row = $result->fetch_assoc()){
                    $data[$i++] = $row;
                }
                return $data;
            }else{
                return null;
            }
        }
    }
?>