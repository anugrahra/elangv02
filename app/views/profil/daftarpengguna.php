<?php
$notadmin = 'notadmin';
$yesadmin = 'yesadmin';

if ($_SESSION['role'] === '1') {
  $notadmin = '';
}

if ($_SESSION['role'] !== '1') {
  $yesadmin = '';
}

?>

<div class="row">
  <div class="col">
    <h3>Daftar Pengguna</h3>
  </div>
  <div class="col text-right <?= $notadmin; ?>">
    <button class="btn btn-info" id="btnTambahPengguna">Tambah Pengguna</button>
  </div>
</div>

<div class="row <?= $yesadmin; ?>">
  <div class="col">
    <p>Untuk menambahkan pengguna, silakan hubungi Administrator</p>
  </div>
</div>

<div class="row" id="rowTambahPengguna">
  <div class="col-6 shadow">
    <form method="POST" action="<?= BASEURL; ?>/auth/signup">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
          <option value="2">User</option>
          <option value="1">Administrator</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="repassword">Re-Password</label>
        <input type="password" class="form-control" id="repassword" name="repassword" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $role = '';
        foreach ($data['user'] as $user) :
          if ($user['level'] === '1') {
            $role = 'Administrator';
          } elseif ($user['level'] === '2') {
            $role = 'User';
          }
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $role; ?></td>
            <td>
              <a class="badge badge-danger <?= $notadmin; ?>" href="<?= BASEURL; ?>/auth/deleteuser/<?= $user['id']; ?>" onclick="confirm('Yakin?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>