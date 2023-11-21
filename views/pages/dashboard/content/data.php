<?php
session_start();
include '../../../../api/autoload/init.php';
include '../../../../includes/config.php';
include '../../../../includes/op_functions.php';

date_default_timezone_set('Asia/Kolkata');
$user_uid=$_SESSION["user_uid"];

$type=$_POST["type"];
if($type=="orderreport"){

    $datadate = date_db_format($_POST["datadate"]);

    if($_SESSION["is_super_user"]=="1"){
        $user_uid="%";
    }

    $orderreport = Dashboard::orderReport($user_uid,$datadate);
    ?>
    <li class="d-flex mb-4">
        <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
            <div class="me-2">
            <h6 class="mb-0">Pending</h6>
            </div>
            <div class="user-progress">
            <i class='bx bx-up-arrow-alt text-success me-2'></i> <strong><?php echo $orderreport["pending"]; ?></strong>
            </div>
        </div>
    </li>
    <li class="d-flex mb-4">
        <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
            <div class="me-2">
            <h6 class="mb-0">On Hold</h6>
            </div>
            <div class="user-progress">
            <i class='bx bx-up-arrow-alt text-success me-2'></i> <strong><?php echo $orderreport["onhold"]; ?> </strong>
            </div>
        </div>
    </li>
    <li class="d-flex mb-4">
        <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
            <div class="me-2">
            <h6 class="mb-0">Approved</h6>
            <!--small class="text-muted">21 Products checkout</small-->
            </div>
            <div class="user-progress">
            <i class='bx bx-up-arrow-alt text-success me-2'></i> <strong><?php echo $orderreport["approved"]; ?></strong>
            </div>
        </div>
    </li> 
    <?php

}
