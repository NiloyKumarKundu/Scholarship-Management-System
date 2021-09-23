<?php include "header.php"; ?>


<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6" style="margin-left: 20em; margin-top: 8em;">
                <div class="card-header" style="background-color: #c8cccb;">
                    <h4>Upgrade To Premium</h4>
                </div>
                <!-- Form -->
                <form action="./payment_info.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Bkash No:</span>
                            </div>
                            <input type="text" class="form-control" placeholder="01*******" disabled aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-invoice-dollar"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="500 Taka Only!" disabled aria-describedby="basic-addon1">
                            <input type="hidden" class="form-control" name="money" value="500" readonly aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-credit-card"></i></span>
                            </div>
                            <input type="text" required name="payment_no" class="form-control" placeholder="Enter TrxID" aria-describedby="basic-addon1">
                        </div>
                        <div style="margin-left: 410px;">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success text-light" id="">
                        </div>
                    </div>
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>








<?php include "footer.php"; ?>