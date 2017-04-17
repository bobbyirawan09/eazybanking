<?php include "basemember.php" ?>
<?php startblock('title') ?>
    Transfer
<?php endblock() ?>

<?php startblock('head') ?>
<?php endblock() ?>

<?php startblock('body') ?>
<div class="container">
	<div class="row">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-10">
		<h2 class="page-header text-left">Transfer</h2>
            <form class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="form-group">
                            <label for="bank">Bank :</label>
                            <select name="bank" class="form-control" >
                            	<option selected value="none"> -- Select a Bank -- </option>
                                <option value="4">BCA</option>
                            	<option value="3">BNI</option>
                            	<option value="2">BRI</option>
                                <option value="1">Mandiri</option>
                                <option value="0">Eazy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account-transfer">Account yang dituju :</label>
                            <input type="text" name="account-transfer" class="form-control" placeholder="Account yang dituju"/>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah :</label>
                            <div class="input-group">
                            	<span class="input-group-addon" id="sizing-addon3">Rp</span>
  								<input type="text" class="form-control" placeholder="Total uang" aria-describedby="sizing-addon3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info btn-block">Transfer</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="activity.php"><button type="submit" class="btn btn-primary btn-block">Cancel</button></a>
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endblock() ?>