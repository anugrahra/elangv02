<div class="row">
  <div class="col">
    <h3>Laporan Penerimaan</h3>

    <div class="row">
      <div class="col">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <td>:</td>
            <td><?= $data['surattanggal']['no_surat_jalan']; ?></td>
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
            <th>Penerima</th>
            <td>:</td>
            <td><?= $data['surattanggal']['user']; ?></td>
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
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['penerimaan'] as $penerimaan) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $penerimaan['kode_barang']; ?></td>
            <td>
              <a href="<?= BASEURL; ?>/laporan/kartustock/<?= $penerimaan['kode_barang']; ?>">
                <?= $penerimaan['nama']; ?>
            </td>
            </a>
            <td><?= $penerimaan['merek']; ?></td>
            <td><?= $penerimaan['jumlah']; ?> <?= $penerimaan['satuan']; ?></td>
            <td><?= $penerimaan['keterangan_penerimaan']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>