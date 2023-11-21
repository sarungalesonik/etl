<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
Functions::constructStatic($db);
$apilist = APIMaster::fetchAllAPI();

?>
<div class="alertmaster"></div>
<div class="table-responsive">
    <table class="table table-striped" id="apimastertable">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>API Type</th>
            <th>API Group</th> 
            <th>API Name</th> 
            <th>API Status</th> 
            <th>Schema</th> 
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($apilist){ $count=1; foreach ($apilist as $api) { ?>
            <tr>
                <td class="text-center"><?php echo $count; $count++; ?></td>
                <td><?php if($api['api_type']==1){ echo "Outh 2"; }elseif($api["api_type"]==2){echo "REST API"; }elseif($api["api_type"]==3){echo "Scrapper"; } ?></td>                
                <td><?php echo $api['api_group_name']; ?></td>
                <td><?php echo $api['api_name']; ?></td>
                <td><?php if($api['api_status']==0){ echo "OFF"; }elseif($api["api_status"]==1){echo "ON"; } ?></td> 
                <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateapischemamodal" style="width:100px;" onClick="fetchAPISchemaData('<?php echo $api["api_master_id"]; ?>');">Schema</button></td>
                                              
                <td><button type="button" class="btn btn-dark btn-sm edit_api" data-bs-toggle="modal" data-bs-target="#updateapimodal" style="width:100px;" onClick="fetchAPIData('<?php echo $api["api_master_id"]; ?>');">Edit</button>
            </td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="updateapimodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Source</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upapimasterform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div id="upapiupdateformbody">
                    
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
<div class="modal fade" tabindex="-1" role="dialog" id="updateapischemamodal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schema</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upapischemaform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div id="upapischemaupdateformbody">
                    
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
function fetchAPIData(api_master_id){
    $.ajax({
    url: 'views/pages/master/apimaster/update.php',
    type: 'POST',
    data: {
        api_master_id: api_master_id
    },
    success: function (data) {
        $("#upapiupdateformbody").html(data);
    }
    });
}

function fetchAPISchemaData(api_master_id){
    $.ajax({
    url: 'views/pages/master/apimaster/schema.php',
    type: 'POST',
    data: {
        api_master_id: api_master_id
    },
    success: function (data) {
        $("#upapischemaupdateformbody").html(data);
    }
    });
}

$("#upapimasterform").validate({
    submitHandler: function(form) {
        postallformdata(form,"master/apimaster/update/api.php");
        return false;
    }
});

$("#upapischemaform").validate({
    submitHandler: function(form) {
        postallformdata(form,"master/apimaster/update/schema.php");
        return false;
    }
});


$("#apimastertable").dataTable({
    dom: 'Bfrtip',
    select: true,
    buttons: [
        /*
        {
            text: "Refresh",
            title: "Refresh" ,
			className: "",
            action: function ( e, dt, node, config ) {
				viewalldatatable("master/apimaster/datatable.php","amazon-api-dt-box");
            }
		}
*/
        ]
});
</script>