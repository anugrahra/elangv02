<?php

class Transaksi_model
{
  private $tablePemasok = 'supplier',
    $tableBagian = 'unit',
    $tableBarang = 'barang',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showPemasok()
  {
    $this->db->query("SELECT * FROM " . $this->tablePemasok . " ORDER BY id");
    return $this->db->resultSet();
  }

  public function showBagian()
  {
    $this->db->query("SELECT * FROM " . $this->tableBagian . " ORDER BY id");
    return $this->db->resultSet();
  }

  public function terimaBarang($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];
    $stok = $explode[1];

    $query  = "UPDATE " . $this->tableBarang . " SET stok = ($stok + :jumlah) WHERE kode = '$kodebarang'";

    $this->db->query($query);
    $this->db->bind('jumlah', $data['jumlah']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function keluarBarang($data)
  {
    $explode = explode('|', $data['namabarang']);
    $kodebarang = $explode[0];
    $stok = $explode[1];

    $query  = "UPDATE " . $this->tableBarang . " SET stok = ($stok - :jumlah) WHERE kode = '$kodebarang'";

    $this->db->query($query);
    $this->db->bind('jumlah', $data['jumlah']);
    $this->db->execute();

    return $this->db->rowCount();
  }
}
