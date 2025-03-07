  
<?php 
  require_once('../controller/registerController.php');
  $registerData = new registerController();

  require_once('../controller/loginController.php');
  $LoginObj = new loginController();
   session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require '..\PHPMailer\src\Exception.php';
  require '..\PHPMailer\src\SMTP.php';
  require '..\PHPMailer\src\PHPMailer.php';
  
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();
      $emailCheck = '';
      $mail->Host       = 'smtp.gmail.com';                    
      $mail->SMTPAuth   = true;                                
      $mail->Username   = 'sangamkumargupta420@gmail.com';     
      $mail->Password   = 'bzqgpccbtdkgmblh';                  
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
      $mail->Port       = 465;                                 

      //Recipients
      $mail->setFrom('from@example.com', 'Sangam Kumar');
     if(!empty($_REQUEST['email'])){
          $mail->addAddress($_REQUEST['email']);
          $mail->isHTML(true);                                  
          $mail->Subject = 'Here is the subject';
          $num_str = sprintf("%06d", mt_rand(1, 999999));
          $mail->Body    = '<h1>Enter Your OTP</h1><br/><b style="font-size:40px;">'.$num_str.'</b>';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          $data = $LoginObj->getEmail($_REQUEST['email']);
          if($data != null){
            $_SESSION['user_id'] = $data[0]['user_id'];
            $_SESSION['user_email'] = $data[0]['user_email'];
            $_SESSION['user_otp'] = $num_str;
            $emailCheck = 'Valid Email';
            echo "<script>window.location.href='conformOTP.php'</script>";
          }else{
            $emailCheck='Please enter register eamil';
          }
        }
      //echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>
<!-- end otp forgot.. -->
<?php 

  require_once('../controller/loginController.php');
  $loginObj = new loginController();
  
  // get all user emails...
  if(!empty($_REQUEST['email'])){
    $getEmails = $loginObj->getEmail($_REQUEST['email']);
  }
  
  //var_dump($_REQUEST);
  
    

  
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
  <!-- Template Main CSS File -->
  
</head>
<body>
  <main style="background:#e9eef3ad">
    <div class="container"  >
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
               
                <!-- End Logo -->
                <div class="card mb-3">

                  <div class="card-body" >
                    <a href="index.php" class="cancle" ><i style="float:right;font-size:30px;color:black;" class="bi bi-x"></i></a>
                    <div class="pt-4 pb-2">
                    <a href="index.php" ><img hight="30%" width="40%" class="rounded mx-auto d-block"src="../attachement/loginlogo/logo.png"  alt=""></a>
                      <h5 class="card-title text-center pb-0 fs-4">send Mail </h5>
                      <p class="text-center small">Enter your Eamil to create new Password</p>
                      
                    </div>

                    <!-- EMAIL FORM -->

                    <form class="row g-3 needs-validation" method="post" onsubmit="return myFunction()"enctype="multipart/form-data">
                      <!-- email -->
                      <div class="col-lg-12 col-md-12">
                        <label for="yourUsername" class="form-label">Enter Your Registered Email</label>
                        <div class="input-group has-validation">
                           <input type="text" name="email" class="form-control" id="yourUsername"/> 
                        </div>
                        <div><span id="msgEmail" style="color:red;"><?php echo $emailCheck; ?></span></div>
                      </div>
                      <!-- submit -->
                      <div class="col-lg-12 col-md-12">
                        <input type="submit" name="send" class="btn btn-primary w-100" value="send">
                      </div>
                      <!-- <div class="col-lg-12 col-md-12">
                        <p class="small mb-0">Already have an account? <a href="userpage-login.php" style="">Log in</a></p>
                      </div> -->
                    </form>
                   
                  </div>
                </div>
                <!-- <div class="credits">
                   Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div> -->
              </div>
            </div>
        </div>
      </section>
    </div>
  </main>
<script>
  function myFunction() {
    var email=document.getElementById("yourUsername").value;
    console.log(email);
    var emailError=true;
    
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(email == ''){
      document.getElementById("msgEmail").innerText="Please Enter Your Email";
      document.getElementById("msgEmail").style="color:red;";
      emailError=false;
    }else if(email.match(validRegex)){
      document.getElementById("msgEmail").innerText="";
        emailError=true; 
    }else{
      document.getElementById("msgEmail").innerText="Please correct eamil";
      document.getElementById("msgEmail").style="color:red;";
      emailError=false;
    }
    return emailError;
  }
</script>