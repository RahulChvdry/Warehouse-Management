<?php
include("../includes/auth.php");
include("../config/database.php");
include("../includes/header.php");
include("../includes/navbar.php");
include("../includes/sidebar.php");
?>

<div class="page-header">
  <div>
    <div class="page-title">Locations</div>
    <div class="page-subtitle">Manage warehouse locations and zones</div>
  </div>
  <a href="add.php" class="btn-primary-wms">+ Add Location</a>
</div>

<div class="table-card">
  <div class="table-card-header">
    <span class="table-card-title">All Locations</span>
  </div>
  <table class="wms-table">
    <thead>
      <tr>
        <th>ID</th><th>Location Code</th><th>Location Name</th><th>Zone</th><th>Type</th><th>Max Capacity</th><th>Status</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM warehouse_location ORDER BY location_id DESC");
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td class="mono">#<?= $row['location_id']; ?></td>
      <td class="mono"><?= $row['location_code']; ?></td>
      <td><?= $row['location_name']; ?></td>
      <td><?= $row['zone'] ?? '—'; ?></td>
      <td><?= $row['location_type'] ?? '—'; ?></td>
      <td><?= $row['max_capacity'] ?? '—'; ?></td>
      <td><?= $row['is_active'] ? '<span class="badge-active">Active</span>' : '<span class="badge-inactive">Inactive</span>'; ?></td>
      <td style="display:flex;gap:6px;">
        <a href="edit.php?id=<?= $row['location_id']; ?>" class="btn-edit"><i class="bi bi-pencil"></i> Edit</a>
        <a href="delete.php?id=<?= $row['location_id']; ?>" class="btn-delete" onclick="return confirm('Delete this location?')"><i class="bi bi-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../includes/footer.php"); ?>
