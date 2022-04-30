<div class="row">
  <div class="col">
    <h3>Laporan Pemeriksaan</h3>
    <h4><?= $data['bulan'] ?> <?= $data['tahun'] ?></h4>
  </div>
  <div class="col d-flex justify-content-end">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/laporan/pemeriksaan">
      <label class="my-1 mr-2 sr-only" for="bulan">Bulan</label>
      <select class="custom-select my-1 mr-sm-2" id="bulan" name="bulan">
        <option value="00">-- Pilih Bulan --</option>
        <option value="01|Januari">Januari</option>
        <option value="02|Februari">Februari</option>
        <option value="03|Maret">Maret</option>
        <option value="04|April">April</option>
        <option value="05|Mei">Mei</option>
        <option value="06|Juni">Juni</option>
        <option value="07|Juli">Juli</option>
        <option value="08|Agustus">Agustus</option>
        <option value="09|September">September</option>
        <option value="10|Oktober">Oktober</option>
        <option value="11|November">November</option>
        <option value="12|Desember">Desember</option>
      </select>
      <label class="my-1 mr-2 sr-only" for="tahun">Tahun</label>
      <input type="number" class="custom-select my-1 mr-sm-2 tahunSekarang" id="tahun" name="tahun" placeholder="tahun">
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
          <th scope="col">Tanggal</th>
          <th scope="col">Pemeriksa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['pemeriksaan'] as $pemeriksaan) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= date('j F Y', strtotime($pemeriksaan['tanggal'])); ?></td>
            <td><?= $pemeriksaan['pemeriksa']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>