<div class="row">
  <div class="col">
    <h3>Laporan Pengeluaran</h3>

    <div class="row">
      <div class="col">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <td>:</td>
            <td><?= $data['surattanggal']['no_surat_pengambilan']; ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td><?= date('j F Y', strtotime($data['surattanggal']['tanggal'])); ?></td>
          </tr>
        </table>
      </div>
      <div class="col">
        <table class="table table-hover">
          <tr>
            <th>Pengambil</th>
            <td>:</td>
            <td><?= $data['surattanggal']['penerima']; ?></td>
          </tr>
          <tr>
            <th>Keterangan</th>
            <td>:</td>
            <td><?= $data['surattanggal']['keterangan_pengeluaran']; ?></td>
          </tr>
        </table>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama</th>
          <th scope="col">Merek</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['pengeluaran'] as $pengeluaran) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $pengeluaran['kode_barang']; ?></td>
            <td><?= $pengeluaran['nama']; ?></td>
            <td><?= $pengeluaran['merek']; ?></td>
            <td><?= $pengeluaran['jumlah']; ?> <?= $pengeluaran['satuan']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>