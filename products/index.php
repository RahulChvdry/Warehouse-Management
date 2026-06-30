<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Products</div>
    <div class="page-subtitle">Manage your product catalog</div>
  </div>
  <a href="add.php" class="btn-primary-wms">+ Add Product</a>
</div>

<div class="table-card">
  <div class="table-card-header">
    <span class="table-card-title">All Products</span>
  </div>
  <table class="wms-table">
    <thead>
      <tr>
        <th>ID</th><th>SKU</th><th>Product Name</th><th>Category</th><th>Price</th><th>Reorder Level</th><th>Status</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT product.*, product_category.category_name FROM product INNER JOIN product_category ON product.category_id = product_category.category_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td class="mono">#<?= $row['product_id']; ?></td>
      <td class="mono"><?= $row['sku_code']; ?></td>
      <td><?= $row['product_name']; ?></td>
      <td><?= $row['category_name']; ?></td>
      <td>₹<?= number_format($row['unit_price'], 2); ?></td>
      <td><?= $row['reorder_level']; ?></td>
      <td><?= $row['is_active'] ? '<span class="badge-active">Active</span>' : '<span class="badge-inactive">Inactive</span>'; ?></td>
      <td style="display:flex;gap:6px;">
        <a href="edit.php?id=<?= $row['product_id']; ?>" class="btn-edit"><i class="bi bi-pencil"></i> Edit</a>
        <a href="delete.php?id=<?= $row['product_id']; ?>" class="btn-delete" onclick="return confirm('Delete this product?')"><i class="bi bi-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../includes/footer.php"); ?>
