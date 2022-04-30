<?php

class Profil extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) header('Location: ' . BASEURL);
  }

  public function index()
  {
    $data['title'] = 'PROFIL | ' . $this->title;
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profil/index', $data);
    $this->view('templates/footer');
  }

  public function daftarpengguna()
  {
    $data['title'] = 'DAFTAR PENGGUNA | ' . $this->title;
    $data['user'] = $this->model('Profil_model')->showUser();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profil/daftarpengguna', $data);
    $this->view('templates/footer');
  }

  public function daftarpemasok()
  {
    $data['title'] = 'DAFTAR PEMASOK | ' . $this->title;
    $data['pemasok'] = $this->model('Profil_model')->showPemasok();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profil/daftarpemasok', $data);
    $this->view('templates/footer');
  }

  public function daftarunit()
  {
    $data['title'] = 'DAFTAR UNIT | ' . $this->title;
    $data['unit'] = $this->model('Profil_model')->showUnit();
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profil/daftarunit', $data);
    $this->view('templates/footer');
  }

  public function tambahunit()
  {
    if ($this->model('Profil_model')->tambahunit($_POST) > 0) {
      Flasher::setFlash('success', 'Unit', 'berhasil', 'ditambahkan');
      header('Location: ' . BASEURL . '/profil/daftarunit');
      exit;
    } else {
      Flasher::setFlash('danger', 'Unit', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/profil/daftarunit');
      exit;
    }
  }

  public function tambahpemasok()
  {
    if ($this->model('Profil_model')->tambahpemasok($_POST) > 0) {
      Flasher::setFlash('success', 'Pemasok', 'berhasil', 'ditambahkan');
      header('Location: ' . BASEURL . '/profil/daftarpemasok');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pemasok', 'gagal', 'ditambahkan');
      header('Location: ' . BASEURL . '/profil/daftarpemasok');
      exit;
    }
  }

  public function deleteunit($id)
  {
    if ($this->model('Profil_model')->deleteUnit($id) > 0) {
      Flasher::setFlash('success', 'Unit', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/profil/daftarunit');
      exit;
    } else {
      Flasher::setFlash('danger', 'Unit', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/profil/daftarunit');
      exit;
    }
  }

  public function deletepemasok($id)
  {
    if ($this->model('Profil_model')->deletePemasok($id) > 0) {
      Flasher::setFlash('success', 'Pemasok', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/profil/daftarpemasok');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pemasok', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/profil/daftarunit');
      exit;
    }
  }
}
