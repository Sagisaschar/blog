<?php
require_once 'app/helpers.php';
sess_start('fakebook');
$page_title = 'Home Page';
?>

<?php include 'tpl/header.php'; ?>
<main style="min-height: 700px;" class="main">

  <div class="container">
    <div class="row mt-5">

      <div class="col-sm-6 m-auto text-center mb-5">
        <h1 class="display-2 mt-5 h1-home">Women In High Tech</h1>
        <p class="mt-5 text-white font-italic" id="main-font">Here you can share your daily life in the industry and help other women integrate. </p>
        <p><a href="blog.php" class="btn btn-outline-light btn-lg mt-3 mb-5">Start Now</a></p>
      </div>
    </div>


  </div>


</main>

<div class="row text-justify mx-auto">
<div class="col-md-6 text-center align-self-center">
<h3>We here to help each other!</h3>
    <p>Help us grown in this blog, say your word and tell your story...</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium, dolores.</p>
</div>
  <div class="col-md-6 p-0 mx-auto">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/image2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/image3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/image4.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<section class="section p-3 mb-5">
    <div class="container">
  <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
  <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
    matter of hours to help you.</p>

  <div class="row">
    <div class="col-md-9 mb-md-0 mb-5">
      <form id="contact-form" name="contact-form" action="mail.php" method="POST">
        <div class="row">

          <div class="col-md-6">
            <div class="md-form mb-0">
              <input type="text" id="name" name="name" class="form-control">
              <label for="name" class="">Your name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="md-form mb-0">
              <input type="text" id="email" name="email" class="form-control">
              <label for="email" class="">Your email</label>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="md-form mb-0">
              <input type="text" id="subject" name="subject" class="form-control">
              <label for="subject" class="">Subject</label>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-12">

            <div class="md-form">
              <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
              <label for="message">Your message</label>
            </div>

          </div>
        </div>

      </form>

      <div class="text-center text-md-left">
        <a class="btn btn-info text-white mt-3" onclick="document.getElementById('contact-form').submit();">Send</a>
      </div>
      <div class="status"></div>
    </div>
    <div class="col-md-3 text-center">
      <ul class="list-unstyled mb-0 contact-address">
        <li><i class="fa fa-map-marker fa-2x"></i>
          <p>Rothschild Blvd 22, Tel Aviv-Yafo</p>
        </li>

        <li><i class="fa fa-phone mt-4 fa-2x"></i>
          <p>+ 972 50 567 8219</p>
        </li>

        <li><i class="fa fa-envelope mt-4 fa-2x"></i>
          <p>contact@womeninhtech.com</p>
        </li>
        <li class="mt-4">
          <a href="https://www.facebook.com/groups/1881586575425713/" target="_blank"><i class="fab fa-facebook mx-3 fa-2x social-facebook"></i></a>
          <a href="https://twitter.com/?lang=en" target="_blank"><i class="fab fa-twitter mx-3 fa-2x social-twitter"></i></a>
          <a href="https://plus.google.com/discover" target="_blank"><i class="fab fa-google-plus-g mx-3 fa-2x social-google"></i></a>
        </li>
      </ul>
    </div>

  </div>
</div>
</section>



<?php include 'tpl/footer.php'; ?>
