<?php

class Transaksi extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function penerimaan()
  {
    $data['title'] = 'PENERIMAAN BARANG | ' . $this->title;
    $data['namaBarang'] = $this->model('Barang_model')->showBarangByStok();
    $data['pemasok'] = $this->model('Transaksi_model')->showPemasok();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('transaksi/penerimaan', $data);
    $this->view('templates/footer');
  }

  public function pengeluaran()
  {
    $data['title'] = 'PENGELUARAN BARANG | ' . $this->title;
    $data['namaBarang'] = $this->model('Barang_model')->showBarangTidakNol();
    $data['bagian'] = $this->model('Transaksi_model')->showBagian();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('transaksi/pengeluaran', $data);
    $this->view('templates/footer');
  }

  public function prosesPenerimaan()
  {
    if (
      $this->model('Transaksi_model')->terimaBarang($_POST) > 0
      &&
      $this->model('Laporan_model')->penerimaan($_POST) > 0
      &&
      $this->model('Laporan_model')->stockpenerimaan($_POST) > 0
    ) {
      Flasher::setFlash('success', 'Barang', 'berhasil', 'diterima');
      header('Location: ' . BASEURL . '/laporan/penerimaan');
    } else {
      Flasher::setFlash('danger', 'Barang', 'gagal', 'diterima');
      header('Location: ' . BASEURL . '/transaksi/penerimaan');
      exit;
    }
  }

  public function prosesPengeluaran()
  {
    if (
      $this->model('Transaksi_model')->keluarBarang($_POST) > 0
      &&
      $this->model('Laporan_model')->pengeluaran($_POST) > 0
      &&
      $this->model('Laporan_model')->stockpengeluaran($_POST) > 0
    ) {
      Flasher::setFlash('success', 'Barang', 'berhasil', 'dikeluarkan');
      header('Location: ' . BASEURL . '/laporan/pengeluaran');
    } else {
      Flasher::setFlash('danger', 'Barang', 'gagal', 'diterima');
      header('Location: ' . BASEURL . '/transaksi/pengeluaran');
      exit;
    }
  }
}
