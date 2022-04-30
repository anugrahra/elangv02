<div class="row">
  <div class="col">
    <h3>Profil Pengguna</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<?php
$role = '';
if ($_SESSION['role'] === '1') {
  $role = 'Administrator';
} elseif ($_SESSION['role'] === '2') {
  $role = 'User';
}
?>

<div class="row">
  <div class="col">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $_SESSION['username']; ?></td>
          <td><?= $role; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>