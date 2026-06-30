<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
if(isset($_POST['update'])){
    $sku = trim($_POST['sku_code']);
    $name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $unit = trim($_POST['unit_of_measure']);
    $price = $_POST['unit_price'];
    $reorder = $_POST['reorder_level'];
    $category = $_POST['category_id'];
    $sql = "UPDATE product SET sku_code='$sku', product_name='$name', description='$description', unit_of_measure='$unit', reorder_level='$reorder', unit_price='$price', category_id='$category' WHERE product_id=$id";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
$result = mysqli_query($conn,"SELECT * FROM product WHERE product_id=$id");
$product = mysqli_fetch_assoc($result);
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Edit Product</div><div class="page-subtitle">Update product details</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">SKU Code</label>
        <input type="text" name="sku_code" class="form-control-wms" value="<?= $product['sku_code']; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-label">Product Name</label>
        <input type="text" name="product_name" class="form-control-wms" value="<?= $product['product_name']; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control-wms">
          <?php $cat=mysqli_query($conn,"SELECT * FROM product_category"); while($row=mysqli_fetch_assoc($cat)){ $sel=$row['category_id']==$product['category_id']?'selected':''; echo "<option value='{$row['category_id']}' $sel>{$row['category_name']}</option>"; } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Unit of Measure</label>
        <input type="text" name="unit_of_measure" class="form-control-wms" value="<?= $product['unit_of_measure']; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Price (₹)</label>
        <input type="number" step="0.01" name="unit_price" class="form-control-wms" value="<?= $product['unit_price']; ?>">
      </div>
      <div class="form-group">
        <label class="form-label">Reorder Level</label>
        <input type="number" name="reorder_level" class="form-control-wms" value="<?= $product['reorder_level']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control-wms" rows="3"><?= $product['description']; ?></textarea>
    </div>
    <div class="form-actions">
      <button type="submit" name="update" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Update Product</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
