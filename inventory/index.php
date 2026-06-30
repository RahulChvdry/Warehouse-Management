<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Inventory Stock</div>
    <div class="page-subtitle">Track stock levels across locations</div>
  </div>
  <a href="add.php" class="btn-primary-wms">+ Add Stock</a>
</div>

<div class="table-card">
  <div class="table-card-header">
    <span class="table-card-title">All Stock</span>
  </div>
  <table class="wms-table">
    <thead>
      <tr>
        <th>ID</th><th>Product</th><th>Location</th><th>Quantity</th><th>Reserved</th><th>Last Updated</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT inventory_stock.*, product.product_name, warehouse_location.location_name
            FROM inventory_stock
            INNER JOIN product ON inventory_stock.product_id = product.product_id
            INNER JOIN warehouse_location ON inventory_stock.location_id = warehouse_location.location_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td class="mono">#<?= $row['stock_id']; ?></td>
      <td><?= $row['product_name']; ?></td>
      <td><?= $row['location_name']; ?></td>
      <td><?= $row['current_quantity']; ?></td>
      <td><?= $row['reserved_quantity']; ?></td>
      <td class="mono"><?= $row['last_updated']; ?></td>
      <td style="display:flex;gap:6px;">
        <a href="edit.php?id=<?= $row['stock_id']; ?>" class="btn-edit"><i class="bi bi-pencil"></i> Edit</a>
        <a href="delete.php?id=<?= $row['stock_id']; ?>" class="btn-delete" onclick="return confirm('Delete this stock entry?')"><i class="bi bi-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../includes/footer.php"); ?>
