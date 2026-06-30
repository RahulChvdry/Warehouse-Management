<?php
include("../includes/auth.php");
include("../config/database.php");
if(isset($_POST['save'])){
    $product = $_POST['product_id'];
    $location = $_POST['location_id'];
    $quantity = $_POST['current_quantity'];
    $reserved = $_POST['reserved_quantity'];
    $sql = "INSERT INTO inventory_stock (product_id,location_id,current_quantity,reserved_quantity) VALUES ('$product','$location','$quantity','$reserved')";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Add Stock</div><div class="page-subtitle">Add inventory to a warehouse location</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM product"); while($row=mysqli_fetch_assoc($result)){ echo "<option value='{$row['product_id']}'>{$row['product_name']}</option>"; } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Warehouse Location</label>
        <select name="location_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM warehouse_location"); while($row=mysqli_fetch_assoc($result)){ echo "<option value='{$row['location_id']}'>{$row['location_name']}</option>"; } ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Current Quantity</label>
        <input type="number" name="current_quantity" class="form-control-wms" required>
      </div>
      <div class="form-group">
        <label class="form-label">Reserved Quantity</label>
        <input type="number" name="reserved_quantity" class="form-control-wms" value="0">
      </div>
    </div>
    <div class="form-actions">
      <button type="submit" name="save" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Save Stock</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
