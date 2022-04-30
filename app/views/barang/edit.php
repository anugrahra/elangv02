<div class="row">
  <div class="col">
    <h3>Edit Barang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg" method="POST" action="<?= BASEURL; ?>/barang/prosesedit">
      <input type="number" name="id" value="<?= $data['barang']['id']; ?>" required class="notadmin">
      <div class="form-group">
        <label for="kodebarang">Kode Barang</label>
        <input type="text" class="form-control" id="kodebarang" name="kodebarang" value="<?= $data['barang']['kode']; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="namabarang">Nama Barang</label>
        <input type="text" class="form-control" id="namabarang" name="namabarang" value="<?= $data['barang']['nama']; ?>" required>
      </div>
      <div class="form-group">
        <label for="merek">Merek</label>
        <input type="text" class="form-control" id="merek" name="merek" value="<?= $data['barang']['merek']; ?>">
      </div>
      <div class="form-group">
        <label for="tipe">Tipe</label>
        <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $data['barang']['tipe']; ?>">
      </div>
      <div class="form-group">
        <label for="satuan">Satuan</label>
        <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $data['barang']['satuan']; ?>" required>
      </div>
      <div class="form-group">
        <label for="jenisbarang">Jenis Barang</label>
        <select class="form-control" id="jenisbarang" name="jenisbarang" required>
          <option value="<?= $data['barang']['jenis']; ?>"><?= $data['barang']['jenis']; ?></option>
          <option>-----</option>
          <?php foreach ($data['jenisBarang'] as $jenisBarang) : ?>
            <option value="<?= $jenisBarang['jenis']; ?>"><?= $jenisBarang['jenis']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="2" class="form-control"><?= $data['barang']['keterangan']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-warning">Edit</button>
    </form>
  </div>
</div>