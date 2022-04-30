<div class="row">
  <div class="col">
    <h3>Daftar Pemasok</h3>
  </div>
  <div class="col text-right">
    <button class="btn btn-info" id="btnTambahPemasok">Tambah Pemasok</button>
  </div>
</div>

<div class="row" id="rowTambahPemasok">
  <div class="col-6 shadow">
    <form method="POST" action="<?= BASEURL; ?>/profil/tambahpemasok">
      <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" class="form-control" id="kode" name="kode" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama </label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
      </div>
      <div class="form-group">
        <label for="notelp">Telp/HP</label>
        <input type="text" class="form-control" id="notelp" name="notelp" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
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
          <th scope="col">Kode</th>
          <th scope="col">Pemasok</th>
          <th scope="col">Alamat</th>
          <th scope="col">Telp</th>
          <th scope="col">Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $notadmin = 'notadmin';

        if ($_SESSION['role'] === '1') {
          $notadmin = '';
        }

        $no = 1;
        $role = '';
        foreach ($data['pemasok'] as $pemasok) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $pemasok['kode']; ?></td>
            <td><?= $pemasok['nama']; ?></td>
            <td><?= $pemasok['alamat']; ?></td>
            <td><?= $pemasok['no_kontak']; ?></td>
            <td><?= $pemasok['email']; ?></td>
            <td>
              <a class="badge badge-danger <?= $notadmin; ?>" href="<?= BASEURL; ?>/profil/deletepemasok/<?= $pemasok['id']; ?>" onclick="confirm('Yakin?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>