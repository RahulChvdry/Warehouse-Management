<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
if(isset($_POST['update'])){
    $name = $_POST['category_name'];
    $description = $_POST['category_description'];
    $sql = "UPDATE product_category SET category_name='$name', category_description='$description' WHERE category_id=$id";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
$result = mysqli_query($conn,"SELECT * FROM product_category WHERE category_id=$id");
$category = mysqli_fetch_assoc($result);
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Edit Category</div><div class="page-subtitle">Update category details</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-group">
      <label class="form-label">Category Name</label>
      <input type="text" name="category_name" class="form-control-wms" value="<?= $category['category_name']; ?>" required>
    </div>
    <div class="form-group">
      <label class="form-label">Description</label>
      <textarea name="category_description" class="form-control-wms" rows="3"><?= $category['category_description']; ?></textarea>
    </div>
    <div class="form-actions">
      <button type="submit" name="update" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Update Category</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
