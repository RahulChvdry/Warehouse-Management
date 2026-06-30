<aside class="wms-sidebar">
  <div class="sidebar-section-label">Main</div>
  <a href="/warehouse/dashboard/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'dashboard') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-speedometer2"></i></span> Dashboard
  </a>

  <div class="sidebar-section-label">Inventory</div>
  <a href="/warehouse/products/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'products') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-box-seam"></i></span> Products
  </a>
  <a href="/warehouse/category/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'category') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-tag"></i></span> Categories
  </a>
  <a href="/warehouse/inventory/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'inventory') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-archive"></i></span> Stock
  </a>

  <div class="sidebar-section-label">Operations</div>
  <a href="/warehouse/transactions/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'transactions') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-arrow-left-right"></i></span> Transactions
  </a>
  <a href="/warehouse/locations/index.php" class="sidebar-link <?php echo (strpos($_SERVER['PHP_SELF'],'locations') !== false) ? 'active' : ''; ?>">
    <span class="icon"><i class="bi bi-geo-alt"></i></span> Locations
  </a>
</aside>
<div class="wms-main">
