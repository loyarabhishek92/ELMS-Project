<!-- start navigation -->
<?php 
include('./navheader.php');
include('./dbconnection.php');
?>
    <!-- end navigation  -->

<!-- Start video background  -->
<div class="container-fluid margin1">
  <div class="vid-parent">
    <video playsinline autoplay muted loop>
      <source src="video/banvid.mp4">
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-content">
    <h1 class="my-content">Welcome to E-Gyan</h1>
    <?php
    if(!isset($_session['is_login'])){
      echo '<a href="#" class="btn btn-danger mt-3"  data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get started</a>';
    }
    else{
      echo '<a href="student/studentprofile.php" class="btn btn-primary mt-3">My profile</a>';
    }
    ?>
    
  </div>
</div>
<!-- End video background -->

<!-- start text banner  -->
<div class="container-fluid bg-danger text-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5><i class="fa fa-book-open mr-3"></i> 100+ Online courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fa-solid fa-users mr-3"></i> Expert Instructors</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fa fa-keyboard mr-3"></i> Lifetime Access</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fa fa-keyboard mr-3"></i> Lifetime Access</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fa fa-keyboard mr-3"></i> Lifetime Access</h5>
    </div>
  </div>
</div>
<!-- end text banner  -->


<!-- start most popular course -->
<?php
include('./popularcourse.php');   // yesla popular course.php file lai connect garna kaam garxa 
?>
<!-- end most popular course  -->

<!-- start contact us  -->
<div class="container mt-4" id="contact">
  <!-- start contact us container  -->
  <h2 class="text-center mb-4">Contact Us</h2>   <!--contact us heading-->
  <div class="row">     <!--start contact us row-->
  <div class="col-md-8">   <!--start contact us 1st column--> 
  <form action="" method="post">
    <input type="text" class="form-control" name="name" placeholder="name"><br>
    <input type="text" class="form-control" name="subject" placeholder="subject"><br>
    <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
    <textarea class="form-control" name="message" placeholder="How can we help?" style="height:150px;"></textarea><br>
    <input class="btn btn-primary" type="submit" value="send" name="submit">
  </form>
</div> <!--End contact us 1st column--> 

<div class="col-md-4 stripe text-white text-center">  <!--start contact us 2nd column--> 
<h4>Egyan</h4>
<p>Egyan,
  Near paras bus park,Bharatpur,
  Chitwan - 2121<br />
  phone:9844580317<br />
  www.coderasi.com
</p>
</div> <!--end contact us 2nd column--> 
  </div> <!--end contact us row--> 
 </div><br />  <!-- End contact us container  -->
<!-- End contact us  -->


<!-- start feedback section  -->

<div class="container">
 <h1 class="text-center">Student's Feedback</h1>
  <div class="row">
    <div class="col-md-12">
    <div id="carouselExampleIndicators" class="carousel slide">
    <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-md-4">
        <div class="single-box">
          <div class="img-area">
            <img src="./img/cat.jpg" alt="feedback_img">
          </div>
          <div class="img-text">
            <h2>person one</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas deleniti eum deserunt iste </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="single-box">
          <div class="img-area">
            <img src="./img/cat.jpg" alt="feedback_img">
          </div>
          <div class="img-text">
            <h2>person one</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas deleniti eum deserunt iste </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="single-box">
          <div class="img-area">
            <img src="./img/cat.jpg" alt="feedback_img">
          </div>
          <div class="img-text">
            <h2>person one</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas deleniti eum deserunt iste </p>
          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</div>
  </div>
  </div>
<!-- end feedback section  -->



<!-- start social follow  -->
<div class="container-fluid bg-danger">
<div class="row text-white text-center p-1">
    <div class="col-sm">
      <a href="https://www.facebook.com/loyar.avi.92" class="text-white social-hover"><i class="fab fa-facebook-f icon"></i>Facebook</a>
    </div>
    <div class="col-sm">
    <a href="#" class="text-white social-hover"><i class="fab fa-twitter icon"></i>Twitter</a>
    </div>
    <div class="col-sm">
    <a href="https://wa.me/qr/OTFEAZ7GCO1" class="text-white social-hover"><i class="fab fa-whatsapp icon"></i>Whatsapp</a>
    </div>
    <div class="col-sm">
    <a href="https://instagram.com/its_me_loyar_avi92?igshid=MzNINGNkZWQ4Mg==" class="text-white social-hover"><i class="fab fa-instagram icon"></i>Instagram</a>
    </div>
  </div>
</div>  <!--end social follow--> 

<!-- start about section  -->
<div class="container-fluid p-4" style="background-color:#e9ecef">
<div class="container" style="background-color:#E9ECEF">
<div class="row text-center">
  <div class="col-sm">
    <h5>About Us</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati voluptatibus expedita ad iure molestiae ratione quaerat mollitia pariatur aliquam, libero ut dignissimos impedit consequ</p>
  </div>
  <div class="col-sm">
    <h5>category</h5>
    <a href="#" class="text-dark">web Development</a><br />
    <a href="#" class="text-dark">web Designing</a><br />
    <a href="#" class="text-dark">android app dev</a><br />
    <a href="#" class="text-dark">ios Development</a><br />
    <a href="#" class="text-dark">Data Analysis</a><br />
  </div>
  <div class="col-sm">
    <h5>Contact Us</h5>
    <p>Lorem, ipsum dolor sit amet consectetur <br> Near paras bus park <br> bharatpur, Chitwan <br> ph. 9844580317</p>
  </div>
</div>
</div>
</div>
<!-- end about section  -->

<!-- start including footer -->
<?php 
include('./footer.php');
?>
<!-- end including footer -->