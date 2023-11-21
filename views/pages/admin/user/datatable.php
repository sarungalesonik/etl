<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
User::constructStatic($db);
Functions::constructStatic($db);
$users = User::fetchAllUserWithAuth();

?>
<div class="alertmaster"></div>
<div class="table-responsive">
    <table class="table table-striped" id="amazonusertable">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>Full name</th>
            <th>Email</th> 
            <th>IP</th> 
            <th>LoggedIn On</th> 
            <!--th>Action</th-->
            </tr>
        </thead>
        <tbody>
            <?php if($users){ $count=1; foreach ($users as $user) { ?>
            <tr>
                <td class="text-center"><?php echo $count; $count++; ?></td>
                <td><?php echo $user['full_name']; ?></td>                
                <td><?php echo $user['email']; ?></td>        
                <td><?php echo $user['user_ip']; ?></td> 
                <td><?php echo Functions::date_time_disp_format($user['loggedin_on']); ?></td> 
                                              
                <!--td><button type="button" class="btn btn-dark btn-sm edit_user" data-bs-toggle="modal" data-bs-target="#updateusermodal" style="width:100px;" onClick="fetchUserData('<?php echo $user["user_id"]; ?>');">Edit</button><br>
                <button type="button" class="btn btn-warning btn-sm edit_user" data-bs-toggle="modal" data-bs-target="#resetpassmodal" style="width:120px;margin-top:5px;" onClick="resetPassPopup('<?php echo $user["user_id"]; ?>');">Reset Password</button><br>
                <?php /*if($user['isDisabled']){ ?>
                    <button type="button" class="btn btn-info btn-sm edit_user" style="width:100px;margin-top:5px;" onClick="enablePopup('<?php echo $user["user_id"]; ?>');">Enable</button>
                <?php }else{ ?>
                    <button type="button" class="btn btn-danger btn-sm edit_user" style="width:100px;margin-top:5px;" onClick="disablePopup('<?php echo $user["user_id"]; ?>');">Disable</button>
                <?php }*/ ?>
            </td-->
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>
<input type="hidden" id="remove_user_id">
<div class="modal fade" tabindex="-1" role="dialog" id="resetpassmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="userresetpassform">
            <div class="modal-body">
                <div class="form-alertmaster"></div> 
                <input type="hidden" id="reset_user_id" name="reset_user_id">  
                <div class="form-group">
                    <label for="user_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="New Password" required>
                </div>
                <div class="form-group mt-2">
                    <label for="user_confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="user_confirm_password" name="user_confirm_password" placeholder="Confirm Password" required>
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-danger">Update</button>
            </div>           
            </form>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="updateusermodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upuserfileuploadform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div id="upuserfileuploadformbody">
                    
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
function resetPassPopup(user_id){
    $("#reset_user_id").val(user_id);
}
function disablePopup(user_id){
    $.confirm({
        closeIcon: true,
        title:'Disable user', 
        content:'Do you want to continue?',
        type: 'red',
        typeAnimated: true,
        buttons: {
        yes: {
            text: 'Yes',
            btnClass: 'btn-red',
            action: function(){
                disableStatus(user_id,"1");   
            }
        },
        close: function () {}
    }
    });
}
function enablePopup(user_id){
    $.confirm({
        closeIcon: true,
        title:'Enable user', 
        content:'Do you want to continue?',
        type: 'green',
        typeAnimated: true,
        buttons: {
        yes: {
            text: 'Yes',
            btnClass: 'btn-green',
            action: function(){
                disableStatus(user_id,'0');
            }
        },
        close: function () {}
    }
    });
}
function disableStatus(user_id,status){
    $.ajax({
    url: 'views/pages/admin/user/update/disableStatus.php',
    type: 'POST',
    data: {
        ref_user_id: user_id,
        status: status
    },
    success: function (data) {
        $(".alertmaster").html(data);
    }
    });
}
function fetchUserData(user_id){
    $.ajax({
    url: 'views/pages/admin/user/update.php',
    type: 'POST',
    data: {
        user_id: user_id
    },
    success: function (data) {
        $("#upuserfileuploadformbody").html(data);
    }
    });
}
$("#upuserfileuploadform").validate({
    submitHandler: function(form) {
        postallformdata(form,"admin/user/update/user.php");
        return false;
    }
});
$("#userresetpassform").validate({
    rules : {
        user_password : {
            minlength : 5
        },
        user_confirm_password : {
            minlength : 5,
            equalTo : "#user_password"
        }
    },
    submitHandler: function(form) {
        postallformdata(form,"admin/user/update/password.php");
        return false;
    }
});

$("#amazonusertable").dataTable({
    dom: 'Bfrtip',
    select: true,
    buttons: [
        /*
        {
            text: "Refresh",
            title: "Refresh" ,
			className: "",
            action: function ( e, dt, node, config ) {
				viewalldatatable("admin/user/datatable.php","amazon-user-dt-box");
            }
		}
*/
        ]
});
</script>