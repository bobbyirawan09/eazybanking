<?php include "basemember.php" ?>
<?php startblock('title') ?>
    Transfer
<?php endblock() ?>

<?php startblock('head') ?>
<script>
    function checkNum(ini) {
        var str = ini.value;
        var len = str.length - 1;
        if(isNaN(str)) {
            ini.value = str.substr(0,len);
        }
        if(len >= 7) {
            ini.value = str.substr(0,10);
        }
    }
    function check() {
        var a = $("#bank").val();
        var b = $("#acc").val();
        var c = $("#amount").val();
        if(a == null || b == "" || c == "") {
            alert("Please fill the blank");
        }
        else {
            getData();
        }
    };
    function getData() {
        $.ajax({
            url: "datatransfer.json",
            type: "POST",
            dataType: "JSON",
            success: function(res){
                checkData(res);
            }
        });
    };
    function checkData(hasil) {
        var bank = $("#bank").val();
        var len = bank.length;
        for(i=len ; i < 4 ; i++){
            bank = "0"+bank;
        }
        var cek = 0;
        var uang = 1;
        var account = $("#acc").val();
        var amount = $("#amount").val();
        var me = <?php echo '"'.$_SESSION['account'].'"'; ?>;
        var tujuan;
        if(parseInt(amount) < 10000) {
            alert("Jumlah transfer minimal Rp 10.000");
            return; 
        }
        for(i in hasil) {
            if(hasil[i].account == me && parseInt(hasil[i].amount) <= parseInt(amount)) {
                uang = 0;
            }
            if(hasil[i].account == account && bank == hasil[i].bankcode) {
                cek = 1;
                tujuan = hasil[i];
            }
        }
        if(cek == 0) {
            alert("Account dituju tidak ditemukan !");
        }
        else if(uang == 0) {
            alert("Uang tidak mencukupi");
        }
        else if(cek == 1 && uang == 1) {

            confirmation(tujuan,amount);
        }
    };
    function confirmation(tujuan,amount) {
        var bank = $("#bank option:selected").text();
        $("#isimodal").html("Bank Tujuan : "+bank+"<br>Account Tujuan : "+tujuan.account+"<br>Nama Penerima : "+tujuan.name+"<br>Jumlah Transfer : "+amount);
        $("#confirm").modal('show');
    };
    $(document).ready(function(){
        $("#acc").keyup(function(){
            checkNum(this);
        });
        $("#amount").keyup(function(){
            checkNum(this);
        });
        $("#transfer").click(function(){
            check();
            
        });
    });
</script>
<?php endblock() ?>

<?php startblock('body') ?>
<div class="container">
	<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h2 class="page-header text-left">Transfer</h2>
            <form class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="form-group">
                            <label for="bank">Bank :</label>
                            <select name="bank" id="bank" class="form-control" >
                            	<option selected disabled value="none"> -- Select a Bank -- </option>
                                <option value="5">BCA</option>
                            	<option value="4">BNI</option>
                            	<option value="3">BRI</option>
                                <option value="2">Mandiri</option>
                                <option value="1">Eazy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account-transfer">Account yang dituju :</label>
                            <input type="text" name="account-transfer" id="acc" class="form-control" placeholder="Account yang dituju"/>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah :</label>
                            <div class="input-group">
                            	<span class="input-group-addon" id="sizing-addon3">Rp</span>
  								<input type="text" id="amount" class="form-control" placeholder="Total uang" aria-describedby="sizing-addon3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" data-toggle="modal" class="btn btn-info btn-block" id="transfer">Transfer</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="activity.php"><button type="button" class="btn btn-danger btn-block">Cancel</button></a>
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="confirm" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Transfer Confirmation</h4>
        </div>
        <div class="modal-body" id="isimodal">
          <!-- isi confirm transfer -->
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="conftranf">Confirm Transfer</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
<?php endblock() ?>