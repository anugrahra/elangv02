<?php

class Laporan_model
{
  private $tablePenerimaan = 'penerimaan',
    $tablePengeluaran = 'pengeluaran',
    $tableStock = 'kartu_stock',
    $tableBarang = 'barang',
    $tablePemeriksaan = 'pemeriksaan',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function penerimaan($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];

    $query  = "INSERT INTO " . $this->tablePenerimaan . " VALUES ('', '', :keterangan, :tanggal, '$kodebarang', '', :jumlah, :user, :supplier, :no_surat_jalan, '')";

    $this->db->query($query);
    $this->db->bind('keterangan', $data['keteranganpenerimaan']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('jumlah', $data['jumlah']);
    $this->db->bind('user', $data['penerima']);
    $this->db->bind('supplier', $data['pemasok']);
    $this->db->bind('no_surat_jalan', $data['nosuratjalan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function stockpenerimaan($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];
    $stok = $explode[1];

    $query  = "INSERT INTO " . $this->tableStock . " VALUES ('', '$kodebarang', '', :tanggal, '', :keterangan, :masuk, '', :sisa, '')";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('keterangan', $data['keteranganpenerimaan']);
    $this->db->bind('masuk', $data['jumlah']);
    $this->db->bind('sisa', $data['jumlah'] + $stok);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function pengeluaran($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];

    $query  = "INSERT INTO " . $this->tablePengeluaran . " VALUES ('', :keterangan, :tanggal, :unit, :penerima, '$kodebarang', '', :jumlah, :no_surat_pengambilan, '')";

    $this->db->query($query);
    $this->db->bind('keterangan', $data['keteranganpengeluaran']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('unit', $data['bagian']);
    $this->db->bind('penerima', $data['pengambilbarang']);
    $this->db->bind('jumlah', $data['jumlah']);
    $this->db->bind('no_surat_pengambilan', $data['nosuratpengambilan']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function stockpengeluaran($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];
    $stok = $explode[1];

    $query  = "INSERT INTO " . $this->tableStock . " VALUES ('', '$kodebarang', '', :tanggal, '', :keterangan, '', :keluar, :sisa, :pengguna)";

    $this->db->query($query);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('keterangan', $data['keteranganpengeluaran']);
    $this->db->bind('keluar', $data['jumlah']);
    $this->db->bind('sisa', $stok - $data['jumlah']);
    $this->db->bind('pengguna', $data['bagian']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function showPenerimaan()
  {
    $this->db->query("SELECT * FROM " . $this->tablePenerimaan . " WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND YEAR(tanggal) = YEAR(CURRENT_DATE()) GROUP BY no_surat_jalan ORDER BY tanggal DESC");
    return $this->db->resultSet();
  }

  public function showPenerimaanBySurat($nosurat)
  {
    $query = "SELECT *

    FROM " . $this->tablePenerimaan . "
    
    LEFT JOIN " . $this->tableBarang . "
    
    ON " . $this->tablePenerimaan . ".kode_barang=" . $this->tableBarang . ".kode 
    
    WHERE " . $this->tablePenerimaan . ".no_surat_jalan = :nosurat ORDER BY " . $this->tablePenerimaan . ".id";

    $this->db->query($query);
    $this->db->bind('nosurat', $nosurat);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function showPenerimaanSuratTanggal($nosurat)
  {
    $this->db->query("SELECT * FROM " . $this->tablePenerimaan . " WHERE no_surat_jalan = :nosurat ORDER BY id");
    $this->db->bind('nosurat', $nosurat);
    $this->db->execute();
    return $this->db->single();
  }

  public function showPenerimaanByDate($data)
  {
    $explode = explode('|', $data['bulan']);
    $bulan = $explode[0];

    $query = "SELECT * FROM " . $this->tablePenerimaan . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun ORDER BY id";

    $this->db->query($query);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getPenerimaanByDate($data)
  {
    $query = "SELECT * FROM " . $this->tablePenerimaan . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun GROUP BY no_surat_jalan ORDER BY id";

    $this->db->query($query);
    $this->db->bind('bulan', $data['bulan']);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function showPengeluaran()
  {
    $this->db->query("SELECT * FROM " . $this->tablePengeluaran . " WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND YEAR(tanggal) = YEAR(CURRENT_DATE()) GROUP BY no_surat_pengambilan ORDER BY tanggal DESC");
    return $this->db->resultSet();
  }

  public function showPengeluaranBySurat($nosurat)
  {
    $query = "SELECT *

    FROM " . $this->tablePengeluaran . "
    
    LEFT JOIN " . $this->tableBarang . "
    
    ON " . $this->tablePengeluaran . ".kode_barang=" . $this->tableBarang . ".kode 
    
    WHERE " . $this->tablePengeluaran . ".no_surat_pengambilan = :nosurat ORDER BY " . $this->tablePengeluaran . ".id";

    $this->db->query($query);
    $this->db->bind('nosurat', $nosurat);
    $this->db->execute();
    return $this->db->resultSet();
  }

  public function showPengeluaranSuratTanggal($nosurat)
  {
    $this->db->query("SELECT * FROM " . $this->tablePengeluaran . " WHERE no_surat_pengambilan = :nosurat ORDER BY id");
    $this->db->bind('nosurat', $nosurat);
    $this->db->execute();
    return $this->db->single();
  }

  public function showPengeluaranByDate($data)
  {
    $explode = explode('|', $data['bulan']);
    $bulan = $explode[0];

    $query = "SELECT * FROM " . $this->tablePengeluaran . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun ORDER BY tanggal";

    $this->db->query($query);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getPengeluaranByDate($data)
  {
    $query = "SELECT * FROM " . $this->tablePengeluaran . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun ORDER BY id";

    $this->db->query($query);
    $this->db->bind('bulan', $data['bulan']);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function showStockByCode($kodebarang)
  {
    $this->db->query("SELECT * FROM " . $this->tableStock . " WHERE kode_barang=:kodebarang  ORDER BY tanggal");
    $this->db->bind('kodebarang', $kodebarang);
    return $this->db->resultSet();
  }

  public function showPemeriksaan()
  {
    $this->db->query("SELECT * FROM " . $this->tablePemeriksaan . " WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND YEAR(tanggal) = YEAR(CURRENT_DATE()) ORDER BY tanggal DESC");
    return $this->db->resultSet();
  }

  public function showPemeriksaanTerakhir()
  {
    $this->db->query("SELECT * FROM " . $this->tablePemeriksaan . " ORDER BY ID DESC");
    return $this->db->single();
  }

  public function showPemeriksaanByDate($data)
  {
    $explode = explode('|', $data['bulan']);
    $bulan = $explode[0];

    $query = "SELECT * FROM " . $this->tablePemeriksaan . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun ORDER BY tanggal";

    $this->db->query($query);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getPemeriksaanByDate($data)
  {
    $query = "SELECT * FROM " . $this->tablePemeriksaan . " WHERE MONTH(tanggal) = :bulan AND YEAR(tanggal) = :tahun ORDER BY id";

    $this->db->query($query);
    $this->db->bind('bulan', $data['bulan']);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->execute();

    return $this->db->resultSet();
  }
}
