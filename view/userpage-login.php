<!DOCTYPE html>
<?php 
  include_once('header.php');
  include_once('userRegister.php'); 
?>
<!-- Login -->

<!-- login page... -->
<?php 
  require_once('../controller/loginController.php');
  $loginConObj = new loginController(); 
  $error=true;
  if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])){
      $row= $loginConObj->getLogin($_REQUEST['username'],$_REQUEST['password']);
      if($row != null){
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastName']=$row['lastName'];
        $_SESSION['user_email']=$row['user_email'];
        $_SESSION['lastname']=$row['lastName'];
        $_SESSION['user_id ']=$row['user_id'];
        header('location:index.php');
      }else{
        $error=false;
      }
  }
?>
<!-- LOGING MODULE -->
<div class="modal fade" id="usrLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-sm">
    <div class="modal-content">
     <div>
          <button style="float:right;padding-top: 25px;padding-right: 25px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
        </div>
      <div class="modal-body">
        <div class="pt-2 pb-2" >
          <a href="index.php" ><img hight="30%" width="40%" class="rounded mx-auto d-block"src="../attachement/loginlogo/logo.png"  alt=""></a>
          <h5 class="text-primary  card-title text-center pb-0 fs-4">User Login</h5>
        </div>
        <form  class="row g-3 needs-validation" method="post" autocomplete="off">
          <div class="col-12" >
            <!-- <label for="yourUsername" class="form-label">Username</label> -->
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input  type="text" name="username"  placeholder="User Id" class="form-control" id="yourUsername" >
            </div>
          </div>
          <div class="col-12" >
            <!-- <label for="yourPassword" class="form-label">Password</label> -->
            <input type="password"  name="password" placeholder="User Password"class="form-control" id="yourPassword"  size="50">
            <span style="color:red;"><?php if($error==false){ echo "Invalid UserId and Password..";}?></span>
            
            <a id="creates"  style="float:right;"href="userPassForget.php">Forgot password?</a> 
            <!-- <button type="button"  class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgotUser" style="float:right;">Forgot Passord</button> -->
          </div>
          <div class="col-12 text-center">
            <input class="btn btn-primary w-100" type="submit" name="submit" value="Login">
            <!-- <input type="submit" name="submit" class="btn btn-primary " value="submit"> -->
          </div>
          <div class="container">
            <hr class="hr-text" data-content="OR">
          </div>
          <div style="margin:0px">
            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#userRegister">Create Account</button>

            <!-- <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#adminLogin">Admin Login</button> -->
              <!-- <a style="padding-left:50px" id="creates" href="userRegister.php" name="user">Admin  -->
            <a style="padding-left:50px" id="creates" href="../admin/index.php" name="user">Admin Login</a> 
          </div>                   
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END LOGIN MODULE -->
<!-- user index -->
<?php include_once('footer.php');?>