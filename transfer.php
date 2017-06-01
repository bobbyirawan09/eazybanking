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
            url: "transferdata.php",
            type: "POST",
            dataType: "JSON",
            data: {
                check: 1
            },
            success: function(res){
                checkData(res);
            }
        });
    };
    function checkData(hasil) {
        var bank = $("#bank").val();
        var cek = 0;
        var uang = 1;
        var account = $("#acc").val();
        var amount = $("#amount").val();
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
        var bankcode = $("#bank").val();
        var text = $("#info").val();
        $("#isimodal").html("Bank Tujuan : "+bank+"<br>Account Tujuan : "+tujuan.account+"<br>Nama Penerima : "+tujuan.name+"<br>Jumlah Transfer : "+amount+"<br>Notes : "+text+"<br>");
        if(bankcode != '0001'){
            $("#isimodal").append("Biaya Transfer : Rp 6.500,00<br><br><label>Confirm PIN : </label><input type='password' class='form-control' id='pin' placeholder='PIN'><br>");
        }
        else {
            $("#isimodal").append("<br><label>Confirm PIN : </label><input type='password' class='form-control' id='pin' placeholder='PIN'>");
        }
        $("#confirm").modal('show');
    };
    function transfer() {
        $.ajax({
            url: "transferdata.php",
            type: "POST",
            async: "false",
            data: {
                transfer: 1,
                bankcode: $("#bank").val(),
                other: $("#acc").val(),
                amount: $("#amount").val(),
                info: $("#info").val(),
                pin: $("#pin").val()
            },
            success: function(res){
                alert(res);
            }
        });
    };
    function showHistory(){
        $.ajax({
            url: "transferdata.php",
            type: "POST",
            dataType: "JSON",
            data: {
                history: 1
            },
            success: function(result){
                $.each(result, function(i,field){
                    $("#history").append('<option value="'+field['acc']+'" bank="'+field['bankcode']+'">'+field['acc']+' '+field['name']+'</option>');
                });
                $("#history").append('<option value="new">-- Enter a New Account --</option>');
            }
        })
    }
    $(document).ready(function(){
        $("#showbank").hide();
        $("#showacc").hide();
        showHistory();
        $("#showhistory").change(function(){
            if($("#history").val() == "new") {
                $("#bank").val("none");
                $("#acc").val("");
                $("#showbank").show();
                $("#showacc").show();
            }
            else {
                var b = $("#history option:selected").attr("bank");
                var a = $("#history").val();
                $("#bank").val(b);
                $("#acc").val(a);
                var tmpb = $("#bank").val();
                var tmpa = $("#acc").val();
                $("#showbank").hide();
                $("#showacc").hide();
            }
        })
        $("#acc").keyup(function(){
            checkNum(this);
        });
        $("#amount").keyup(function(){
            checkNum(this);
        });
        $("#transfer").click(function(){
            check();
        });
        $("#conftranf").click(function(){
            transfer();
        });
    });
</script>

<div class="container">
	<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h2 class="page-header text-left">Transfer</h2>
            <form class="row">
                <div class="col-sm-12">
                    <div class="well">
                    <form>
                        <div class="form-group" id="showhistory">
                            <label for="bank">Account :</label>
                            <select id="history" class="form-control" >
                                <option selected disabled value="none"> -- Select an Account -- </option>
                            </select>
                        </div>
                        <div class="form-group" id="showbank">
                            <label>Bank :</label>
                            <select id="bank" class="form-control" >
                            	<option selected disabled value="none"> -- Select a Bank -- </option>
                                <option value="0005">BCA</option>
                            	<option value="0004">BNI</option>
                            	<option value="0003">BRI</option>
                                <option value="0002">Mandiri</option>
                                <option value="0001">Eazy</option>
                            </select>
                        </div>
                        <div class="form-group" id="showacc">
                            <label>Account yang dituju :</label>
                            <input type="text" id="acc" class="form-control" placeholder="Account yang dituju"/>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah :</label>
                            <div class="input-group">
                            	<span class="input-group-addon" id="sizing-addon3">Rp</span>
  								<input type="text" id="amount" class="form-control" placeholder="Total uang" aria-describedby="sizing-addon3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Notes :</label>
                            <textarea class="form-control" rows="5" id="info"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" data-toggle="modal" class="btn btn-primary btn-block" id="transfer">Transfer</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="activity.php"><button type="button" class="btn btn-danger btn-block">Cancel</button></a>
                            </div> 
                        </div>
                        </form>
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
            <form>
            <div class="modal-body" id="isimodal">
              <!-- isi confirm transfer -->
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success" data-dismiss="modal" id="conftranf">Confirm Transfer</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
          </div>
          
        </div>
    </div>

</div>