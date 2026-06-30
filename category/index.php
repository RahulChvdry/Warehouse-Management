<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Categories</div>
    <div class="page-subtitle">Manage product categories</div>
  </div>
  <a href="add.php" class="btn-primary-wms">+ Add Category</a>
</div>

<div class="table-card">
  <div class="table-card-header">
    <span class="table-card-title">All Categories</span>
  </div>
  <table class="wms-table">
    <thead>
      <tr>
        <th>ID</th><th>Category Name</th><th>Description</th><th>Status</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM product_category ORDER BY category_id DESC");
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td class="mono">#<?= $row['category_id']; ?></td>
      <td><?= $row['category_name']; ?></td>
      <td><?= $row['category_description'] ?? '—'; ?></td>
      <td><?= $row['is_active'] ? '<span class="badge-active">Active</span>' : '<span class="badge-inactive">Inactive</span>'; ?></td>
      <td style="display:flex;gap:6px;">
        <a href="edit.php?id=<?= $row['category_id']; ?>" class="btn-edit"><i class="bi bi-pencil"></i> Edit</a>
        <a href="delete.php?id=<?= $row['category_id']; ?>" class="btn-delete" onclick="return confirm('Delete this category?')"><i class="bi bi-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../includes/footer.php"); ?>
