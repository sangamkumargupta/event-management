<?php
    if(empty($_SESSION['username'])){
      header('location:index.php');
    }
    require_once('header.php');    
?>
  
<?php
   // error_reporting(0);
    require_once('../controller/bookController.php');
    $bookConObj = new bookController();

    #get Country
    $getCountry= $bookConObj->getCountrys();

    #Get Events
    $getEvent= $bookConObj->getEvent();

    #Get Service
    $service = $bookConObj->getService();

    #Get Booking
    $getBooking=$bookConObj->getBookings();

?>

<!-- The Modal -->
<div class="modal fade"  role="dialog"id="showBooking">
  <div class="modal-dialog modal-fullscreen	">
    <div class="modal-content ">
    <!-- Modal Header -->
      <div class="modal-header bg-primary text-light">
        <h4 class="modal-title ">Your Book Events</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
     <!-- Modal body -->
      <div class="modal-body">
        <table id="example" class="table table-striped nowrap" >
            <thead>
              <tr>
                  <th>Sn</th>
                  <!-- <th>Candidate</th> -->
                  <th>Event Name</th>
                  <th>Service Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Num Of Guest</th>
                  <th>Date</th>
                  <th>Status</th>
                  <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody id="example" class="table table-striped table-bordered " style="width:100%">
                <?php $sn=1;
                    session_start();
                    foreach($getBooking as $key => $value){
                    if($value['user_id']== $_SESSION['user_id ']){
                ?>
                <tr>
                    <td><?php  echo $sn++;?></td>
                    <!-- <td><?php  //echo $value['candidate_name'];?></td> -->
                    <td><?php  
                          
                        foreach($getEvent as $key => $row){
                            if($row['eventid']==$value['event_id']){
                                echo $row['event_name'];
                            }
                        }
                    ?></td>
                    <td><?php  
                        $name_parts = explode(",", $value['service_id']);
                        $add="";
                        $counts=sizeof($name_parts);
                        for($i=0;$i < $counts-1;$i++){
                            $ids=intval($name_parts[$i]);
                            foreach($service as $key => $row){
                                if(intval($row['serviceid'])==$ids){
                                  $add.=$row['service_name'].",<br/>";
                                }
                            } 
                        }
                        echo $add;
                        $add="";
                    ?></td>
                    <td><?php  echo $value['email'];?></td>
                    <td><?php  echo $value['candidate_number'];?></td>
                    <td><?php  echo $value['num_of_guest'];?></td>
                    <td><?php  echo $value['event_date'];?></td>
                    <td><?php  
                          $dates=date("Y-m-d");
                          if($dates == $value['event_date'] ){
                            $status=$bookConObj->updateStatus($dates);
                            echo $value['status'];
                          }else{
                            echo $value['status']; 
                          }
                    ?></td>
                    <!-- <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="padding:0px;">
                          <button>   <a href="bookingform.php?Details=<?php //echo $value['book_id'];?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a></button>
                        </div>
                    </td> -->
                </tr>
                <?php }} ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
