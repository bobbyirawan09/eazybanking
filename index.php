<?php include 'base.php' ?>
<?php startblock('title') ?>
	Eazy Banking
<?php endblock() ?>

<?php startblock('head') ?>
	<link rel="stylesheet" href="bootstrap/css/carousel.css">
	<script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    .caption {
      position: absolute;
      right: 15%;
      top: 40%;
      left: 15%;
      z-index: 10;
      color: #fff;
      text-align: left;
      text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
    }
  </style>
<?php endblock() ?>

<?php startblock('body') ?>
<?php
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
  }
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="assets/hero-cafe.jpg" alt="First slide">
      <div class="container">
        <div class="caption">
          <h1><strong>Save Easily. Bank Beautifully.</strong><br>
          <small style="color: white;">Open your Account in just a couple of minutes</small></h1><br>
          <a href="signup.php"><button class="btn btn-primary btn-lg">Get Eazy</button></a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide" src="assets/home-sts.jpg" alt="Second slide">
      <div class="container">
        <div class="caption" style="top: 70%; left: 2%;">
          <h1><strong>Always know what's Safe-to-Spend.</strong><br>
          <small style="color: white;">Smart spending is just like saving.</small></h1><br>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="third-slide" src="assets/activity.jpg" alt="Third slide">
      <div class="container">
        <div class="caption" style="top: 70%; left: 5%;">
          <h1><strong>See all your daily ebbs and flows.</strong><br>
          <small style="color: white;">A friendly notification will let you know every time one of you spends from your account, keeping you well-acquainted with your finances.</small></h1><br>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <div class="row featurette">
    <div class="col-md-6" style="padding-top: 5%;">
      <h2 class="section-heading"><strong>This is Eazy.</strong></h2>
      <hr>
      <p class="lead text-justify">It’s the whole idea of banking, remade with lovely design, equally lovely tools to help you save (right inside your account), and genuine human goodness.</p>
    </div>
    <div class="col-md-6">
      <img class="img-rounded" style="width: 100%; height: 100%;" src="assets/ez-kit.png">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-6 col-md-push-6" style="padding-top: 5%;">
      <h2 class="section-heading text-right"><strong>Set Goals to save automatically.</strong></h2>
      <hr>
      <p class="lead text-right">Heartening, easy wins. Ticking up every day in the background.</p>
    </div>
    <div class="col-md-6 col-md-pull-6">
       <img class="img-rounded" style="width: 100%; height: 100%;" src="assets/goals-01.gif">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-6" style="padding-top: 5%;">
      <h2 class="section-heading"><strong>Use Goals for anything.</strong></h2>
      <hr>
      <p class="lead">From huge dreams to helpful budgets.</p>
    </div>
    <div class="col-md-6">
      <img class="img-rounded" style="width: 100%; height: 100%;" src="assets/illustration-home-goal.png">
    </div>
  </div>

<br>
</div>
  <div class="row featurette geteasy">
    <div class="col-md-offset-1">
      <h1><strong>And all along the way :<br>
      No Fees!</strong><br>
      <small>We don't charge those. For anything.</small>
      </h1>
    </div>
  </div>
  <br>
  <div class="row featurette">
    <div class="col-md-4 col-md-offset-1">
      <img style="width: 100%; height: 100%;" src="assets/withyou.png"><br>
      <h3 style="text-align: center;"><strong>No branches means no errands.</strong><br><small>
      Deposit checks and make transfers from your phone. It’s all kinds of convenient.</small></h3>
    </div>
    <div class="col-md-4 col-md-offset-2">
      <img style="width: 100%; height: 100%;" src="assets/yourback.png"><br><br>
      <h3 style="text-align: center;"><strong>An account that's FDIC-insured.</strong><br><small>
      Through our intrepid partner banks.* Plus support from friendly humans.</small></h3>
    </div>
  </div>

<br><br>
<?php endblock() ?>