<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
?>

<div class="card-header row">
    <h4 class="col-8">Users</h4>
    <div class="col-4" style="text-align:right;">
        <!--button class="btn btn-primary btn-sm btn-sm" data-bs-toggle="modal" data-bs-target="#addusermodal" id="uploaduserbtn">Add User</button-->
    </div>
</div>
<div class="card-body">
    <div class="col-12" id="amazon-user-dt-box">
            
    </div>
</div>



<script>


    viewalldatatable("admin/user/datatable.php","amazon-user-dt-box");


</script>