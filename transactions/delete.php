<?php
include("../includes/auth.php");
include("../config/database.php");
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM stock_transaction WHERE transaction_id=$id");
header("Location: index.php"); exit();
