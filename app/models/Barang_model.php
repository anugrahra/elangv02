<?php

class Barang_model
{
  private $tableBarang = 'barang',
    $tableJenisBarang = 'jenis_barang',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showBarang()
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " ORDER BY kode");
    return $this->db->resultSet();
  }

  public function showBarangByStok()
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " ORDER BY stok");
    return $this->db->resultSet();
  }

  public function showBarangTidakNol()
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " WHERE stok != 0 ORDER BY kode");
    return $this->db->resultSet();
  }

  public function showBarangNol()
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " WHERE stok = 0 ORDER BY kode");
    return $this->db->resultSet();
  }

  public function showBarangById($id)
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " WHERE id=$id");
    return $this->db->single();
  }

  public function showBarangByCode($kodebarang)
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " WHERE kode=:kodebarang");
    $this->db->bind('kodebarang', $kodebarang);
    return $this->db->single();
  }

  public function showJumlahBarang()
  {
    $this->db->query("SELECT COUNT(*) AS total FROM " . $this->tableBarang);
    return $this->db->single();
  }

  public function showJumlahBarangHabis()
  {
    $this->db->query("SELECT COUNT(*) AS total FROM " . $this->tableBarang . " WHERE stok = 0");
    return $this->db->single();
  }

  public function getBarangByCode($data)
  {
    $this->db->query("SELECT * FROM " . $this->tableBarang . " WHERE kode=:kodebarang");
    $this->db->bind('kodebarang', $data['kodebarang']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function showJenisBarang()
  {
    $this->db->query("SELECT * FROM " . $this->tableJenisBarang . " ORDER BY id DESC");
    return $this->db->resultSet();
  }

  public function showLastNumCode($data)
  {
    $query = "SELECT num_kode FROM " . $this->tableBarang . " WHERE jenis=:jenis ORDER BY id DESC";
    $this->db->query($query);
    $this->db->bind('jenis', $data['jenisbarang']);
    return $this->db->single();
  }

  public function tambahBarang($data)
  {
    $lastnumcode = $this->showLastNumCode($data);
    $numcode = strval($lastnumcode['num_kode'] + 1);
    if (strlen($numcode) == 2) {
      $zero = '0';
    } elseif (strlen($numcode) == 1) {
      $zero = '00';
    } else {
      $zero = '';
    }

    $alphacode = '';
    if ($data['jenisbarang'] == 'SAFETY EQUIPMENTS') {
      $alphacode = 'SE';
    } else if ($data['jenisbarang'] == 'LABORATORY EQUIPMENTS') {
      $alphacode = 'LE';
    } else if ($data['jenisbarang'] == 'LABORATORY INSTRUMENTS') {
      $alphacode = 'LS';
    } else if ($data['jenisbarang'] == 'CLEANING EQUIPMENTS') {
      $alphacode = 'CE';
    } else if ($data['jenisbarang'] == 'STATIONARY') {
      $alphacode = 'ST';
    } else if ($data['jenisbarang'] == 'AUTOMOTIVE SPARE PARTS') {
      $alphacode = 'AP';
    } else if ($data['jenisbarang'] == 'MATERIALS') {
      $alphacode = 'MT';
    } else if ($data['jenisbarang'] == 'MAINTENANCE EQUIPMENTS') {
      $alphacode = 'ME';
    } else if ($data['jenisbarang'] == 'HAND TOOLS') {
      $alphacode = 'HT';
    }

    $code = $alphacode . $zero . $numcode;

    $query  = "INSERT INTO " . $this->tableBarang . " VALUES ('', :nama, :merek, :tipe, :stok, :satuan, :jenis, :keterangan, :num_kode, '', :kode)";

    $this->db->query($query);
    $this->db->bind('nama', strtoupper($data['namabarang']));
    $this->db->bind('merek', strtoupper($data['merekbarang']));
    $this->db->bind('tipe', strtoupper($data['tipebarang']));
    $this->db->bind('stok', $data['stokawal']);
    $this->db->bind('satuan', strtoupper($data['satuan']));
    $this->db->bind('jenis', $data['jenisbarang']);
    $this->db->bind('keterangan', strtoupper($data['keterangan']));
    $this->db->bind('num_kode', $numcode);
    $this->db->bind('kode', $code);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function editBarang($data)
  {
    $query = "UPDATE " . $this->tableBarang . " SET nama=:nama, merek=:merek, tipe=:tipe, satuan=:satuan, jenis=:jenis, keterangan=:keterangan WHERE id=:id";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('nama', $data['namabarang']);
    $this->db->bind('merek', $data['merek']);
    $this->db->bind('tipe', $data['tipe']);
    $this->db->bind('satuan', $data['satuan']);
    $this->db->bind('jenis', $data['jenisbarang']);
    $this->db->bind('keterangan', $data['keterangan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function searchBarang($data)
  {
    $keyword = $data['keyword'];

    $query = "SELECT * FROM " . $this->tableBarang . " WHERE kode LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
    $this->db->query($query);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getSearchBarang($data)
  {
    $keyword = $data['keyword'];

    $query = "SELECT * FROM " . $this->tableBarang . " WHERE kode LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function showBarangByJenis($data)
  {
    $query = "SELECT * FROM " . $this->tableBarang . " WHERE jenis = :jenisbarang";

    $this->db->query($query);
    $this->db->bind('jenisbarang', $data['jenisbarang']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getBarangByJenis($data)
  {
    $query = "SELECT * FROM " . $this->tableBarang . " WHERE jenis = :jenisbarang";

    $this->db->query($query);
    $this->db->bind('jenisbarang', $data['jenisbarang']);
    $this->db->execute();

    return $this->db->resultSet();
  }
}
