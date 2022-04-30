<h3>Selamat Datang, <?= $_SESSION['username']; ?> :&#41;</h3>
<div class="beranda row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center">
      <a href="<?= BASEURL; ?>/barang" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Barang Terdata</h4>
        <h1 class="text-info font-weight-bold"><?= number_format($data['barangterdata']['total']); ?></h1>
      </a>
      <a href="<?= BASEURL; ?>/barang/stoknol" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Barang Habis</h4>
        <h1 class="text-danger font-weight-bold"><?= number_format($data['baranghabis']['total']); ?></h1>
      </a>
    </div>
  </div>
</div>