<div class="row">
  <div class="col">
    <h3>Penerimaan Barang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg" method="POST" action="<?= BASEURL; ?>/transaksi/prosespenerimaan">
      <div class="form-group">
        <label for="nosuratjalan">No</label>
        <input type="text" class="form-control" id="nosuratjalan" name="nosuratjalan" required>
      </div>
      <div class="form-group">
        <label for="pemasok">Pemasok</label>
        <select class="form-control" id="pemasok" name="pemasok" required>
          <?php foreach ($data['pemasok'] as $pemasok) : ?>
            <option value="<?= $pemasok['nama']; ?>"><?= $pemasok['nama']; ?></option>
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
        <label for="penerima">Penerima</label>
        <input type="text" class="form-control" id="penerima" name="penerima" required>
      </div>
      <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
      </div>
      <div class="form-group">
        <label for="keteranganpenerimaan">Keterangan Penerimaan</label>
        <textarea class="form-control" id="keteranganpenerimaan" name="keteranganpenerimaan" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>