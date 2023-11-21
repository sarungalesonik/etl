<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
$apilogs = APIMaster::fetchAllAPILogs();


?>
<div class="table-responsive">
    <table class="table table-striped" id="apilogtable">
        <thead>
            <tr>
            <th class="text-center">
                #
            </th>
            <th>Group</th>
            <th>Name</th>
            <th>URL</th>
            <th>Method</th>      
            <th>Created On</th>
            </tr>
        </thead>
        <tbody>
            <?php if($apilogs){ $count=1; foreach ($apilogs as $apilog) { 
              
                ?>
            <tr>
                <td class="text-center"><?php echo $count; $count++; ?></td>
                <td><?php echo $apilog['api_group_name']; ?></td>
                <td><?php echo $apilog['api_name']; ?></td>
                <td><?php echo $apilog['url']; ?></td>
                <td><?php echo $apilog['method']; ?></td>
                <td><?php echo Functions::date_time_disp_format($apilog['created_on']); ?></td>
                
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>

<script>

$("#apilogtable").dataTable({
    dom: 'Bfrtip',
    select: true,
    buttons: [
        /*
        {
            text: "Refresh",
            title: "Refresh" ,
			className: "",
            action: function ( e, dt, node, config ) {
				viewalldatatable("admin/apilog/datatable.php","amazon-apilog-dt-box");
            }
		}
*/
        ]
});
</script>