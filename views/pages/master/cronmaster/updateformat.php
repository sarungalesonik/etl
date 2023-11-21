<?php

session_start();

require_once "../../../../api/autoload/init.php";

$db = Database::getInstance();
Cron::constructStatic($db);

$cron_tab_id=$_POST['cron_tab_id'];

// data fetched using api
$cronmasterdetails = Cron::fetchCronTab($cron_tab_id);
?>
	<div class="row">
        <div class="col-md-12">
            <input type="hidden" name="up_cron_tab_id" id="up_cron_tab_id" value="<?php echo $cron_tab_id; ?>">
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control valid" name="up_cron_name" id="up_cron_name" value="<?php echo $cronmasterdetails["cron_name"]; ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Time</label>
                <input type="text" class="form-control valid" name="up_cron_time" id="up_cron_time" value="<?php echo $cronmasterdetails["cron_time"]; ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Path</label>
                <input type="text" class="form-control valid" name="up_cron_path" id="up_cron_path" value="<?php echo $cronmasterdetails["path"]; ?>"value="/var/www/html/ekrayah/autoscript/">
            </div>
            <div class="form-group">
                <label class="form-label">File</label>
                <input type="text" class="form-control valid" name="up_cron_file" id="up_cron_file" value="<?php echo $cronmasterdetails["file"]; ?>">
            </div>
            
            <div class="form-group mt-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="up_is_active" name="up_is_active" value="1" <?php if($cronmasterdetails["isActive"]=="1"){ echo " checked"; } ?>>
                    <label class="custom-control-label" for="up_is_active">Is Active</label>
                </div>
            </div>
        
        </div>
    </div>

<script>

</script>