<?php include 'home.php' ?>
<?php startblock('title') ?>
	Eazy Banking
<?php endblock() ?>

<?php startblock('head') ?>
	<link rel="stylesheet" href="bootstrap/css/carousel.css">
	<script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    .column {
      float: left;
    }
    .summary {
      width: 30%;
    }
    .activity {
      width: 70%;
    }
  </style>
<?php endblock() ?>

<?php startblock('body') ?>
<div class="container" style="padding-top: 75px;">
  <div class="column activity">
    <h2> ini bagian activity</h2>
    <p>Pake data dummy aja untuk tampilannya
    <br>70% of width</p>
  </div>
  <div class="column summary">
    <h2>Ini bagian summary keuangannya</h2>
    <p>Debit
    <br>Credit
    <br>TOTAL
    <br>30% of width</p>
  </div>
</div>
<?php endblock() ?>