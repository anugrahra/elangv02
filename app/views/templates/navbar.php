<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = rtrim($actual_link, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

if (isset($url[4])) {
  if ($url[4] == 'beranda') {
    $beranda = 'active';
    $profil = '';
    $barang = '';
    $transaksi = '';
    $laporan = '';
  } else if ($url[4] == 'profil') {
    $beranda = '';
    $profil = 'active';
    $barang = '';
    $transaksi = '';
    $laporan = '';
  } else if ($url[4] == 'barang') {
    $beranda = '';
    $profil = '';
    $barang = 'active';
    $transaksi = '';
    $laporan = '';
  } else if ($url[4] == 'transaksi') {
    $beranda = '';
    $profil = '';
    $barang = '';
    $transaksi = 'active';
    $laporan = '';
  } else if ($url[4] == 'laporan') {
    $beranda = '';
    $profil = '';
    $barang = '';
    $transaksi = '';
    $laporan = 'active';
  }
}
?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link <?= $beranda; ?>" href="<?= BASEURL; ?>/beranda"><i class="fas fa-home"></i> Beranda</a>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $profil; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i> <?= $_SESSION['username']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/profil">Profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= BASEURL; ?>/profil/daftarpengguna">Daftar Pengguna</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/profil/daftarpemasok">Daftar Pemasok</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/profil/daftarunit">Daftar Unit</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $barang; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-tools"></i> Barang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/barang">List Barang</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/barang/tambah">Tambah Barang</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $transaksi; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-people-arrows"></i> Transaksi
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/penerimaan">Penerimaan</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/pengeluaran">Pengeluaran</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $laporan; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-scroll"></i> Laporan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/laporan/penerimaan">Penerimaan</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/laporan/pengeluaran">Pengeluaran</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= BASEURL; ?>/laporan/pemeriksaan">Pemeriksaan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= BASEURL; ?>/laporan/stockopname">Stock Opname</a>
          </div>
        </div>
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/auth/signout"><i class="fas fa-power-off"></i> Logout</a>
      </div>
    </div>
  </div>
</nav>
<!-- akhir navbar -->

<main role="main" class="mb-3 mt-3">
  <div class="container">