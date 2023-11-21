<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
Functions::constructStatic($db);
$grouplist = APIMaster::fetchApiGroup();
$column_list = Functions::fetchTableColumn("materialized_view");
?>

<div class="card-header row">
    <h4 class="col-8">Source</h4>
    <div class="col-4" style="text-align:right;">
        <button class="btn btn-primary btn-sm btn-sm" data-bs-toggle="modal" data-bs-target="#addapimastermodal" id="uploaduserbtn">Add Source</button>
    </div>
</div>
<div class="card-body">
    <div class="col-12" id="apimaster-dt-box">
            
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="addapimastermodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Source</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="apimasteraddform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   

                                        <div class="form-group">
                                            <label>API Type</label>
                                            <select class="form-control" id="api_type" name="api_type" required>
                                            <option value="" selected>- Select -</option>
                                            <option value="1">Outh 2</option>
                                            <option value="2">REST API</option>
                                            <!--option value="3">Scrapper</option-->                                                
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>API Group</label>
                                            <select class="form-control" id="api_group" name="api_group" required>
                                            <option value="" selected>- Select -</option>
                                            <?php foreach($grouplist as $group){ ?>
                                                <option value="<?php echo $group["api_group_id"]; ?>"><?php echo $group["api_group_name"]; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>API Name</label>
                                            <input type="text" class="form-control" name="api_name" id="api_name">
                                        </div>
                                        <div class="form-group">
                                            <label>API code</label>
                                            <input type="text" class="form-control" name="api_code" id="api_code">
                                        </div>
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" class="form-control" name="api_url" id="api_url">
                                        </div>
                                        <div class="form-group">
                                            <label>Path</label>
                                            <input type="text" class="form-control" name="api_path" id="api_path">
                                        </div>
                                        <div class="form-group">
                                            <label>Credentials Type</label>
                                            <select class="form-control" id="api_credentials_type" name="api_credentials_type" onchange="checkCredentialsType()">
                                            <option value="1" class="api_type api_type_1" selected>None</option>
                                            <option value="2" class="api_type api_type_2">Key</option>
                                            <option value="3" class="api_type api_type_3">Bearer</option>                                                
                                            </select>
                                        </div>

                                        <div class="form-group credentials_type credentials_type_2">
                                            <label>Key Type</label>
                                            <select class="form-control" id="api_key_type" name="api_key_type">
                                            <option value="0" selected>URL</option>
                                            <option value="1">Header</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group credentials_type credentials_type_3">
                                            <label>Bearer Token</label>
                                            <input type="text" class="form-control" name="api_bearer_token" id="api_bearer_token">
                                        </div>
                                        <div class="form-group credentials_type credentials_type_2">
                                            <label>API param</label>
                                            <input type="text" class="form-control" name="api_key_param" id="api_key_param">
                                        </div>
                                        <div class="form-group credentials_type credentials_type_2">
                                            <label>API key</label>
                                            <input type="text" class="form-control" name="api_key" id="api_key">
                                        </div>

                                        <div class="form-group">
                                            <label>API DB Key</label>
                                            <input type="text" class="form-control" name="api_db_key" id="api_db_key">
                                        </div>
                                        <div class="form-group">
                                            <label>API DB Value</label>
                                            <select class="form-control" id="api_db_val" name="api_db_val" required>
                                            <option value="" selected>- Select -</option>
                                            <?php foreach($column_list as $column){ ?>
                                                <option value="<?php echo $column["COLUMN_NAME"]; ?>"><?php echo $column["COLUMN_NAME"]; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Api Method</label>
                                            <select class="form-control" id="api_method" name="api_method">
                                            <option value="GET" selected>GET</option>
                                            <option value="POST">POST</option>                                                                          </select>
                                        </div>
                                    

                <!--div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" required name="user_full_name" id="user_full_name">
                </div-->
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


viewalldatatable("master/apimaster/datatable.php","apimaster-dt-box");
$("#apimasteraddform").validate({
    submitHandler: function(form) {
        postallformdata(form,"master/apimaster/create/api.php");
        return false;
    }
});
function  checkCredentialsType() {
          var credentials_type = $("#api_credentials_type").val();
          $(".credentials_type").css("display","none");
          $(".credentials_type_"+credentials_type).css("display","block");
        }
        checkCredentialsType();
</script>