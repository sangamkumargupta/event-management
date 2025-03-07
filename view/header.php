<?php 
  session_start();
  error_reporting(0);
  
?>
<!-- INCLUDE USER LOGIN PAGE -->
<?php include_once('userpage-login.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yummy Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/dataTables.min.js"></script>
  <link href="../assets/css/dataTables.min.css" rel="stylesheet">
  <script>
  $(document).ready(function() {
    $('#example').dataTable( {
        "bScrollInfinite": true,
        "bScrollCollapse": true,
        "sScrollY": "380px"
    } );
} );
</script>

  <style>
    .profileimg   {
      height: 40px;
      width: 40px;
      border-radius:20px;
    }
  </style>
</head>

<body>
<!-- INCLUDE BOOKING TBALE -->
<?php require_once('bookingTable.php');?>

<!-- HEADER SEACTION -->
<header id="header" class="header fixed-top d-flex align-items-center bg-primary ">
<div  class="container d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <img src="../assets/img/logo.png" alt="">
    <!-- <img style="border-radius:50px;"src="../assets/img/eventslogo.gif" alt=""> -->
    <h1 style="">Event Management</h1>
  </a>
  <nav id="navbar" class="navbar navbar-dark"  >
    <ul>
      <li><a href="#hero">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#menu">Menu</a></li>
      <li><a href="#events">Events</a></li>
      <li><a href="#chefs">Chefs</a></li>
      <li><a href="#gallery">Gallery</a></li>     
      <li><a href="#contact">Contact</a></li>
      <?php if(!empty($_SESSION['username'])){?>
        <li class="nav-item dropdown pe-3" class="userprofile">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img class="profileimg" src="../attachement/loginlogo/<?php echo $_SESSION['user_id ']?>.jpg" alt="Profile" hight="100%" width="100%"class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:white;"><?php echo $_SESSION['firstname'];?></span>
          </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <a href="profile.php"><span style="color:white;">Show Profile</span></a>
          </li>
          <hr/>
          <li class="dropdown-header">
            <a href="" style="color:black!important;"   data-bs-toggle="modal" data-bs-target="#showBooking">
              Your Booking
            </a>
          </li>
          <hr/>
          <li class="dropdown-header">
            <a href="userlog-out.php"><span ><i class="bi bi-box-arrow-right"></i>Log Out</span></a>
          </li>
        </ul>
      </li>         
      <?php }else{?>
        <li>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usrLogin">
            <i class="bi bi-person-fill-lock"></i><b>Login</b>
          </button>
        </li>
      <?php } ?>
    </ul>
  </nav><!-- .navbar -->
  <i style="color:white;" class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i style="color:white;"class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
</div>
</header>
