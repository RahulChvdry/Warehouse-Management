<?php
include("../includes/auth.php");
include("../config/database.php");
if(isset($_POST['save'])){
    $code = trim($_POST['location_code']);
    $name = trim($_POST['location_name']);
    $type = trim($_POST['location_type']);
    $capacity = $_POST['max_capacity'];
    $zone = trim($_POST['zone']);
    $sql = "INSERT INTO warehouse_location (location_code,location_name,location_type,max_capacity,zone) VALUES ('$code','$name','$type','$capacity','$zone')";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Add Location</div><div class="page-subtitle">Register a new warehouse location</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Location Code</label>
        <input type="text" name="location_code" class="form-control-wms" placeholder="e.g. WH-A1" required>
      </div>
      <div class="form-group">
        <label class="form-label">Location Name</label>
        <input type="text" name="location_name" class="form-control-wms" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Location Type</label>
        <input type="text" name="location_type" class="form-control-wms" placeholder="Shelf / Rack / Warehouse">
      </div>
      <div class="form-group">
        <label class="form-label">Zone</label>
        <input type="text" name="zone" class="form-control-wms" placeholder="e.g. Zone A">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Maximum Capacity</label>
      <input type="number" name="max_capacity" class="form-control-wms">
    </div>
    <div class="form-actions">
      <button type="submit" name="save" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Save Location</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
