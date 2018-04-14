<?php
/**
 *
 */
class Data
{
  public $con;

  private $nama;
  private $jenkel;
  private $alamat;

  function setNama($nama){
    $this->nama = $nama;
  }
  function getNama(){
    return $this->nama;
  }

  function setJenkel($jenkel){
    $this->jenkel = $jenkel;
  }
  function getJenkel(){
    return $this->jenkel;
  }

  function setAlamat($alamat){
    $this->alamat = $alamat;
  }
  function getAlamat(){
    return $this->alamat;
  }




  function __construct()
  {
    $this->con = mysqli_connect("localhost", "root", "", "ajax");
    if(!$this->con)
    {
      echo 'Database Connection Error ' . mysqli_connect_error($this->con);
    }
  }
}

 ?>
