<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
$db = Database::getInstance();
User::constructStatic($db);
$user_uid = $_POST["user_uid"];
$user = User::fetchUser($user_uid);
?>
<input type="hidden" id="up_user_uid" name="up_user_uid" value="<?php echo $user_uid; ?>">
<div class="form-group">
    <label class="form-label">Full Name</label>
    <input type="text" class="form-control" required name="up_user_full_name" id="up_user_full_name" value="<?php echo $user["full_name"]; ?>">
</div>
<div class="form-group">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" required name="up_user_email" id="up_user_email" value="<?php echo $user["email"]; ?>">
</div>
<div class="form-group">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" required name="up_user_username" id="up_user_username" value="<?php echo $user["username"]; ?>">
</div>
<div class="form-group">
    <label class="form-label">User Type</label>
    <select class="form-control" required name="up_user_type" id="up_user_type">
        <option value="0"<?php if($user["user_type"]=="0"){ echo " selected"; } ?>>All</option>
        <option value="1"<?php if($user["user_type"]=="1"){ echo " selected"; } ?>>Approver</option>
        <option value="2"<?php if($user["user_type"]=="2"){ echo " selected"; } ?>>Processor</option>            
    </select>
</div>
<div class="form-group">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="up_user_is_super_user" name="up_user_is_super_user" value="1" <?php if($user["is_super_user"]=="1"){ echo " checked"; } ?>>
        <label class="custom-control-label" for="up_user_is_super_user">Is Super User</label>
    </div>
</div>
<div class="form-group">
    <label>Module Access</label>
    <select class="form-control" required multiple name="up_user_module_access[]" id="up_user_module_access" <?php if($user["is_super_user"]=="1"){ echo " disabled"; } ?>>
        <?php 
        $usermodulearr=array();
        if($user['module_access']){
          $usermodulearr=json_decode($user['module_access']);
        }
        foreach(allmodulelist as $module){ ?>
        <option value="<?php echo $module["module_code"]; ?>" <?php if(in_array($module["module_code"],$usermodulearr)){ echo ' selected'; } ?>><?php echo $module["module_name"]; ?></option>
        <?php } ?>
    </select>
</div>
<script>

(function($) {
  'use strict';
  $(function() {
    $('.bootstrap-select').css('padding','0px');

    $('#up_user_is_super_user').change(function() {
        $('#up_user_module_access').val("");
        if(this.checked) {
            $('#up_user_module_access').attr("disabled", true);
        }else{
            $('#up_user_module_access').attr("disabled", false);
        }
        $('.selectpicker').selectpicker("refresh");
    });
  });
})(jQuery);

</script>