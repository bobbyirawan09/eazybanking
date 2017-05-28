<?php include "basemember.php" ?>
<?php startblock('title') ?>
	Eazy Banking
<?php endblock() ?>

<?php startblock('head') ?>
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
  <script>
    $(document).ready(function(){
      showActivity();
    });
    function showActivity() {
      $.ajax({
        url: "activityData.php",
        type: "POST",
        dataType: "JSON",
        success: function(result){
          var debit = 0;
          var credit = 0;
          for (i in result) {
            if(result[i].type == 1) {
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1><span class="glyphicon glyphicon-calendar"></span></h1></div><h3><span class="label label-info">'+result[i].tgl+'</span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-danger">-Rp '+result[i].amount+'</span></h2></div></div>');
              credit += parseInt(result[i].amount);
            }
            else if(result[i].type == 0){
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1><span class="glyphicon glyphicon-calendar"></span></h1></div><h3><span class="label label-info">'+result[i].tgl+'</span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-success">+Rp '+result[i].amount+'</span></h2></div></div>');
              debit += parseInt(result[i].amount);
            }
          }
          var total = debit - credit;
          $("#debit").html("Rp "+debit);
          $("#credit").html("Rp "+credit);
          $("#total").html("Rp "+total);
        }
      });
    }
  </script>
<?php endblock() ?>

<?php startblock('body') ?>
<div class="container">
  <div class="page-header">
      <h1>Activity</h1>
  </div>

  <div id="activity" class="column activity"></div>

  <div class="column summary" style="padding-left: 20px">
    <h3 style="text-align: center;">Total</h3>
    <hr>

    <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <h3 style="color: green; text-align: right;">Debit</h3>
      </div>
      <div class="col-md-7">
        <h3 style="color: green;" id="debit"></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <h3 style="color: red; text-align: right;">Credit</h3>
      </div>
      <div class="col-md-7">
        <h3 style="color: red;" id="credit"></h3>
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <h3 style="color: blue; text-align: right;">Available</h3>
      </div>
      <div class="col-md-7">
        <h3 style="color: blue;" id="total"></h3>
      </div>
    </div>

  </div>
</div>
<br><br>
<?php endblock() ?>