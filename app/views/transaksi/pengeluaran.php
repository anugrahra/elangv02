<div class="row">
  <div class="col">
    <h3>Pengeluaran Barang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg" method="POST" action="<?= BASEURL; ?>/transaksi/prosespengeluaran">
      <div class="form-group">
        <label for="nosuratpengambilan">No Surat Pengambilan</label>
        <input type="text" class="form-control" id="nosuratpengambilan" name="nosuratpengambilan">
      </div>
      <div class="form-group">
        <label for="pengambilbarang">Pengambil Barang</label>
        <input type="text" class="form-control" id="pengambilbarang" name="pengambilbarang" required>
      </div>
      <div class="form-group">
        <label for="bagian">Bagian</label>
        <select class="form-control" id="bagian" name="bagian" required>
          <?php foreach ($data['bagian'] as $bagian) : ?>
            <option value="<?= $bagian['nama']; ?>"><?= $bagian['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="namabarang">Nama Barang</label>
        <select class="form-control" id="namabarang" name="namabarang" required>
          <?php foreach ($data['namaBarang'] as $namaBarang) : ?>
            <option value="<?= $namaBarang['kode']; ?>|<?= $namaBarang['stok']; ?>"><?= $namaBarang['nama']; ?> - <?= $namaBarang['merek']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control tglSekarang" id="tanggal" name="tanggal" required>
      </div>
      <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
      </div>
      <div class="form-group">
        <label for="keteranganpengeluaran">Keterangan Pengeluaran</label>
        <textarea class="form-control" id="keteranganpengeluaran" name="keteranganpengeluaran" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>