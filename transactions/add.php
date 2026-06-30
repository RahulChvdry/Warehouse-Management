<?php
include("../includes/auth.php");
include("../config/database.php");

if(isset($_POST['save'])) {
    $product = $_POST['product_id'];
    $type = $_POST['transaction_type'];
    $quantity = $_POST['quantity'];
    $reference = mysqli_real_escape_string($conn, trim($_POST['reference_number']));
    $notes = mysqli_real_escape_string($conn, trim($_POST['transaction_notes']));
    $source = (!empty($_POST['source_location_id'])) ? intval($_POST['source_location_id']) : "NULL";
    $destination = (!empty($_POST['destination_location_id'])) ? intval($_POST['destination_location_id']) : "NULL";
    $performed_by = intval($_SESSION['user_id']);

    $sql = "INSERT INTO stock_transaction
            (product_id, transaction_type, quantity, reference_number, transaction_notes, source_location_id, destination_location_id, performed_by, status, transaction_date)
            VALUES
            ('$product','$type','$quantity','$reference','$notes',$source,$destination,$performed_by,'Completed', NOW())";

    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("Error: " . mysqli_error($conn));
    }
    header("Location: index.php");
    exit();
}

include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">New Transaction</div>
    <div class="page-subtitle">Record a stock movement</div>
  </div>
</div>

<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-control-wms" required>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM product");
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Transaction Type</label>
        <select name="transaction_type" class="form-control-wms" required>
          <option value="IN">Stock In (Receiving)</option>
          <option value="OUT">Stock Out (Shipping)</option>
          <option value="TRANSFER">Transfer</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control-wms" min="1" required>
      </div>
      <div class="form-group">
        <label class="form-label">Reference Number</label>
        <input type="text" name="reference_number" class="form-control-wms" placeholder="e.g. PO-2026-001">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Source Location</label>
        <select name="source_location_id" class="form-control-wms">
          <option value="">— None —</option>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM warehouse_location");
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='{$row['location_id']}'>{$row['location_name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Destination Location</label>
        <select name="destination_location_id" class="form-control-wms">
          <option value="">— None —</option>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM warehouse_location");
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value='{$row['location_id']}'>{$row['location_name']}</option>";
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Notes</label>
      <textarea name="transaction_notes" class="form-control-wms" rows="3" placeholder="Optional notes..."></textarea>
    </div>
    <div class="form-actions">
      <button type="submit" name="save" class="btn-primary-wms">
        <i class="bi bi-check-lg"></i> Save Transaction
      </button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>

<?php include("../includes/footer.php"); ?>