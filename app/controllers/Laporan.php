<?php

class Laporan extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function penerimaan()
  {
    $data['title'] = 'LAPORAN PENERIMAAN | ' . $this->title;
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['penerimaan'] = $this->model('Laporan_model')->showPenerimaan();

    if (isset($_POST['bulan'])) {
      if ($this->model('Laporan_model')->showPenerimaanByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['penerimaan'] = $this->model('Laporan_model')->getPenerimaanByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Laporan Penerimaan', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/laporan/penerimaan');
        exit;
      }
    }

    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/penerimaan', $data);
    $this->view('templates/footer');
  }

  public function penerimaanbysurat($nosurat)
  {
    $data['title'] = 'PENERIMAAN | ' . $this->title;
    $data['penerimaan'] = $this->model('Laporan_model')->showPenerimaanBySurat($nosurat);
    $data['surattanggal'] = $this->model('Laporan_model')->showPenerimaanSuratTanggal($nosurat);
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/penerimaanbysurat', $data);
    $this->view('templates/footer');
  }

  public function pengeluaranbysurat($nosurat)
  {
    $data['title'] = 'PENGELUARAN | ' . $this->title;
    $data['pengeluaran'] = $this->model('Laporan_model')->showPengeluaranBySurat($nosurat);
    $data['surattanggal'] = $this->model('Laporan_model')->showPengeluaranSuratTanggal($nosurat);
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/pengeluaranbysurat', $data);
    $this->view('templates/footer');
  }

  public function pengeluaran()
  {
    $data['title'] = 'LAPORAN PENGELUARAN | ' . $this->title;
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['pengeluaran'] = $this->model('Laporan_model')->showPengeluaran();

    if (isset($_POST['bulan'])) {
      if ($this->model('Laporan_model')->showPengeluaranByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['pengeluaran'] = $this->model('Laporan_model')->getPengeluaranByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Laporan Pengeluaran', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/laporan/pengeluaran');
        exit;
      }
    }

    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/pengeluaran', $data);
    $this->view('templates/footer');
  }

  public function pemeriksaan()
  {
    $data['title'] = 'PEMERIKSAAN | ' . $this->title;
    $data['bulan'] = date('F');
    $data['tahun'] = date('Y');
    $data['pemeriksaan'] = $this->model('Laporan_model')->showPemeriksaan();

    if (isset($_POST['bulan'])) {
      if ($this->model('Laporan_model')->showPemeriksaanByDate($_POST) > 0) {
        $explode = explode('|', $_POST['bulan']);
        $bulan = $explode[1];
        $data['bulan'] = $bulan;
        $data['tahun'] = $_POST['tahun'];
        $data['pemeriksaan'] = $this->model('Laporan_model')->getPemeriksaanByDate($_POST);
      } else {
        Flasher::setFlash('danger', 'Laporan Pemeriksaan', 'tidak', 'ditemukan');
        header('Location: ' . BASEURL . '/laporan/pemeriksaan');
        exit;
      }
    }

    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/pemeriksaan', $data);
    $this->view('templates/footer');
  }

  public function stockopname()
  {
    $data['title'] = 'STOCK OPNAME | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('laporan/stockopname', $data);
    $this->view('templates/footer');
  }

  public function kartustock($kodebarang)
  {
    $data['title'] = 'KARTU STOCK | ' . $this->title;
    $data['barang'] = $this->model('Barang_model')->showBarangByCode($kodebarang);
    $data['stock'] = $this->model('Laporan_model')->showStockByCode($kodebarang);
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('transaksi/kartustock', $data);
    $this->view('templates/footer');
  }
}
