<?php
session_start();
include("../config/database.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users WHERE email='$email' AND password_hash='$password' AND is_active=1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["user_name"] = $user["full_name"];
        header("Location: ../dashboard/index.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WareHMS — Login</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="/warehouse/assets/css/style.css">
</head>
<body>
<div class="login-page">
  <div class="login-card">
    <div class="login-logo">
      <div class="logo-icon">📦</div>
      <h2>WareHMS</h2>
      <p>Warehouse Management System</p>
    </div>
    <?php if($error != ""): ?>
      <div class="alert-error"><i class="bi bi-exclamation-circle"></i> <?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control-wms" placeholder="admin@warehouse.com" required>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control-wms" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn-primary-wms" style="width:100%; justify-content:center; margin-top:8px;">
        <i class="bi bi-box-arrow-in-right"></i> Sign In
      </button>
    </form>
  </div>
</div>
</body>
</html>
