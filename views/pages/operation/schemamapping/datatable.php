<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
SchemaMapping::constructStatic($db);
APIMaster::constructStatic($db);
$schemas = APIMaster::fetchAllAPI();
$schemasconfig = SchemaMapping::fetchAllMapping();
$schemaconfig=array();
if($schemasconfig){
    foreach($schemasconfig as $config){
        $schemaconfig[$config["api_master_id"]][]=$config;
    }
}

?>
<div class="row">
<?php if($schemas){ $count=1; foreach($schemas as $schema) { ?>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><?php echo $schema["api_name"]; ?></h5>
                <div class="card-subtitle text-muted mb-3"><span class="badge bg-label-secondary"><?php echo $schema["api_group_name"]; ?></span></div>
                <p class="card-text" style="line-height: 14px;font-size: 11px;height: 200px;overflow-y: scroll;">
                <?php
                if(isset($schemaconfig[$schema["api_master_id"]])){
                    foreach($schemaconfig[$schema["api_master_id"]] as $config){
                        echo $config["field"].": ".$config["tempValue"]."<br>";
                    }
                }
                ?>
                </p>
                <button type="button" class="btn btn-dark btn-sm edit_schema_word" style="width:100%;" data-bs-toggle="modal" data-bs-target="#updateschemamodal" onClick="fetchSchemaData('<?php echo $schema["api_master_id"]; ?>');">Edit</button>
            </div>
        </div>
    </div>
<?php } } ?>
</div>

<input type="hidden" id="remove_schema_uid">

<div class="modal fade" tabindex="-1" role="dialog" id="updateschemamodal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Schema</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upschemafileuploadform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>   
                <div id="upschemafileuploadformbody">
                    
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
$("#upschemafileuploadform").validate({
    submitHandler: function(form) {
        postallformdata(form,"operation/schemamapping/update/schema.php");
        return false;
    }
});
    function fetchSchemaData(api_master_id){
        $.ajax({
        url: 'views/pages/operation/schemamapping/update.php',
        type: 'POST',
        data: {
            api_master_id: api_master_id
        },
        success: function (data) {
            $("#upschemafileuploadformbody").html(data);
        }
        });
    }

$("#schematable").dataTable({
    dom: 'Bfrtip',
    select: true,
    buttons: [
        /*
        {
            text: "Refresh",
            title: "Refresh" ,
			className: "",
            action: function ( e, dt, node, config ) {
				viewalldatatable("operation/schemamapping/datatable.php","schema-dt-box");
            }
		}
        */

        ]
});

/*
$(".remove_schema_word").click(function(){
    $.confirm({
        closeIcon: true,
        title:'Really?', 
        content:'Do you want to continue?',
        type: 'red',
        typeAnimated: true,
        buttons: {
        yes: {
            text: 'Yes',
            btnClass: 'btn-red',
            action: function(){
                var schema_uid = $("#remove_schema_uid").val();
                $.ajax({
                url: 'views/pages/operation/schemamapping/delete/schema.php',
                type: 'POST',
                data: {
                    schema_uid: schema_uid
                },
                success: function (data) {
                    alert(data);
                    $("#remove_schema_uid").val("");
                    viewalldatatable("operation/schemamapping/datatable.php","schema-dt-box");
                }
                });
            }
        },
        close: function () {
        }
    }
    });
});
*/
/*
$(".remove_schema_word").fireModal({
  title: 'Really?',
  body: 'Do you want to continue?',
  buttons: [
    {
      text: 'Yes',
      class: 'btn btn-danger btn-shadow',
      handler: function(modal) {
//        alert('Hello, you clicked me!');
        var schema_uid = $("#remove_schema_uid").val();
        $.ajax({
                url: 'views/pages/operation/schemamapping/delete/word.php',
                type: 'POST',
                data: {
                    schema_uid: schema_uid
                },
                success: function (data) {
                    alert(data);
                    $("#remove_schema_uid").val("");
                    viewalldatatable("operation/schemamapping/datatable.php","schema-dt-box");
                }
                });
      }
    }
  ]
});
*/
</script>