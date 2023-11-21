<?php
session_start();
require_once "../../../../api/autoload/init.php";
require_once "../../../../includes/config.php";
$db = Database::getInstance();

?>

<div class="card mb-4">
    <div class="card-header row">
        <h4 class="col-8">Schema</h4>
        <div class="col-4" style="text-align:right;">
            <button class="btn btn-primary btn-sm" id="uploadschemabtn" data-bs-toggle="modal" data-bs-target="#addschemamodal">Add Schema</button>
        </div>
    </div>
</div>
<div class="col-12" id="schema-dt-box">
    
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addschemamodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Schema</h5>
                <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="schemauploadform">
            <div class="modal-body">
                <div class="form-alertmaster"></div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" required name="schema_name" id="schema_name">
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" required name="schema_code" id="schema_code">
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
$("#schemauploadform").validate({
    submitHandler: function(form) {
        postallformdata(form,"operation/schemamapping/create/schema.php");
        return false;
    }
});
viewalldatatable("operation/schemamapping/datatable.php","schema-dt-box");


</script>


