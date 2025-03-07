<?php 
  include_once('header.php');
  session_start();
    
  require_once('../controller/usereventController.php');
  $userEventCont = new usereventController();
  $userElements = $userEventCont->getEvents();

  require_once('../controller/servicescontroller.php');
  $serviceConj = new servicescontroller();
  $serviceElements = $serviceConj->getServices();     
?>

<!-- ======= HOME SLIDES ======= -->

<div  class="hero" id="hero">
  <div class=" order-1 order-lg-12 text-center text-lg-start">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img  src="../attachement/slide/one.jpg"  alt="...">
        </div>
        <!-- Dynamic Slide  -->
        <?php foreach($userElements as $key =>$value){
            $imgpath="../admin/attachement/eventsImage/".$value['eventid'].".jpg";
            if(!(file_exists($imgpath))){ $imgpath="../attachement/eventsImage/default.jpg"; }?>
            <div class="carousel-item">
              <img src="<?php echo $imgpath ; ?>"  alt="Not Image">
            </div><?php } ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>

<!-- End HOME SLIDES -->
<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>About Us</h2>
        <p>Learn More <span>About Us<span></p>
      </div>
      <div class="row gy-4">
        <div class="col-lg-7 position-relative about-img" style="background-image: url(../assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
          <div class="call-us position-absolute">
            <h4>Book a Table</h4>
            <p>+91 8271 1669 49</p>
          </div>
        </div>
        <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
          <div class="content ps-0 ps-lg-5">
            <p class="fst-italic">
            An event management system (or event management software) is a digital tool that streamlines the planning, organization, and execution of events. 
            </p>
            <ul>
              <li>It encompasses a range of features such as event registration, ticketing, venue selection, scheduling, attendee engagement, and post-event analysis. By using event management software, event organizers can simplify their tasks and more efficiently manage logistics, communicate with participants, and analyze data to enhance future events.</li>
            </ul>
            <p>
                Not to mention, event management software offers a centralized platform for coordination, reducing manual efforts and increasing precision, ultimately enhancing the overall success and efficiency of events. Accruent EMS is event management software that provides you all of these key features to help ensure your next event goes off without a hitch.
            </p>
            <div class="position-relative mt-4">
              <img src="../attachement/slide/two.jpg" class="img-fluid" alt="">
              <a href="https://www.youtube.com/watch?v=9P5X_HLLjk8" class="glightbox play-btn"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->
  <!-- ======= Stats Counter Section ======= -->
  <section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="zoom-out">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <h2 style="color:yellow;"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></h2>
            <p>Rating</p>
          </div>
        </div><!-- End Stats Item -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
           <h2 style="color:white;">500</h2>
            <p>Share</p>
          </div>
        </div><!-- End Stats Item -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <h2 style="color:white;" >333  <i  style="color:red;" class="bi bi-heart-fill"></i></h2>
            <p>Like</p>
          </div>
        </div><!-- End Stats Item -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <h2 style="color:white;">500</h2>
            <p>Follow</p>
          </div>
        </div><!-- End Stats Item -->
      </div>
    </div>
  </section><!-- End Stats Counter Section -->
  <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span>Service's Menus </span></p>
      </div>
      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-Drink">
            <h4>Drink</h4>
          </a>
        </li><!-- End tab nav item -->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Vegetable">
            <h4>Veg Dish</h4>
          </a><!-- End tab nav item -->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Non-Vegetable">
            <h4>Non-Veg Dish</h4>
          </a>
        </li><!-- End tab nav item -->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Electric-Item">
            <h4>Electric-Item</h4>
          </a>
        </li><!-- End tab nav item -->
      </ul>
      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
        <div class="tab-pane fade active show" id="menu-Drink">
          <div class="tab-header text-center">
            <h3>Drink</h3>
          </div>
          <div class="row gy-5">
          <?php 
              $flag=1;
              foreach($serviceElements as $key =>$value){
                if($value['service_type']=="Drinks"){ ?>
          <div class="col-lg-4 menu-item">
            <?php 
              $imgpath="../admin/attachement/serviceImage/".$value['serviceid'].".jpg";
              if(!(file_exists($imgpath))){
                $imgpath="../attachement/serviceImage/default.jpg";
              }?>
            <a href="<?php echo $imgpath ; ?>" class="glightbox"><img class="services" src="<?php echo $imgpath ; ?>" class="menu-img img-fluid" alt=""></a>
            <h4><?php echo  $value['service_name']?></h4>
            <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
            <p class="price">
              <?php echo $value['service_charge'] ; ?><span>/- Per</span> 
            </p>
          </div>
          <?php }} ?>
        </div>
        </div><!-- End drink Menu Content -->
        <div class="tab-pane fade" id="menu-Vegetable">
         <div class="tab-header text-center">
            <h3>Veg Dish</h3>
          </div>
          <div class="row gy-5">
          <?php 
              $flag=1;
              foreach($serviceElements as $key =>$value){
                if($value['service_type']=="veg"){ ?>
            <div class="col-lg-4 menu-item">
              <?php 
                $imgpath="../admin/attachement/serviceImage/".$value['serviceid'].".jpg";
                if(!(file_exists($imgpath))){
                  $imgpath="../attachement/serviceImage/default.jpg";
                }?>
              <a href="<?php echo $imgpath ; ?>" class="glightbox"><img class="services" src="<?php echo $imgpath ; ?>" class="menu-img img-fluid" alt=""></a>
              <h4><?php echo $value['service_name'] ; ?></h4>
              <p class="ingredients">
                <?php echo $value['service_desc'] ; ?>
              </p>
              <p class="price">
                <?php echo $value['service_charge'] ; ?><span>/- Per</span> 
              </p>
            </div><!-- Menu Item -->
          <?php
          }}?>
        </div>
        </div><!-- End frut vegetable Menu Content -->
        <div class="tab-pane fade" id="menu-Non-Vegetable">
          <div class="tab-header text-center">
            <!-- <p>Menu</p> -->
            <h3>Non vege</h3>
          </div>
          <div class="row gy-5">
          <?php 
              $flagv=1;
              foreach($serviceElements as $key =>$value){
                if($value['service_type']=="Non vege"){ ?>
            <div class="col-lg-4 menu-item">
              <?php 
                $imgpath="../admin/attachement/serviceImage/".$value['serviceid'].".jpg";
                if(!(file_exists($imgpath))){
                  $imgpath="../attachement/serviceImage/default.jpg";
                }?>
              <a href="<?php echo $imgpath ; ?>" class="glightbox"><img class="services" src="<?php echo $imgpath ; ?>" class="menu-img img-fluid" alt=""></a>
              <h4><?php echo $value['service_name'] ; ?></h4>
              <p class="ingredients">
                <?php echo $value['service_desc'] ; ?>
              </p>
              <p class="price">
                <?php echo $value['service_charge'] ; ?><span>/- Per</span> 
              </p>
            </div><!-- Menu Item -->
          <?php
          }}?>
        </div>
        </div><!-- End non vegetable Menu Content -->
        <div class="tab-pane fade" id="menu-Electric-Item">
          <div class="tab-header text-center">
            <h3>Electric Item</h3>
          </div>
          <div class="row gy-5">
          <?php 
              $flag=1;
              foreach($serviceElements as $key =>$value){
                if($value['service_type']=="Electric Items"){
          ?>
            <div class="col-lg-4 menu-item">
              <?php 
                $imgpath="../admin/attachement/serviceImage/".$value['serviceid'].".jpg";
                if(!(file_exists($imgpath))){
                  $imgpath="../attachement/serviceImage/default.jpg";
                }
              ?>
              <a href="<?php echo $imgpath ; ?>" class="glightbox"><img src="<?php echo $imgpath ; ?>" class="menu-img img-fluid" alt=""></a>
              <h4><?php echo $value['service_name'] ; ?></h4>
              <p class="ingredients">
                <?php echo $value['service_desc'] ; ?>
              </p>
              <p class="price">
                <?php echo $value['service_charge'] ; ?><span>/- Per</span> 
              </p>
            </div><!-- Menu Item -->
          <?php }}?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Menu Section -->

  
  <!-- ======= Events Section ======= -->
  <section id="events" class="events">
    <div class="container" data-aos="fade-up" >
      <div class="section-header">
        <h2>Events</h2>
        <p>Share <span>Your Moments</span> In Our Restaurant</p>
      </div>
      <div class="slides-3 " data-aos="fade-up" data-aos-delay="100"> 
        <div class="swiper-wrapper">            
          <?php 
              $sn=1;
              foreach($userElements as $key =>$value){
          ?>
          <div class="swiper-slide  justify-content-end">              
              <div class="card " style="width:100%;">
                <?php 
                  $imgpath="../admin/attachement/eventsImage/".$value['eventid'].".jpg";
                  if(!(file_exists($imgpath))){
                    $imgpath="../attachement/eventsImage/default.jpg";
                  }
                ?>
                <div class="span3 food1">
                <img src="<?php echo $imgpath ; ?>"  class="responsive" height="100%" width="100%" class="card-img-top" alt="...">
              </div>                
              <div class="card-body">
              <h5 class="text-center">-:(Details):-</h5>
                <table class="table">
                  <tr>
                    <th>Event Name</th>
                    <td><?php echo $value['event_name']; ?> </td>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <td><span style="color:red;"><?php echo $value['event_charge']; ?>.00</span>/-</td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td><?php echo $value['event_description']; ?></td>
                  </tr>
                </table>
                <?php if(!empty($_SESSION['username'])){ ?>
                  <center><a href="bookingform.php?eventsName=<?php echo $value['event_name'];?>" class="btn btn-primary">Book Now</a></center>
                <?php }else{?>
                  <center><button  style="cursor: no-drop;opacity: 0.5;" class="btn btn-primary ">Book Now</button></center>
                <?php }?>
              </div>
            </div>
          </div><!-- End Event item -->
          <?php } ?>
      </div>
  </section><!-- End Events Section -->
  <!-- ======= Chefs Section ======= -->
  <section id="chefs" class="chefs section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Chefs</h2>
        <p>Our <span>Proffesional</span> Chefs</p>
      </div>
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="chef-member">
            <div class="member-img">
              <img src="../assets/img/chefs/deepak.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Mr Deepak Ji  </h4>
              <span>Master Chef</span>
              <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
            </div>
          </div>
        </div><!-- End Chefs Member -->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="chef-member">
            <div class="member-img">
              <img src="../assets/img/chefs/sangam.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100032350464199&mibextid=2JQ9oc"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/call_me_sangam__gupta?igsh=OG01d3c2Y2djM3k0"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/mr-s-kumar-b83848265?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Mr. S Kumar Ji</h4>
              <span>Patissier</span>
              <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
            </div>
          </div>
        </div><!-- End Chefs Member -->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="chef-member">
            <div class="member-img">
              <img src="../assets/img/chefs/vinod.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Mr Vinod Ji</h4>
              <span>Cook</span>
              <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Chefs Section -->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">
     <div class="section-header">
        <h2>gallery</h2>
        <p>Check <span>Our Gallery</span></p>
      </div>
      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/first.jpg"><img src="../assets/img/gallery/first.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/second.jpg"><img src="../assets/img/gallery/second.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/fourth.jpg"><img src="../assets/img/gallery/fourth.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/third.jpg"><img src="../assets/img/gallery/third.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/second2.jpg"><img src="../assets/img/gallery/second2.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/five.jpg"><img src="../assets/img/gallery/five.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/six.jpg"><img src="../assets/img/gallery/six.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="../assets/img/gallery/seven.jpg"><img src="../assets/img/gallery/seven.jpg" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- End Gallery Section -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Contact</h2>
        <p>Need Help? <span>Contact Us</span></p>
      </div>
      <div class="mb-3">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div><!-- End Google Maps -->
      <div class="row gy-4">
        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-map flex-shrink-0"></i>
            <div>
              <h3>Our Address</h3>
              <p>Ajemr Rajsthan 30501</p>
            </div>
          </div>
        </div><!-- End Info Item -->
        <div class="col-md-6">
          <div class="info-item d-flex align-items-center">
            <i class="icon bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p><u>sseventmanagement@gmail.com</u></p>
            </div>
          </div>
        </div><!-- End Info Item -->
        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+91 8271 1669 49</p>
            </div>
          </div>
        </div><!-- End Info Item -->
        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-share flex-shrink-0"></i>
            <div>
              <h3>Opening Hours</h3>
              <div><strong>Mon-Sat:</strong> 9AM - 12PM;
                <strong>Sunday:</strong> Closed
              </div>
            </div>
          </div>
        </div><!-- End Info Item -->
      </div>
      <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Form</span></p>
        </div>
        <div class="row">
          <div class="col-xl-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-xl-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>
  </section><!-- End Contact Section -->
  </main>
  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon"></i>
        <div>
          <h4>Address</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022 - US<br>
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class="bi bi-telephone icon"></i>
        <div>
          <h4>Reservations</h4>
          <p>
            <strong><i class="bi bi-telephone-outbound-fill"></i>  :</strong> 91 8271 166 949<br>
            <strong><i class="bi bi-envelope-at-fill"></i></strong> sangamkumargupta420@gmail.com<br>
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class="bi bi-clock icon"></i>
        <div>
          <h4>Opening Hours</h4>
          <p>
            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
            Sunday: Closed
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Follow Us</h4>
        <div class="social-links d-flex">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
        <div style="padding:12px;">
          <a href="feedback" style=" float:right;" class="btn btn-primary btn-sm">feedback</i></a>
        </div>
      </div>
    </div>
  </div>
<?php include_once('footer.php');?>
