<?php

class Barang extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['title'] = 'BARANG | ' . $this->title;

    if ($_SESSION['username'] == 'pemeriksaan') {
      $data['barang'] = $this->model('Barang_model')->showBarangTidakNol();
    } else {
      $data['barang'] = $this->model('Barang_model')->showBarang();
    }

    $data['pemeriksaan'] = $this->model('Laporan_model')->showPemeriksaanTerakhir();

    if (isset($_POST['keyword'])) {
      if ($this->model('Barang_model')->searchBarang($_POST) > 0) {
        $data['barang'] = $this->model('Barang_model')->getSearchBarang($_POST);
      } else {
        Flasher::setFlash('danger', 'Barang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/barang');
        exit;
      }
    }

    if (isset($_POST['jenisbarang'])) {
      if ($_POST['jenisbarang'] == 'SEMUA') {
        Flasher::setFlash('success', 'Menampilkan', 'semua', 'barang');
        header('Location: ' . BASEURL . '/barang');
        exit;
      } else if ($this->model('Barang_model')->showBarangByJenis($_POST) > 0) {
        $data['barang'] = $this->model('Barang_model')->getBarangByJenis($_POST);
      } else {
        Flasher::setFlash('danger', 'Barang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/barang');
        exit;
      }
    }

    $data['jenisBarang'] = $this->model('Barang_model')->showJenisBarang();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('barang/index', $data);
    $this->view('templates/footer');
  }

  public function stoknol()
  {
    $data['title'] = 'BARANG | ' . $this->title;
    $data['barang'] = $this->model('Barang_model')->showBarangNol();
    $data['pemeriksaan'] = $this->model('Laporan_model')->showPemeriksaanTerakhir();

    if (isset($_POST['keyword'])) {
      if ($this->model('Barang_model')->searchBarang($_POST) > 0) {
        $data['barang'] = $this->model('Barang_model')->getSearchBarang($_POST);
      } else {
        Flasher::setFlash('danger', 'Barang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/barang');
        exit;
      }
    }

    if (isset($_POST['jenisbarang'])) {
      if ($_POST['jenisbarang'] == 'SEMUA') {
        Flasher::setFlash('success', 'Menampilkan', 'semua', 'barang');
        header('Location: ' . BASEURL . '/barang');
        exit;
      } else if ($this->model('Barang_model')->showBarangByJenis($_POST) > 0) {
        $data['barang'] = $this->model('Barang_model')->getBarangByJenis($_POST);
      } else {
        Flasher::setFlash('danger', 'Barang', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/barang');
        exit;
      }
    }

    $data['jenisBarang'] = $this->model('Barang_model')->showJenisBarang();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('barang/stoknol', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'TAMBAH BARANG | ' . $this->title;
    $data['jenisBarang'] = $this->model('Barang_model')->showJenisBarang();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('barang/tambah', $data);
    $this->view('templates/footer');
  }

  public function edit($id)
  {
    $data['title'] = 'EDIT BARANG | ' . $this->title;
    $data['barang'] = $this->model('Barang_model')->showBarangById($id);
    $data['jenisBarang'] = $this->model('Barang_model')->showJenisBarang();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('barang/edit', $data);
    $this->view('templates/footer');
  }

  public function prosesTambah()
  {
    if ($this->model('Barang_model')->tambahBarang($_POST) > 0) {
      Flasher::setFlash('success', 'Barang', 'berhasil', 'ditambahkan');
      header('Location: ' . BASEURL . '/barang');
      exit;
    } else {
      Flasher::setFlash('danger', 'Barang', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/barang/tambah');
      exit;
    }
  }

  public function prosesEdit()
  {
    if ($this->model('Barang_model')->getBarangByCode($_POST) > 0) {
      Flasher::setFlash('danger', 'Kode Barang', 'tidak boleh', 'sama');
      header('Location: ' . BASEURL . '/barang/edit/' . $_POST['id']);
      exit;
    } else {
      if ($this->model('Barang_model')->editBarang($_POST) > 0) {
        Flasher::setFlash('success', 'Barang', 'berhasil', 'diedit');
        header('Location: ' . BASEURL . '/barang');
        exit;
      } else {
        Flasher::setFlash('danger', 'Barang', 'gagal', 'diedit');
        header('Location: ' . BASEURL . '/barang/edit');
        exit;
      }
    }
  }
}
