<div class="row">
  <div class="col">
    <h3>Tambah Barang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg" method="POST" action="<?= BASEURL; ?>/barang/prosestambah">
      <div class="form-group">
        <label for="namabarang">Nama</label>
        <input type="text" class="form-control" id="namabarang" name="namabarang" required>
      </div>
      <div class="form-group">
        <label for="merekbarang">Merek</label>
        <input type="text" class="form-control" id="merekbarang" name="merekbarang">
      </div>
      <div class="form-group">
        <label for="namabarang">Tipe</label>
        <input type="text" class="form-control" id="tipebarang" name="tipebarang">
      </div>
      <div class="form-group">
        <label for="stokawal">Stok Awal</label>
        <input type="number" class="form-control" id="stokawal" name="stokawal" required>
      </div>
      <div class="form-group">
        <label for="satuan">Satuan</label>
        <input type="text" class="form-control" id="satuan" name="satuan" required>
      </div>
      <div class="form-group">
        <label for="jenisbarang">Jenis Barang</label>
        <select class="form-control" id="jenisbarang" name="jenisbarang" required>
          <?php foreach ($data['jenisBarang'] as $jenisBarang) : ?>
            <option value="<?= $jenisBarang['jenis']; ?>"><?= $jenisBarang['jenis']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>