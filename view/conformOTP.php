<?php 
  session_start();
  $otpError='';
  if(!empty($_REQUEST['otp']) && !empty($_REQUEST['conform'])){
    if($_REQUEST['otp'] == $_SESSION['user_otp']){
      echo "<script>window.location.href='newPassword.php'</script>";
    }else{
      $otpError="Please Enter Valid OTP";
    }
  }
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
                      <h5 class="card-title text-center pb-0 fs-4">Confrim OTP</h5>
                      <p class="text-center small">Enter your Eamil to create new Password</p>
                      
                    </div>

                    
                    <!-- OTP -->
                    
                     <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                      <div class="col-lg-12 col-md-12">
                        <label for="yourUsername" class="form-label">Enter OTP</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                          <input type="text" name="otp" class="form-control" id="yourUsername"  >
                          
                        </div>
                        <div>
                          <span style="color:red;"><?php echo $otpError;?></span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <input type="submit" name="conform" class="btn btn-primary w-100" value="conform">
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