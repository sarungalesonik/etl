<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
Functions::constructStatic($db);
$api_master_id = $_POST["api_master_id"];
$api = APIMaster::fetchAPI($api_master_id);

?>
<input type="hidden" name="api_master_id" value="<?php echo $api_master_id; ?>">
<div class="form-group">
    <label>Temp payload</label>
    <input type="text" class="form-control" name="temp_payload" id="temp_payload" value="<?php echo $api["temp_payload"]; ?>">
</div>
<div class="form-group">
<button type="button" class="btn btn-dark" style="width:100%;" onClick="fetchAPISchemaDetails();">Fetch</button>
</div>
<div id="schema_detail_box"></div>
<script>
    
function fetchAPISchemaDetails(api_master_id){
    $.ajax({
    url: 'views/pages/master/apimaster/schema_details.php',
    type: 'POST',
    data: {
        api_master_id: "<?php echo $_POST["api_master_id"]; ?>",
        temp_payload: $("#temp_payload").val()
    },
    success: function (data) {
        $("#schema_detail_box").html(data);
    }
    });
}
</script>