<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
if(isset($_POST['update'])){
    $product = $_POST['product_id'];
    $location = $_POST['location_id'];
    $quantity = $_POST['current_quantity'];
    $reserved = $_POST['reserved_quantity'];
    $sql = "UPDATE inventory_stock SET product_id='$product', location_id='$location', current_quantity='$quantity', reserved_quantity='$reserved' WHERE stock_id=$id";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
$result = mysqli_query($conn,"SELECT * FROM inventory_stock WHERE stock_id=$id");
$stock = mysqli_fetch_assoc($result);
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Edit Stock</div><div class="page-subtitle">Update inventory stock entry</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM product"); while($row=mysqli_fetch_assoc($result)){ $sel = $row['product_id']==$stock['product_id'] ? 'selected' : ''; echo "<option value='{$row['product_id']}' $sel>{$row['product_name']}</option>"; } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Warehouse Location</label>
        <select name="location_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM warehouse_location"); while($row=mysqli_fetch_assoc($result)){ $sel = $row['location_id']==$stock['location_id'] ? 'selected' : ''; echo "<option value='{$row['location_id']}' $sel>{$row['location_name']}</option>"; } ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Current Quantity</label>
        <input type="number" name="current_quantity" class="form-control-wms" value="<?= $stock['current_quantity']; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-label">Reserved Quantity</label>
        <input type="number" name="reserved_quantity" class="form-control-wms" value="<?= $stock['reserved_quantity']; ?>">
      </div>
    </div>
    <div class="form-actions">
      <button type="submit" name="update" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Update Stock</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
