<?php include 'base.php' ?>
<?php startblock('title') ?>
	Eazy Banking
<?php endblock() ?>

<?php startblock('head') ?>
	<link rel="stylesheet" href="bootstrap/css/carousel.css">
	<script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<?php endblock() ?>

<?php startblock('body') ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Example headline.</h1>
          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
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
      <h2 class="section-heading"><strong>This is Eazy.<strong></h2>
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

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-offset-1">
      <h1><strong>And all along the way :<br>
      No Fees!</strong><br>
      <small>We don't charge those. For anything.</small>
      </h1>
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-4 col-md-offset-1">
      <img style="width: 100%; height: 100%;" src="assets/withyou.png">
      <h4 style="text-align: center;"><strong>No branches means no errands.</strong><br><small>
      Deposit checks and make transfers from your phone. It’s all kinds of convenient.</small></h4>
    </div>
    <div class="col-md-4 col-md-offset-2">
      <img style="width: 100%; height: 100%;" src="assets/yourback.png">
      <h4 style="text-align: center;"><strong>An account that's FDIC-insured.</strong><br><small>
      Through our intrepid partner banks.* Plus support from friendly humans.</small></h4>
    </div>
  </div>
</div>
<br><br>
<?php endblock() ?>