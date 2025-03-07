<?php
    session_start();
    //require_once('header.php');
    require_once('../controller/bookController.php');
    $bookCon = new bookController();

    date_default_timezone_set('Asia/Kolkata');
    date( 'd/m/Y h:i:s', time ());
    $currentTime = date( ' A', time () );

    /*  FETCH COUNTRY  */
    $country = $bookCon->getCountrys();
    
    /*  FETCH EVENT  */
    $events  = $bookCon->getEvent();
    
    /*  FETCH SERVICE  */
    $services  = $bookCon->getService();
    
    /* GET EVENT CHARGE */
    $eventCharge="";
    foreach($events as $key => $value){
        if($_REQUEST['selectEvent']==$value['eventid']){
            $eventCharge=$value['event_charge'];
        }
    }
    $electric=0;
    $food=0;
    $drink=0;

    #INSERT BOOK
    if(!empty($_REQUEST['Pay']) && $_REQUEST['Pay']== 'Pay'){
        $payment_code = sprintf("%06d", mt_rand(1, 999999));
        $result = $bookCon->insertBook($_REQUEST,$_SESSION['user_id '],$payment_code);
        $eventPayment=$bookCon->insertPayment($_REQUEST,$_SESSION['user_id '],$payment_code,$_SESSION['total']);
        if($eventPayment && $result){
            echo "<script>window.location.href='index.php'</script>";  
        }
    }

    /* CALCULATE  */
    $counts=count($_REQUEST['selectService']);
    for($i=0;$i < $counts;$i++){
        $ids=intval($_REQUEST['selectService'][$i]);
        foreach($services as $key => $row){
            if(intval($row['serviceid'])==$ids && $row['service_type']=='veg'){
                $food += intval($row['service_charge'])* intval($_REQUEST['numOfGuest']);
            }else if(intval($row['serviceid'])==$ids && $row['service_type']=='Drinks'){
                $drink += intval($row['service_charge']) * intval($_REQUEST['numOfGuest']); 
            }else if(intval($row['serviceid'])==$ids && $row['service_type']=='Non vege'){
                $food += intval($row['service_charge'])* intval($_REQUEST['numOfGuest']); 
            }else if(intval($row['serviceid'])==$ids && $row['service_type']=='Electric Items'){
                $electric += intval($row['service_charge']);
            }
        } 
    }
    $concats="";
    for($i=0;$i< $counts;$i++){
        $concats.=$_REQUEST['selectService'][$i].",";
    }
    $_SESSION['total']=$total=$food+$drink+$electric+$eventCharge;
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Payment From</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/paymentCss.css" rel="stylesheet">
    </head>
    <body>
    <div class="p-4">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="p-2">
                <div class="d-flex justify-content-between align-items-center">
                <div><img src="../attachement/atm.png" alt="Payment Logo" height="100" ></div>
                <div>
                    <span class="badge p-2 fs-5 bg-dark"><?php echo date('H');?></span>
                    <span class="fs-5">:</span> <span class="badge p-2 fs-5 bg-dark"><?php echo date('i');?></span><span class="fs-5">:</span><span style="margin-left:1px" class="badge p-2 fs-5 bg-dark" ><?php echo date( ' A', time () );?></span>
                </div>
                </div>
                <form onsubmit="return paymentValdation()" >
                <input type="hidden"  name="candidateName" value="<?php echo $_REQUEST['candidateName'];?>">
                <input type="hidden"  name="candidateNumber" value="<?php echo $_REQUEST['candidateNumber'];?>">
                <input type="hidden"  name="bookEmail" value="<?php echo $_REQUEST['bookEmail'];?>">
                <input type="hidden"  name="numOfGuest" value="<?php echo $_REQUEST['numOfGuest'];?>">
                <input type="hidden"  name="evetDate" value="<?php echo $_REQUEST['evetDate'];?>">
                <input type="hidden"  name="country" value="<?php echo $_REQUEST['country'];?>">
                <input type="hidden"  name="state" value="<?php echo $_REQUEST['state'];?>">
                <input type="hidden"  name="selectEvent" value="<?php echo $_REQUEST['selectEvent'];?>">
                <input type="hidden"  name="city" value="<?php echo $_REQUEST['city'];?>">
                <input type="hidden"  name="selectService" value="<?php echo $concats;?>"/>
                <div class="mt-5">
                    <div>
                    <label class="d-block" for="cardNumber"><strong>Card Number</strong></label>
                    <small class="text-secondary">Enter the 16 - digit number printed on the card </small>
                    <div class="position-relative">
                        <input type="number" id="cardNumber" name="cardNumber"placeholder="xxxx xxxx xxxx 1234"  class="form-control mt-3"><span id="cardType"></span>
                        <span id="cardNumberMsg"></span>
                    </div>
                    </div>
                    <div class="mt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-xs-12">
                        <label class="d-block" for="cvv"><strong>CVV Number</strong></label>
                        <small class="text-secondary">Enter the 3 or 4 digit number printed at back of the card </small>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <input type="number" id="cvv" name="cvv" placeholder="0938"class="form-control">
                            <span id="cvvMsg"></span>
                        </div>
                    </div>
                    </div>
                    <div class="mt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-xs-12">
                        <label class="d-block" for="expiry_mm"><strong>Expiry Date</strong></label>
                        <small class="text-secondary">Enter the expiration date of the card </small>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                        <div class="d-flex align-items-center">
                            <input type="text" id="expiry_mm" name="expiry_mm" placeholder="05"class="form-control">
                            <span class="fs-4 mx-3">/</span>
                            <input type="text" id="expiry_yy" name="expiry_yy" placeholder="25" class="form-control"><br/>
                            
                            
                        </div>
                        <div>
                            <span id="expiryMsg"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="mt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-xs-12">
                        <label class="d-block" for="postal"><strong>Postal (Zip) Code</strong></label>
                        <small class="text-secondary">Enter the postal / Zip code of billing address </small>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                        <div class="d-flex align-items-center">
                            <input type="number" id="zipcode" name="zipcode" placeholder="841435"class="form-control"/>
                        </div>
                        <div><span id="zipcodeMsg"></span></div>
                        </div>
                    </div>
                    </div>
                    <!-- <input type="submit" name="pay"  value="pay"> -->
                    <input type="submit" name="Pay" class="btn btn-primary mt-5 w-100" value="Pay">
                </div>
            </form>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
    
            <div style="background:#eff4f8;border-radius:16px;">
              <div class="p-4">
                <table class="w-100" id="cartTable">
                  <tr>
                    <td><span class="text-secondary">Event Charge</span></td>
                    <td><strong><?php echo $eventCharge;?>/-</strong></td>
                  </tr>
                  <tr>
                    <td><b><u>Services Charge</u></b></td>
                  </tr>
                  <tr>
                    <td><span class="text-secondary">Food Charge</span></td>
                    <td><strong><?php  echo $food;?>/-</strong></td>
                  </tr>
                  <tr>
                    <td><span class="text-secondary">Electric Charge </span></td>
                    <td><strong><?php  echo $electric;?>/-</strong></td>
                  </tr>
                  <tr>
                    <td><span class="text-secondary">Drink Charge </span></td>
                    <td><strong><?php  echo $drink;?>/-</strong></td>
                  </tr>
                 
                </table>
                <hr>
                <table class="w-100" id="cartTable">
                    <tr>
                        <td><span class="text-secondary">Pay Amount</span></td>
                        <td><strong class="text-primary"><?php echo $total;?>/-</strong></td>
                    </tr>
                 </table>
                <hr>
              </div>
              <div id="ticket">
                <div class="d-flex p-4 align-items-center justify-content-between">
                  <div>
                    <small class="text-secondary">You Have to Pay</small>
                    <div class="fs-2"><strong><?php echo $total;?>/-</strong></div>
                  </div>
                  <div>
                    <img src="../attachement/visa.jpg" width="48" alt="no">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </body>
