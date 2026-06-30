<nav class="wms-navbar">
  <a href="/warehouse/dashboard/index.php" class="brand">
    <div class="brand-icon">📦</div>
    <span>Ware<span>HMS</span></span>
  </a>
  <div class="nav-right">
    <div class="user-badge">
      <div class="user-avatar"><?php echo strtoupper(substr($_SESSION["user_name"], 0, 1)); ?></div>
      <?php echo $_SESSION["user_name"]; ?>
    </div>
    <a href="/warehouse/auth/logout.php" class="btn-logout">
      <i class="bi bi-box-arrow-right"></i> Logout
    </a>
  </div>
</nav>
