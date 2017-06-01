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
  <script type="text/javascript">
    $(document).ready(function(){
    	showActivity();
      $("#search").click(function(){
        var test = $("#tgl").val();
        search(test);
      });
    });
    function search(tgl){
      $.ajax({
        url: "activityData.php",
        type: "POST",
        dataType: "JSON",
        data: {
          search: 1,
          mon: tgl
        },
        success: function(result){
          var cek = 1;
          $("#activity").html("");
          for (i in result) {
            if(result[i].type == 1) {
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1 style="margin-top: 0px;"><span class="glyphicon glyphicon-calendar"></span></h1></div><h3 style="margin-top: 0px;"><span class="label label-info">'+result[i].tgl+'</span><br><small>&nbsp&nbsp&nbsp<span class="label label-info"><span class="glyphicon glyphicon-time"></span>&nbsp'+result[i].hms+'</small></span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-danger">-Rp '+result[i].amount+'</span></h2></div></div>');
              credit += parseInt(result[i].amount);
            }
            else if(result[i].type == 0){
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1 style="margin-top: 0px;"><span class="glyphicon glyphicon-calendar"></span></h1></div><h3 style="margin-top: 0px;"><span class="label label-info">'+result[i].tgl+'</span><br><small>&nbsp&nbsp&nbsp<span class="label label-info"><span class="glyphicon glyphicon-time"></span>&nbsp'+result[i].hms+'</small></span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-success">+Rp '+result[i].amount+'</span></h2></div></div>');
              debit += parseInt(result[i].amount);
            }
            cek = 0;
          }
          if(cek == 1) {
            $("#activity").html('No data recorded yet');
          }
        }
      });
    }
    function showActivity() {
      $.ajax({
        url: "activityData.php",
        type: "POST",
        dataType: "JSON",
        data: {
        	load: 1
        },
        success: function(result){
          var debit = 0;
          var credit = 0;
          var cek = 1;
          for (i in result) {
            if(result[i].type == 1) {
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1 style="margin-top: 0px;"><span class="glyphicon glyphicon-calendar"></span></h1></div><h3 style="margin-top: 0px;"><span class="label label-info">'+result[i].tgl+'</span><br><small>&nbsp&nbsp&nbsp<span class="label label-info"><span class="glyphicon glyphicon-time"></span>&nbsp'+result[i].hms+'</small></span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-danger">-Rp '+result[i].amount+'</span></h2></div></div>');
              credit += parseInt(result[i].amount);
            }
            else if(result[i].type == 0){
              $("#activity").append('<div class="row well"><div class="col-md-3"><div class="col-md-offset-4"><h1 style="margin-top: 0px;"><span class="glyphicon glyphicon-calendar"></span></h1></div><h3 style="margin-top: 0px;"><span class="label label-info">'+result[i].tgl+'</span><br><small>&nbsp&nbsp&nbsp<span class="label label-info"><span class="glyphicon glyphicon-time"></span>&nbsp'+result[i].hms+'</small></span></h3></div><div class="col-md-6"><h3 style="padding-top: 15px;">'+result[i].otheruser+'<br><small>'+result[i].info+'</small></h3></div><div class="col-md-3"><h2 style="padding-top: 15px;"><span class="label label-success">+Rp '+result[i].amount+'</span></h2></div></div>');
              debit += parseInt(result[i].amount);
            }
            cek = 0;
          }
          if(cek == 1) {
            $("#activity").html('No data recorded yet');
          }
          var total = debit - credit;
          $("#debit").html("Rp "+debit);
          $("#credit").html("Rp "+credit);
          $("#total").html("Rp "+total);
        }
      });
    }
  </script>
<div class="container">
<div class="row">
  	<div class="col-md-4">
    	<h1>Activity</h1>
    </div>
	<div class="col-md-4"><!--
		<div class="form-group" style="padding-top: 15px;">
			<div class="input-append date" id="tgl" data-date="05-2001" data-date-format="mm-yyyy">
				<input class="span2" size="16" type="text" value="05-2001">
				<span class="add-on"><i class="icon-th"></i></span>
			</div>
			<button class="btn btn-default" id="search" type="submit">
				<i id="iconpass" class="glyphicon glyphicon-search"></i>
			</button>
		</div> -->

    <div class="form-group" style="padding-top: 15px;">
      <input type="month" id="tgl">
      <button class="btn btn-default" id="search" type="submit">
        <i id="iconpass" class="glyphicon glyphicon-search"></i>
      </button>
    </div>
	</div>
	</div>
	<hr style="margin-top: 0px; margin-bottom: 30px;">
  <div id="activity" class="column activity"></div>

  <div class="column summary" style="padding-left: 20px">
    <h3 style="text-align: center;">Total</h3>
    <hr>

    <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <h3 style="color: green; text-align: right;">Earned</h3>
      </div>
      <div class="col-md-7">
        <h3 style="color: green;" id="debit"></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-1">
        <h3 style="color: red; text-align: right;">Spent</h3>
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