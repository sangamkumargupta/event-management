
<?php 
    session_start();
    if(empty($_SESSION['username'])){
      header('location:index.php');
    }
    //require_once('header.php');
    require_once('../controller/bookController.php');
    $bookCon = new bookController();

    /*  FETCH COUNTRY  */
    $country = $bookCon->getCountrys();
    
    /*  FETCH EVENT  */
    $events  = $bookCon->getEvent();
    
    /*  FETCH SERVICE  */
    $services  = $bookCon->getService();

    if(!empty($_REQUEST['Submit']) && $_REQUEST['Submit']=="Submit"){   
    echo "<script>window.location.href='paymentForm.php'</script>";  
    } 
    
?>
<!-- The Modal -->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Booking Form</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- js file -->
  <script src="../assets/js/jquery.min.js"></script>
</head>
<body>
<main style="background:#e9eef3ad">
  <div class="container" >
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body" style="padding:30px">
                  <a href="index.php" class="cancle" ><i style="float:right;font-size:30px;color:black;" class="bi bi-x"></i></a>
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Booking Form</h5>
                    <p class="text-center small">Enter your personal details for booking </p>
                  </div>
                  <form class="row g-3 needs-validation"  action="paymentForm.php" method="" onsubmit="return formValidation()" enctype="multipart/form-data">
                    <!-- candidate name -->
                    <div class="col-lg-6 col-md-12">
                        <label for="yourName" class="form-label">Candidate Name</label>
                        <input type="text" name="candidateName" placeholder="Candidate Name"class="form-control" id="candidateName"  >
                        <span id="canMsg"></span>
                    </div>
                    <!-- candidate number -->
                    <div class="col-lg-6 col-md-12">
                        <label for="yourName" class="form-label">Candidate Number</label>
                        <input type="text" name="candidateNumber" placeholder="Candidate Number"class="form-control" id="candidateNumber"  >
                        <span id="numMsg"></span>
                    </div>
                    <!-- email -->
                    <div class="col-lg-6 col-md-12">
                        <label for="yourEmail" class="form-label">Your Email</label>
                        <input type="email" name="bookEmail" placeholder="Your Email"class="form-control" id="bookEmail"  >
                        <span id="emailError"></span>
                    </div>

                    <!-- Number Of Guest  -->
                    <div class="col-lg-6 col-md-12">
                        <label for="yourEmail" class="form-label">Number Of Guest</label>
                        <input type="number" name="numOfGuest" placeholder="Number Of Guest"class="form-control" id="numOfGuest"  >
                        <span id="numOfGuestError"></span>
                    </div>

                    <!-- Event Date -->
                    <div class="col-lg-6 col-md-12">
                        <label for="yourEmail" class="form-label">Event date</label>
                        <input type="date" name="evetDate" placeholder="Your Email"class="form-control" id="evetDate"  >
                        <span id="evetDateMsg"></span>
                    </div>


                    <!-- event Status -->
                    <!-- <div class="col-lg-6 col-md-12">
                        <label for="yourEmail" class="form-label">Your Email</label>
                        <input type="email" name="yourEmail" placeholder="Your Email"class="form-control" id="yourEmail"  >
                        <span id="emailMsg"></span>
                    </div> -->
                    <!-- country -->
                    <div class="col-lg-6 col-md-12">
                      <label for="yourPassword" class="form-label">Select Country</label>
                      <select class="form-control" id="country" name="country"  >
                        <option value="" selected decibled>--select--</option>
                        <?php foreach($country as $key =>$value){?>
                          <option value="<?php echo $value['id']; ?>"><?php echo $value['cname']; ?></option>
                        <?php }?>
                      </select>
                      <span id="countryMsg"></span>
                    </div>
                    <!-- state -->
                    <div class="col-lg-6 col-md-12">
                      <label for="yourPassword" class="form-label">Select State</label>
                      <select class="form-control" id="state" name="state"  >
                        <option value="">--select--</option>
                      </select>
                      <span id="stateMsg"></span>
                    </div>
                    <!-- city  -->
                    <div class="col-lg-6 col-md-12">
                      <label for="yourPassword" class="form-label">Select City</label>
                      <select class="form-control text-center" name="city" id="city" >
                        <option value="">--select City--</option>
                      </select>
                      <span id="cityMsg"></span>
                    </div>
                    <!-- events -->
                    <div class="col-lg-6 col-md-12">
                      <label for="yourUsername" class="form-label">Your Selected Event</label>
                      <select class="form-control"  name="selectEvent" id="selectEvent">
                        
                        <?php foreach($events as $key =>$value){
                          if($value['event_name']==$_REQUEST['eventsName']){
                        ?>
                          <option value="<?php echo $value['eventid']; ?>"><?php echo $value['event_name']; ?></option>
                        <?php }}?>
                      </select>
                    </div>
                    <!-- service -->
                    <div class="col-lg-6 col-md-12">
                      <label for="yourPassword" class="form-label">Select Service</label>
                      <select class="form-control" name="selectService[]"id="selectService" size="4" multiple="multiple">
                        <option value="" selected decibled>--select--</option>
                        <?php foreach($services as $key =>$value){?>
                          <option value="<?php echo $value['serviceid']; ?>"><?php echo $value['service_name']; ?></option>
                        <?php }?>
                      </select>
                      <span id="serviceMsg"></span>
                    </div>
                    <div class="col-lg-12 col-md-12 text-center">
                      <input type="submit" name="Submit" class="btn btn-success btn-sm" value="Submit">
                      <input type="submit" name="Cancle" class="btn btn-danger btn-sm" value="Cancle">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </div>
