<?php
include("../includes/auth.php");
include("../config/database.php");

if(isset($_POST['save'])){
    $name = $_POST['category_name'];
    $description = $_POST['category_description'];
    $parent = $_POST['parent_category_id'];
    if($parent=="") $parent = NULL;
    $sql = "INSERT INTO product_category(category_name,category_description,parent_category_id) VALUES('$name','$description',".($parent===NULL?"NULL":$parent).")";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}

include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Add Category</div><div class="page-subtitle">Create a new product category</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-group">
      <label class="form-label">Category Name</label>
      <input type="text" name="category_name" class="form-control-wms" required>
    </div>
    <div class="form-group">
      <label class="form-label">Description</label>
      <textarea name="category_description" class="form-control-wms" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label class="form-label">Parent Category</label>
      <select name="parent_category_id" class="form-control-wms">
        <option value="">None</option>
        <?php $result=mysqli_query($conn,"SELECT * FROM product_category"); while($row=mysqli_fetch_assoc($result)){ echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>"; } ?>
      </select>
    </div>
    <div class="form-actions">
      <button type="submit" name="save" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Save Category</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
