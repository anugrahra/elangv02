<?php
$notadmin = 'notadmin';
if ($_SESSION['role'] === '1') {
  $notadmin = '';
}
?>

<div class="row">
  <div class="col">
    <h3>DAFTAR ASET DAN BARANG PRODUKSI</h3>
  </div>
  <div class="col text-right">
    <button class="btn btn-info" id="btnCariBarang">Cari</button>
    <button class="btn btn-info" id="btnFilterBarang">Filter</button>
  </div>
</div>
<div class="row">
  <div class="col">
    <p><b>Pemeriksaan terakhir: <?= date('j F Y', strtotime($data['pemeriksaan']['tanggal'])); ?></b> oleh <b><?= $data['pemeriksaan']['pemeriksa']; ?></b></p>
  </div>
</div>

<div class="row" id="rowCariBarang">
  <div class="col shadow">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/barang">
      <label class="sr-only" for="keyword">Keyword</label>
      <input type="text" class="form-control mr-sm-2" id="keyword" placeholder="kode / nama barang" name="keyword">
      <button class="btn btn-primary form-control mr-sm-2">Cari</button>
    </form>
  </div>
</div>

<div class="row" id="rowFilterBarang">
  <div class="col shadow">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/barang/index">
      <label class="my-1 mr-2" for="jenisbarang">Jenis Barang</label>
      <select class="custom-select my-1 mr-sm-2" id="jenisbarang" name="jenisbarang">
        <option value="SEMUA">SEMUA</option>
        <?php foreach ($data['jenisBarang'] as $jenisBarang) : ?>
          <option value="<?= $jenisBarang['jenis']; ?>"><?= $jenisBarang['jenis']; ?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-primary form-control mr-sm-2">Lihat</button>
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
          <th scope="col">Nama</th>
          <th scope="col">Merek</th>
          <th scope="col">Tipe</th>
          <th scope="col">Stok</th>
          <th scope="col">Jenis</th>
          <th scope="col">Keterangan</th>
          <th class="<?= $notadmin; ?>"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $merah = '';
        $putihh = '';
        foreach ($data['barang'] as $barang) :
          if ($barang['stok'] == 0) {
            $merah = 'bg-danger';
            $putih = 'text-light';
          } else {
            $merah = '';
            $putih = '';
          }
        ?>
          <tr class="<?= $merah; ?> <?= $putih; ?>">
            <td><?= $no++; ?></td>
            <td><?= $barang['kode']; ?></td>
            <td>
              <a href="<?= BASEURL; ?>/laporan/kartustock/<?= $barang['kode']; ?>">
                <?= $barang['nama']; ?>
              </a>
            </td>
            <td><?= $barang['merek']; ?></td>
            <td><?= $barang['tipe']; ?></td>
            <td><?= $barang['stok'] . ' ' . $barang['satuan']; ?></td>
            <td><?= $barang['jenis']; ?></td>
            <td><?= $barang['keterangan']; ?></td>
            <td class="<?= $notadmin; ?>">
              <a class="badge badge-warning" href="<?= BASEURL; ?>/barang/edit/<?= $barang['id']; ?>" onclick="confirm('Yakin?')">edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>