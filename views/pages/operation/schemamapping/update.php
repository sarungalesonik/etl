<?php
session_start();
require_once "../../../../api/autoload/init.php";
$db = Database::getInstance();
SchemaMapping::constructStatic($db);
Functions::constructStatic($db);

$api_master_id = $_POST["api_master_id"];
$schemas = SchemaMapping::fetchSchemaByAPI($api_master_id);
$column_list = Functions::fetchTableColumn("materialized_view");
?>
<input type="hidden" id="up_api_master_id" name="up_api_master_id" value="<?php echo $api_master_id; ?>">

<?php if($schemas){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Is Selected</th>
                <th>API Fields</th>
                <th>DB Columns</th>
            </tr>
        </thead>
    <?php foreach($schemas as $schema){ ?>
        <tr>
            <td><input type="checkbox" name="schema_mapping_id_checked[]" value="<?php echo $schema["schema_mapping_id"]; ?>" <?php if($schema["isActive"]==1){ echo " checked"; } ?>><input type="hidden" name="schema_mapping_id[]" value="<?php echo $schema["schema_mapping_id"]; ?>"></td>
            <td><?php echo $schema["field"]; ?></td>
            <td><select class="form-control" name="dbValue[]">
                <option value="">- Select Coloum -</option>
                <?php foreach($column_list as $column){ ?>
        <option value="<?php echo $column["COLUMN_NAME"]; ?>" <?php if($column["COLUMN_NAME"]==$schema["dbValue"]){ echo ' selected'; } ?>><?php echo $column["COLUMN_NAME"]; ?></option>
    <?php } ?>
            </select></td>
        </tr>
    <?php } ?>
    </table>
<?php } ?>
