<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
?>

<div class="card-header row">
    <h4 class="col-8">Cron Master</h4>
    <div class="col-4" style="text-align:right;">
        <button class="btn btn-info btn-sm btn-sm" style="margin-right:5px;" onclick="fetchData();">Fetch</button>
        <button class="btn btn-info btn-sm btn-sm" style="margin-right:5px;" onclick="setcron();">Set Cron</button>
        <button class="btn btn-primary btn-sm btn-sm" data-bs-toggle="modal" data-bs-target="#addcronmodal">Add Cron</button>
        <div id="setcrontabalert"></div>
    </div>
</div>
<div class="card-body">
    <div class="col-12" id="-cron-dt-box">
            
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addcronmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cron</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="cronformatuploadform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control valid" name="cron_name" id="cron_name">
                </div>
                <div class="form-group">
                    <label class="form-label">Time</label>
                    <input type="text" class="form-control valid" name="cron_time" id="cron_time" >
                </div>
                <div class="form-group">
                    <label class="form-label">Path</label>
                    <input type="text" class="form-control valid" name="cron_path" id="cron_path" value="/var/www/html/workfolio/autoscript/">
                </div>
                <div class="form-group">
                    <label class="form-label">File</label>
                    <input type="text" class="form-control valid" name="cron_file" id="cron_file" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<script>
$("#cronformatuploadform").validate({
    submitHandler: function(form) {
        postallformdata(form,"master/cronmaster/create/cron.php");
        return false;
    }
});
function setcron(){
    viewalldatatable("master/cronmaster/update/setcron.php","setcrontabalert");
}
function fetchData(){
    viewalldatatable("master/cronmaster/update/fetch.php","setcrontabalert");
}

    viewalldatatable("master/cronmaster/datatable.php","-cron-dt-box");
</script>