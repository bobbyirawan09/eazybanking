	<script>
		function changeCard(){
			$.ajax({
				url: "changecard.php",
				type: "POST",
				async: "false",
				data: {
					card: mecard
				},
				success: function(res){
					if(mecard == 1) {
						alert("Success block your card");
						$("#change").html("Activate Card");
						$("#change").removeClass("btn-danger").addClass("btn-success");
						mecard=0;
					}
					else {
						alert("Success activate your card");
						$("#change").html("Block Card");
						$("#change").removeClass("btn-success").addClass("btn-danger");
						mecard=1;
					}
				}
			});
		};
		$(document).ready(function(){
			if(mecard == 1) {
				$("#butt").html('<button type="button" id="change" class="btn btn-danger btn-lg btn-block">Block Card</button>');
			}
			else if(mecard == 0){
				$("#butt").html('<button type="button" id="change" class="btn btn-success btn-lg btn-block">Activate Card</button>');
			}
			$("#change").click(function(){
				changeCard(0);
			});
		});
	</script>

<div class="container">
	<img src="assets/card-visa.png" class="img-rounded" style="display: block; margin: auto;">
	<hr>
	<div id="butt" class="col-md-8 col-md-offset-2">
	</div>
</div>