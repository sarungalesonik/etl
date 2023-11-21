<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
Functions::constructStatic($db);
$api_master_id = $_POST["api_master_id"];
$api = APIMaster::fetchAPI($api_master_id);
$grouplist = APIMaster::fetchApiGroup();

$column_list = Functions::fetchTableColumn("materialized_view");

?>
<input type="hidden" id="up_api_master_id" name="up_api_master_id" value="<?php echo $api_master_id; ?>">
<div class="form-group">
    <label>API Type</label>
    <select class="form-control" id="up_api_type" name="up_api_type" required>
    <option value="1"<?php if($api["api_type"]=="1"){ echo " selected"; } ?>>Outh 2</option>
    <option value="2"<?php if($api["api_type"]=="2"){ echo " selected"; } ?>>REST API</option>
    <!--option value="3"<?php if($api["api_type"]=="3"){ echo " selected"; } ?>>Scrapper</option-->                                                
    </select>
</div>

<div class="form-group">
    <label>API Group</label>
    <select class="form-control" id="up_api_group" name="up_api_group" required>
    <?php foreach($grouplist as $group){ ?>
        <option value="<?php echo $group["api_group_id"]; ?>" <?php if($group["api_group_id"]==$api["api_group_id"]){ echo ' selected'; } ?>><?php echo $group["api_group_name"]; ?></option>
    <?php } ?>
    </select>
</div>
<div class="form-group">
    <label>API Name</label>
    <input type="text" class="form-control" name="up_api_name" id="up_api_name" value="<?php echo $api["api_name"]; ?>">
</div>
<div class="form-group">
    <label>API code</label>
    <input type="text" class="form-control" name="up_api_code" id="up_api_code" value="<?php echo $api["api_code"]; ?>">
</div>
<div class="form-group">
    <label>URL</label>
    <input type="text" class="form-control" name="up_api_url" id="up_api_url" value="<?php echo $api["api_url"]; ?>">
</div>
<div class="form-group">
    <label>Path</label>
    <input type="text" class="form-control" name="up_api_path" id="up_api_path" value="<?php echo $api["api_path"]; ?>">
</div>
<div class="form-group">
    <label>Credentials Type</label>
    <select class="form-control" id="up_api_credentials_type" name="up_api_credentials_type" onchange="upcheckCredentialsType()">
    <option value="1" class="up_api_type up_api_type_1" <?php if($api["credentials_type"]=="1"){ echo " selected"; } ?>>None</option>
    <option value="2" class="up_api_type up_api_type_2" <?php if($api["credentials_type"]=="2"){ echo " selected"; } ?>>Key</option>
    <option value="3" class="up_api_type up_api_type_3" <?php if($api["credentials_type"]=="3"){ echo " selected"; } ?>>Bearer</option>                                                
    </select>
</div>

<div class="form-group up_credentials_type up_credentials_type_2">
    <label>Key Type</label>
    <select class="form-control" id="up_api_key_type" name="up_api_key_type">
    <option value="0" <?php if($api["api_key_type"]=="0"){ echo " selected"; } ?>>URL</option>
    <option value="1" <?php if($api["api_key_type"]=="1"){ echo " selected"; } ?>>Header</option>
    </select>
</div>
<div class="form-group up_credentials_type up_credentials_type_3">
    <label>Bearer Token</label>
    <input type="text" class="form-control" name="up_api_bearer_token" id="up_api_bearer_token" value="<?php echo $api["api_bearer_token"]; ?>">
</div>
<div class="form-group up_credentials_type up_credentials_type_2">
    <label>API param</label>
    <input type="text" class="form-control" name="up_api_key_param" id="up_api_key_param" value="<?php echo $api["key_param"]; ?>">
</div>
<div class="form-group up_credentials_type up_credentials_type_2">
    <label>API key</label>
    <input type="text" class="form-control" name="up_api_key" id="up_api_key" value="<?php echo $api["api_key"]; ?>">
</div>

<div class="form-group">
    <label>API DB Key</label>
    <input type="text" class="form-control" name="up_api_db_key" id="up_api_db_key" value="<?php echo $api["api_db_key"]; ?>">
</div>
<div class="form-group">
    <label>API DB Value</label>
    <select class="form-control" id="up_api_db_val" name="up_api_db_val">
        <option value="" selected>- Select -</option>
    <?php foreach($column_list as $column){ ?>
        <option value="<?php echo $column["COLUMN_NAME"]; ?>" <?php if($column["COLUMN_NAME"]==$api["api_db_val"]){ echo ' selected'; } ?>><?php echo $column["COLUMN_NAME"]; ?></option>
    <?php } ?>
    </select>
</div>

<div class="form-group">
    <label>API Method</label>
    <select class="form-control" id="up_api_method" name="up_api_method">
    <option value="GET" <?php if($api["api_method"]=="GET"){ echo " selected"; } ?>>GET</option>
    <option value="POST" <?php if($api["api_method"]=="POST"){ echo " selected"; } ?>>POST</option>                                                                          </select>
</div>

<div class="form-group">
    <label>API Status</label>
    <select class="form-control" id="up_api_status" name="up_api_status">
    <option value="0" <?php if($api["api_status"]=="0"){ echo " selected"; } ?>>OFF</option>
    <option value="1" <?php if($api["api_status"]=="1"){ echo " selected"; } ?>>ON</option>                                                                          </select>
</div>

<script>
function  upcheckCredentialsType() {
          var credentials_type = $("#up_api_credentials_type").val();
          $(".up_credentials_type").css("display","none");
          $(".up_credentials_type_"+credentials_type).css("display","block");
        }
        upcheckCredentialsType();
</script>