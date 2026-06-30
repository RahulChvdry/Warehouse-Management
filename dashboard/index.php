<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Dashboard</div>
    <div class="page-subtitle">Welcome back, <?php echo $_SESSION["user_name"]; ?></div>
  </div>
</div>

<div class="stats-grid">

<?php
$stats = [
  ["query" => "SELECT COUNT(*) AS total FROM product", "label" => "Total Products", "icon" => "📦", "class" => "purple"],
  ["query" => "SELECT COUNT(*) AS total FROM product_category", "label" => "Categories", "icon" => "🏷️", "class" => "green"],
  ["query" => "SELECT COUNT(*) AS total FROM warehouse_location", "label" => "Locations", "icon" => "📍", "class" => "yellow"],
  ["query" => "SELECT COUNT(*) AS total FROM stock_transaction", "label" => "Transactions", "icon" => "🔄", "class" => "red"],
];
foreach($stats as $s) {
  $result = mysqli_query($conn, $s['query']);
  $data = mysqli_fetch_assoc($result);
?>
<div class="stat-card <?= $s['class']; ?>">
  <div class="stat-icon"><?= $s['icon']; ?></div>
  <div class="stat-value"><?= $data['total']; ?></div>
  <div class="stat-label"><?= $s['label']; ?></div>
</div>
<?php } ?>

</div>

<?php include("../includes/footer.php"); ?>