</html>
<script>
    function paymentValdation(){

        /* CARD NUMBER VALIDATION */
        var cardNumber=document.getElementById('cardNumber');
        var cardNumberError=true;
        if(cardNumber.value==''){
            cardNumber.style="border:1px solid red";
            document.getElementById('cardNumberMsg').innerHTML="Required Card Number";
            document.getElementById('cardNumberMsg').style="color:red";
            cardNumberError=false;
         }else if(cardNumber.value.length ==16 ){
            cardNumber.style="";
            document.getElementById('cardNumberMsg').innerHTML="";
            document.getElementById('cardNumberMsg').style="";
            cardNumberError=true;
         }else{
            cardNumber.style="border:1px solid red";
            document.getElementById('cardNumberMsg').innerHTML="Only 16 digit";
            document.getElementById('cardNumberMsg').style="color:red";
            cardNumberError =false;
         }

        
        /* CVV NUMBER VALIDATION */
        var cvv=document.getElementById('cvv');
        var cvvError=true;
        if(cvv.value==''){
            cvv.style="border:1px solid red";
            document.getElementById('cvvMsg').innerHTML="Required CVV Number";
            document.getElementById('cvvMsg').style="color:red";
            cvvError=false;
         }else if(cvv.value.length ==4 ){
            cvv.style="";
            document.getElementById('cvvMsg').innerHTML="";
            document.getElementById('cvvMsg').style="";
            cvvError=true;
         }else{
            cvv.style="border:1px solid red";
            document.getElementById('cvvMsg').innerHTML="Only 4 digit";
            document.getElementById('cvvMsg').style="color:red";
            cvvError=false;
         }
       

        
        /* EXPIRY DATA VALIDATION */
        var expiry_mm=document.getElementById('expiry_mm');
        var expiry_yy=document.getElementById('expiry_yy');
        var expiryError=true;
        if(expiry_mm.value=='' ||  expiry_yy.value==''){
            expiry_mm.style="border:1px solid red";
            expiry_yy.style="border:1px solid red";
            document.getElementById('expiryMsg').innerHTML="Required Expiry Date";
            document.getElementById('expiryMsg').style="color:red";
            expiryError=false;
         }else if(expiry_mm.value > 0 && expiry_mm.value <=12 &&  expiry_yy.value >21  ){
            console.log(expiry_mm.value.length);
            expiry_mm.style="";
            expiry_yy.style="";
            document.getElementById('expiryMsg').innerHTML="";
            document.getElementById('expiryMsg').style="";
            expiryError=true;
         }else{
            expiry_mm.style="border:1px solid red";
            expiry_yy.style="border:1px solid red";
            document.getElementById('expiryMsg').innerHTML="Not Valid";
            document.getElementById('expiryMsg').style="color:red";
            expiryError=false;
         }

         /* ZIP CODE VALIDATION */
        var zipcode=document.getElementById('zipcode');
        var zipcodeError=true;
        if(zipcode.value==''){
            zipcode.style="border:1px solid red";
            document.getElementById('zipcodeMsg').innerHTML="Required Zip Code";
            document.getElementById('zipcodeMsg').style="color:red";
            zipcodeError=false;
         }else if(zipcode.value.length == 6  ){
            zipcode.style="";
            document.getElementById('zipcodeMsg').innerHTML="";
            document.getElementById('zipcodeMsg').style="";
            zipcodeError=true;
         }else{
            zipcode.style="border:1px solid red";
            document.getElementById('zipcodeMsg').innerHTML="Not Valid Zip Code";
            document.getElementById('zipcodeMsg').style="color:red";
            zipcodeError=false;
         }
        console.log(cardNumber);
        return cardNumberError && cvvError && expiryError && zipcodeError ;
    }
</script>