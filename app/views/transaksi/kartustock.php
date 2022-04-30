<div class="row">
  <div class="col">
    <h3>Detail Barang</h3>
  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table table-hover">
      <tr>
        <th>Nama</th>
        <td>:</td>
        <td><?= $data['barang']['nama']; ?></td>
      </tr>
      <tr>
        <th>Jenis</th>
        <td>:</td>
        <td><?= $data['barang']['jenis']; ?></td>
      </tr>
      <tr>
        <th>Satuan</th>
        <td>:</td>
        <td><?= $data['barang']['satuan']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col">
    <table class="table table-hover">
      <tr>
        <th>Kode</th>
        <td>:</td>
        <td><?= $data['barang']['kode']; ?></td>
      </tr>
      <tr>
        <th>Merek</th>
        <td>:</td>
        <td><?= $data['barang']['merek']; ?></td>
      </tr>
      <tr>
        <th>Stok</th>
        <td>:</td>
        <td><?= $data['barang']['stok']; ?></td>
      </tr>
    </table>
  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Masuk</t>
          <th scope="col">Keluar</th>
          <th scope="col">Sisa</th>
          <th scope="col">Pengguna</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['stock'] as $stock) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $stock['tanggal']; ?></td>
            <td><?= $stock['keterangan']; ?></td>
            <td><?= $stock['masuk']; ?></td>
            <td><?= $stock['keluar']; ?></td>
            <td><?= $stock['sisa']; ?></td>
            <td><?= $stock['pengguna']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>