<?php
include("../includes/auth.php");
include("../config/database.php");
if(isset($_POST['save'])){
    $sku = trim($_POST['sku_code']);
    $name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $unit = trim($_POST['unit_of_measure']);
    $price = $_POST['unit_price'];
    $reorder = $_POST['reorder_level'];
    $category = $_POST['category_id'];
    $sql = "INSERT INTO product (sku_code,product_name,description,unit_of_measure,reorder_level,unit_price,category_id) VALUES ('$sku','$name','$description','$unit','$reorder','$price','$category')";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Add Product</div><div class="page-subtitle">Register a new product</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">SKU Code</label>
        <input type="text" name="sku_code" class="form-control-wms" required>
      </div>
      <div class="form-group">
        <label class="form-label">Product Name</label>
        <input type="text" name="product_name" class="form-control-wms" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM product_category"); while($row=mysqli_fetch_assoc($result)){ echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>"; } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Unit of Measure</label>
        <input type="text" name="unit_of_measure" class="form-control-wms" placeholder="Pieces">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Price (₹)</label>
        <input type="number" step="0.01" name="unit_price" class="form-control-wms">
      </div>
      <div class="form-group">
        <label class="form-label">Reorder Level</label>
        <input type="number" name="reorder_level" class="form-control-wms" value="10">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control-wms" rows="3"></textarea>
    </div>
    <div class="form-actions">
      <button type="submit" name="save" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Save Product</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
