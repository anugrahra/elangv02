<?php

class Profil_model
{
  private $tableUser = 'akun',
    $tablePemasok = 'supplier',
    $tableUnit = 'unit',
    $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function showUser()
  {
    $this->db->query("SELECT * FROM " . $this->tableUser . " ORDER BY id");
    return $this->db->resultSet();
  }

  public function showPemasok()
  {
    $this->db->query("SELECT * FROM " . $this->tablePemasok . " ORDER BY id");
    return $this->db->resultSet();
  }

  public function showUnit()
  {
    $this->db->query("SELECT * FROM " . $this->tableUnit . " ORDER BY id");
    return $this->db->resultSet();
  }

  public function tambahUnit($data)
  {
    $query  = "INSERT INTO " . $this->tableUnit . " VALUES ('', :nama)";

    $this->db->query($query);
    $this->db->bind('nama', strtoupper($data['namaunit']));

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function tambahPemasok($data)
  {
    $query  = "INSERT INTO " . $this->tablePemasok . " VALUES ('', :kode, :nama, :alamat, :no_kontak, :email, '')";

    $this->db->query($query);
    $this->db->bind('kode', $data['kode']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('alamat', $data['alamat']);
    $this->db->bind('no_kontak', $data['notelp']);
    $this->db->bind('email', $data['email']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteUnit($id)
  {
    $this->db->query('DELETE FROM ' . $this->tableUnit . ' WHERE id=:id');
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deletePemasok($id)
  {
    $this->db->query('DELETE FROM ' . $this->tablePemasok . ' WHERE id=:id');
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
