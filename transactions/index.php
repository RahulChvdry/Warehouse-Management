<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Transactions</div>
    <div class="page-subtitle">Stock movement history</div>
  </div>
  <a href="add.php" class="btn-primary-wms">+ New Transaction</a>
</div>

<div class="table-card">
  <div class="table-card-header">
    <span class="table-card-title">All Transactions</span>
  </div>
  <table class="wms-table">
    <thead>
      <tr>
        <th>ID</th><th>Product</th><th>Type</th><th>Quantity</th><th>Reference</th><th>Date</th><th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT stock_transaction.*, product.product_name
            FROM stock_transaction
            INNER JOIN product ON stock_transaction.product_id = product.product_id
            ORDER BY transaction_date DESC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $typeBadge = $row['transaction_type'] === 'IN'
        ? '<span class="badge-in">IN</span>'
        : '<span class="badge-out">OUT</span>';
    ?>
    <tr>
      <td class="mono">#<?= $row['transaction_id']; ?></td>
      <td><?= $row['product_name']; ?></td>
      <td><?= $typeBadge; ?></td>
      <td><?= $row['quantity']; ?></td>
      <td class="mono"><?= $row['reference_number']; ?></td>
      <td class="mono"><?= $row['transaction_date']; ?></td>
      <td><span class="badge-active"><?= $row['status']; ?></span></td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../includes/footer.php"); ?>
