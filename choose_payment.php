<?php
    include 'head.php'; 
?>
    <div class="" style="display:none">
        <?php
        include 'esewa_configration.php'; 
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 form ">
                <h4>Please Choose Payment Method !!!</h4>
                <div class="row">
                    <div class="col-6">
                        <a href="cash-check-out.php" id="cash_on">Cash</a>
                    </div>
                    <div class="col-6">
                        <form action='<?php echo $epay_url?>' method="POST" class="p-0">
                            <input value=<?php echo $totalAmount?>  name="tAmt" type="hidden">
                            <input value=<?php echo $totalAmount?> name="amt" type="hidden">
                            <input value="0" name="txAmt" type="hidden">
                            <input value="0" name="psc" type="hidden">
                            <input value="0" name="pdc" type="hidden">
                            <input value=<?php echo $merchant_code?>  name="scd" type="hidden">
                            <input value="<?php echo $pid?>" name="pid" type="hidden">
                            <input value=<?php echo $successurl?> type="hidden" name="su">
                            <input value=<?php echo $failedurl?> type="hidden" name="fu">
                            <input type="submit" id="esewa" class="m-0" name="submit"  value="e-Sewa">
                        </form>
                    </div>
                </div>
                 <br>
                <a class="login-a mt-4"  href="index.php">Cancel Order!!</a>
                
            </div>
        </div>
    </div>
    
    <?php include 'footer.php';    ?>
