<div class="row">
  <div class="col">
    <h3>Daftar Unit</h3>
  </div>
  <div class="col text-right">
    <button class="btn btn-info" id="btnTambahUnit">Tambah Unit</button>
  </div>
</div>

<div class="row" id="rowTambahUnit">
  <div class="col shadow">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/profil/tambahunit">
      <label class="my-1 mr-2" for="namaunit">Nama Unit</label>
      <input type="text" class="form-control mr-sm-2" id="namaunit" name="namaunit">
      <button class="btn btn-primary form-control mr-sm-2">Submit</button>
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
          <th scope="col">Unit</th>
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
        foreach ($data['unit'] as $unit) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $unit['nama']; ?></td>
            <td>
              <a class="badge badge-danger <?= $notadmin; ?>" href="<?= BASEURL; ?>/profil/deleteunit/<?= $unit['id']; ?>" onclick="confirm('Yakin?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>