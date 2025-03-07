<?php 
  error_reporting(0);
  include_once('header.php');
  
  #REGISTER CONTROLLER
  require_once('../controller/registerController.php');
  $registerData = new registerController();
  
  #LOGIN CONTROLLER
  require_once('../controller/loginController.php');
  $loginObj = new loginController();
  $getEmails = $loginObj->getEmail($_REQUEST['registerEmail']); 

  if(!empty($_REQUEST['submit']) && $_REQUEST['submit']=="submit" ){  
    if($getEmails == null){
      $tempName = $_FILES['uploadfile']['tmp_name'];

      #CALL REGISTER CONTROLLER METHOD
      $result =  $registerData->userregister($_REQUEST);
      if($result){
        move_uploaded_file($tempName, '../attachement/loginlogo/'.$result.'.jpg');
        echo '<script type="text/javascript">window.location.href="index.php"</script>';
      } 
    }else{
      //echo '<script>alert("This Email('.$_REQUEST['registerEmail'].') is allready register...")</script>'; 
      $getemails=$getEmails['user_email'];
      $registerError="It's  Allready Registerted";
    }
    
  } 
?>
<script>

$(document).ready(function(){
  $("#submitregister").click(function(){
    $("#userRegister").show(1000);
    //alert("The paragraph is now hidden");
  });
});
</script>
<!-- end login -->
<div class="modal fade" id="userRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-md">
    <div class="modal-content">
     
      <!-- Modal Header -->
      <div class="modal-header text-light bg-primary">
        <img hight="5%" width="10%" style="padding:0px;"src="../attachement/loginlogo/logo.png"  alt=""/ ><b>Create Account</b>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
        <div class="modal-body">
          <div class="card-body" >
            <form class="row g-3 needs-validation" onsubmit="return registerValidation()"method="post" enctype="multipart/form-data">
              <div class="col-lg-6 col-md-12">
                <label for="yourName" class="form-label">Your First Name</label>
                <input type="text" name="fname" placeholder="Your First Name"class="form-control" id="fname"  >
                <span id="fnameMsg"></span>
              </div>
              <div class="col-lg-6 col-md-12">
                <label for="yourName" class="form-label">Your Last Name</label>
                <input type="text" name="lname" placeholder="Your Last Name"class="form-control" id="lname"  >
                <span id="lnameMsg"></span>
              </div>
              <div class="col-lg-6 col-md-12">
                <label for="yourEmail" class="form-label">Your Email</label>
                <input type="email" name="registerEmail" placeholder="Enter Email" class="form-control" id="email"  />
                <span id="emailMsg"></span>
              </div>
              <div class="col-lg-6 col-md-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" placeholder="Enter User Name" name="username" class="form-control" id="username" />
                  <span id="userNameMsg"><br/></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control" id="password" >
                <span id="passwordMsg"></span>
              </div>
              <div class="col-lg-6 col-md-12">
                <label for="yourPassword" class="form-label">Upload Profile Pic</label>
                <input type="file"  id="uploadfile"class="form-control" name="uploadfile">
                <span id="uploadfileMsg"></span>
              </div>

             
              <div class="col-lg-12 col-md-12 text-center">
                <input type="submit" id="submitregister" name="submit" class="btn btn-primary " value="submit">
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
  
<!-- <button >Try it</button> -->

</div>
<!-- -->


<!--  -->
<script>
    
  function registerValidation(){
    
    var firstName=document.getElementById('fname');
    
    var fError=true;
    if(firstName.value=='')
    {

      firstName.style="border:2px solid red";
      document.getElementById('fnameMsg').innerText="Please Enter Last Name ";
      document.getElementById('fnameMsg').style="color:red;";
      fError=false;
    }else{
      firstName.style="";
      document.getElementById('fnameMsg').innerText="";
      document.getElementById('fnameMsg').style="";
      fError=true;
    }
    //Last name 
    var lastName=document.getElementById('lname');
    
    var lError=true;


    if(lastName.value==''){
      lastName.style="border:2px solid red";
      document.getElementById('lnameMsg').innerText="Enter Last Name";
      document.getElementById('lnameMsg').style="color:red;";
      lError=false;
    }else{
      lastName.style="";
      document.getElementById('lnameMsg').innerText="";
      document.getElementById('lnameMsg').style="";
      lError=true;
    }

    //Last name 
    var email=document.getElementById('email');
    var emailError=true;
    if(email.value ==''){
      email.style="border:2px solid red";
      document.getElementById('emailMsg').innerText="Enter Email";
      document.getElementById('emailMsg').style="color:red;";
      emailError=false;
    }else{
      email.style="";
      document.getElementById('emailMsg').innerText="";
      document.getElementById('emailMsg').style="";
      emailError=true;
    }

    //Last name 
    var username=document.getElementById('username');
    var userNameError=true;
    if(username.value ==''){
      username.style="border:2px solid red";
      document.getElementById('userNameMsg').innerText="Enter User Name";
      document.getElementById('userNameMsg').style="color:red;";
      userNameError=false;
    }else{
      username.style="";
      document.getElementById('userNameMsg').innerText="";
      document.getElementById('userNameMsg').style="";
      userNameError=true;
    }

    //Last name 
    var password=document.getElementById('password');
    var passwordError=true;
    if(password.value ==''){
      password.style="border:2px solid red";
      document.getElementById('passwordMsg').innerText="Enter Password";
      document.getElementById('passwordMsg').style="color:red;";
      userNameError=false;
    }else{
      password.style="";
      document.getElementById('passwordMsg').innerText="";
      document.getElementById('passwordMsg').style="";
      passwordError=true;
    }

    //Last name 
    var uploadfile=document.getElementById('uploadfile');
    var uploadfileError=true;
    if(uploadfile.value ==''){
      uploadfile.style="border:2px solid red";
      document.getElementById('uploadfileMsg').innerText="Upload Image";
      document.getElementById('uploadfileMsg').style="color:red;";
      uploadfileError=false;
    }else{
      uploadfile.style="";
      document.getElementById('uploadfileMsg').innerText="";
      document.getElementById('uploadfileMsg').style="";
      uploadfileError=true;
    }
    return fError && lError && emailError && userNameError && passwordError &&uploadfileError;
  }
  
</script>
<!-- end login model -->