</main>
<!-- FORM VALIDAITON -->

<!-- form validation -->

<script>
  function formValidation(){
    
    // Candidate Name Validation
    var canError=true;
    var canName=document.getElementById("candidateName");
    if(canName.value == ""){
      canName.style="border:1px solid red";
      document.getElementById("canMsg").innerHTML="Required Candidate Name";
      document.getElementById("canMsg").style="color:Red";
      canError=false;
    }else{
      document.getElementById("candidateName").style="";
      document.getElementById("canMsg").innerHTML="";
      document.getElementById("canMsg").style="";
      canError=true;
    }

    // Candidate Number Validation
    var numError=true;
    var canNumber=document.getElementById("candidateNumber");
    if(canNumber.value == ""){
      document.getElementById("candidateNumber").style="border:1px solid red";
      document.getElementById("numMsg").innerHTML="Required Candidate Number";
      document.getElementById("numMsg").style="color:Red";
      numError=false;
    }else{
      document.getElementById("candidateNumber").style="";
      document.getElementById("numMsg").innerHTML="";
      document.getElementById("numMsg").style="";
      numError=true;
    }
    // Candidate Number Validation
    var emailError=true;
    var cosEmail=document.getElementById("bookEmail");
    console.log(cosEmail);
    
    
    if(cosEmail.value==""){
      cosEmail.style="border:1px solid red";
      document.getElementById("emailError").innerHTML="Required Email";
      document.getElementById("emailError").style="color:red";
    }else{
      document.getElementById("emailError").innerHTML="";
      document.getElementById("emailError").style="";
    }

    // Number of Guest Validation
    var numOfGuestError=true;
    var numOfGuest=document.getElementById("numOfGuest");
    if(numOfGuest.value==""){
      numOfGuest.style="border:1px solid red";
      document.getElementById("numOfGuestError").innerHTML="Required Num Of Guest";
      document.getElementById("numOfGuestError").style="color:red";
      numOfGuestError=false;
    }else if(numOfGuest.value > 0){
      numOfGuest.style="";
      document.getElementById("evetDateMsg").innerHTML="";
      document.getElementById("evetDateMsg").style="";
      document.getElementById("numOfGuestError").innerHTML="";
      numOfGuestError=true;
    }else{
      numOfGuest.style="border:1px solid red";
      document.getElementById("numOfGuestError").innerHTML="Only Positive Number";
      document.getElementById("numOfGuestError").style="color:red";
      numOfGuestError=false;
    }

    // Date  Validation
    var dateError=true;
    var dates=document.getElementById("evetDate");
    if(dates.value==""){
      dates.style="border:1px solid red";
      document.getElementById("evetDateMsg").innerHTML="Required Date";
      document.getElementById("evetDateMsg").style="color:red";
      dateError=false;
    }else{
      dates.style="";
      document.getElementById("evetDateMsg").innerHTML="";
      document.getElementById("evetDateMsg").style="";
      dateError = true;
    }

    // Candidate service Validation
    var serviceError=true;
    var canService=document.getElementById("selectService");
    
    if(canService.value==""){
      canService.style="border:1px solid red";
      document.getElementById("serviceMsg").innerHTML="Required Service";
      document.getElementById("serviceMsg").style="color:red";
      serviceError=false;
    }else{
      canService.style="";
      document.getElementById("serviceMsg").innerHTML="";
      document.getElementById("serviceMsg").style="";
      serviceError=true;
    }


    // Candidate city Validation
    var cityError=true;
    var canCity=document.getElementById("city");
    
    if(canCity.value==""){
      canCity.style="border:1px solid red";
      document.getElementById("cityMsg").innerHTML="Required City";
      document.getElementById("cityMsg").style="color:red";
      cityError=false;
    }else{
      canCity.style="";
      document.getElementById("cityMsg").innerHTML="";
      document.getElementById("cityMsg").style="";
      cityError=true;
    }

    // Candidate State Validation
    var stateError=true;
    var canState=document.getElementById("state");
    if(canState.value==""){
      canState.style="border:1px solid red";
      document.getElementById("stateMsg").innerHTML="Required State";
      document.getElementById("stateMsg").style="color:red";
      stateError=false;
    }else{
      canState.style="";
      document.getElementById("stateMsg").innerHTML="";
      document.getElementById("stateMsg").style="";
      stateError=true;
    }

    // Candidate Country Validation
    var conError=true;
    var canCountry=document.getElementById("country");
    
    if(canCountry.value==""){
      canCountry.style="border:1px solid red";
      document.getElementById("countryMsg").innerHTML="Required Country";
      document.getElementById("countryMsg").style="color:red";
      conError=false;
    }else{
      canCountry.style="";
      document.getElementById("countryMsg").innerHTML="";
      document.getElementById("countryMsg").style="";
      conError=true;
    }
    return numOfGuestError && dateError && canError && numError && emailError && conError && stateError && cityError && serviceError;
  }
</script>                
<!-- END FORM VALIDATION -->

<!-- FIELD DEPENDENCE -->

<script>
    $(document).ready(function(){
      $("#country").change(function(){
        var countryId=this.value;
        //alert(countryId);
        $.post("loadpage.php",{country_id:countryId},function(data){
          $("#state").html(data);
          $("#city").html('<option value="">--select city--</option>');
        });
      });
     $("#state").change(function(){
        var state_id=this.value;
        //alert(state_id);
        $.post("loadpage.php",{st_id:state_id},function(data){
          $("#city").html(data);
        });
      });
      

    });
  </script>
<!-- END FIELD DEPENDENCE -->