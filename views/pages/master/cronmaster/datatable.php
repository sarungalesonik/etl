<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
Cron::constructStatic($db);
$getallcron = Cron::fetchAllCronTab();


?>
<div class="table-responsive">
    <table class="table table-striped" id="crontable">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>Name</th>
            <th>Time</th>            
            <th>File</th>           
            <th>Status</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($getallcron){ $count=1; foreach ($getallcron as $cron) { ?>
            <tr>
                <td class="text-center"><?php echo $count; $count++; ?></td>
                <td><?php echo $cron['cron_name']; ?></td>                
                <td><?php echo $cron['cron_time']; ?></td>                
                <td><?php echo $cron['file']; ?></td>                    
                <td><?php if($cron['isActive']){echo "Active"; }else{ echo "Deactive"; } ?></td>           
                <td><button type="button" class="btn btn-dark btn-sm edit_user" data-bs-toggle="modal" data-bs-target="#updatecronmodal" style="width:100px;" onClick="fetchCronData('<?php echo $cron["cron_tab_id"]; ?>');">Edit</button></td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="updatecronmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Cron Format</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upcronform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div id="upcronformbody">
                    
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

    function fetchCronData(cron_tab_id){
        $.ajax({
        url: 'views/pages/master/cronmaster/updateformat.php',
        type: 'POST',
        data: {
            cron_tab_id: cron_tab_id
        },
        success: function (data) {
            $("#upcronformbody").html(data);
        }
        });
    }
$("#upcronform").validate({
    submitHandler: function(form) {
        postallformdata(form,"master/cronmaster/update/cron.php");
        return false;
    }
});

$("#crontable").dataTable({
    dom: 'Bfrtip',
    select: true,
    buttons: [
        /*
        {
            text: "Refresh",
            title: "Refresh" ,
			className: "",
            action: function ( e, dt, node, config ) {
				viewalldatatable("admin/user/datatable.php","-user-dt-box");
            }
		}
*/
        ]
});
</script>
