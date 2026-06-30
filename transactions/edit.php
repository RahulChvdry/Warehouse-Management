<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
if(isset($_POST['update'])){
    $product = $_POST['product_id'];
    $type = $_POST['transaction_type'];
    $quantity = $_POST['quantity'];
    $reference = trim($_POST['reference_number']);
    $notes = trim($_POST['transaction_notes']);
    $sql = "UPDATE stock_transaction SET product_id='$product', transaction_type='$type', quantity='$quantity', reference_number='$reference', transaction_notes='$notes' WHERE transaction_id=$id";
    mysqli_query($conn,$sql);
    header("Location: index.php"); exit();
}
$result = mysqli_query($conn,"SELECT * FROM stock_transaction WHERE transaction_id=$id");
$tx = mysqli_fetch_assoc($result);
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>
<div class="page-header">
  <div><div class="page-title">Edit Transaction</div><div class="page-subtitle">Update transaction details</div></div>
</div>
<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-control-wms" required>
          <?php $result=mysqli_query($conn,"SELECT * FROM product"); while($row=mysqli_fetch_assoc($result)){ $sel=$row['product_id']==$tx['product_id']?'selected':''; echo "<option value='{$row['product_id']}' $sel>{$row['product_name']}</option>"; } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Transaction Type</label>
        <select name="transaction_type" class="form-control-wms" required>
          <option value="IN" <?= $tx['transaction_type']=='IN'?'selected':'' ?>>Stock In</option>
          <option value="OUT" <?= $tx['transaction_type']=='OUT'?'selected':'' ?>>Stock Out</option>
          <option value="TRANSFER" <?= $tx['transaction_type']=='TRANSFER'?'selected':'' ?>>Transfer</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control-wms" value="<?= $tx['quantity']; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-label">Reference Number</label>
        <input type="text" name="reference_number" class="form-control-wms" value="<?= $tx['reference_number']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Notes</label>
      <textarea name="transaction_notes" class="form-control-wms" rows="3"><?= $tx['transaction_notes']; ?></textarea>
    </div>
    <div class="form-actions">
      <button type="submit" name="update" class="btn-primary-wms"><i class="bi bi-check-lg"></i> Update Transaction</button>
      <a href="index.php" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<?php include("../includes/footer.php"); ?>
