<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
if(isset($_POST['update'])){
    $code = trim($_POST['location_code']);
    $name = trim($_POST['location_name']);
    $type = trim($_POST['location_type']);
    $capacity = $_POST['max_capacity'];
    $zone = trim($_POST['zone']);
    $sql = "UPDATE warehouse_location SET location_code='$code', location_name='$name', location_type='$type', max_capacity='$capacity', zone='$zone' WHERE location_id=$id";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
$result = mysqli_query($conn,"SELECT * FROM warehouse_location WHERE location_id=$id");
$location = mysqli_fetch_assoc($result);
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Edit Location</div><div class="page-subtitle">Update location details</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Location Code</label>
        <input type="text" name="location_code" class="form-control-wms" value="<?= $location['location_code']; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-label">Location Name</label>
        <input type="text" name="location_name" class="form-control-wms" value="<?= $location['location_name']; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Location Type</label>
        <input type="text" name="location_type" class="form-control-wms" value="<?= $location['location_type']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label">Zone</label>
        <input type="text" name="zone" class="form-control-wms" value="<?= $location['zone']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Maximum Capacity</label>
      <input type="number" name="max_capacity" class="form-control-wms" value="<?= $location['max_capacity']; ?>">
    </div>
    <div class="form-actions">
      <button type="submit" name="update" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Update Location</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
