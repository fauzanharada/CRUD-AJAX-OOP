<?php
  require_once("DataEntity.php");

  /**
   *
   */
  class DataCRUD extends Data
  {

    public function ShowData()
    {
      $string = "SELECT * FROM data";
      $array = array();
  		$query = mysqli_query($this->con, $string);
  		while ($row = mysqli_fetch_array($query)) {
  			$array[] = $row;
  		}
  		return $array;
    }

    public function Cari()
    {
      $string = "SELECT * FROM data where nama LIKE '%".$this->getNama()."%'";
      $array = array();
  		$query = mysqli_query($this->con, $string);
  		while ($row = mysqli_fetch_array($query)) {
  			$array[] = $row;
  		}
  		return $array;
    }

    public function UpdateData($id)
  	{
  		$string = "UPDATE data SET nama = ?, jenkel = ?, alamat = ? WHERE id = ?";
  		$stmt = mysqli_prepare($this->con, $string);
  		$stmt->bind_param('ssss',$this->getNama(),$this->getJenkel(),$this->getAlamat(),$id);
  		if($rsint = $stmt->execute()){
  			return $rsint;
  		}else {
  			echo mysqli_error($this->con);
  		}
  	}

    public function DeleteData($id){
  		$string = "DELETE FROM data WHERE id = ".$id;
  		$query = mysqli_query($this->con, $string);
  		return $query;
  	}

    public function InsertData()
  	{
  		$string = "INSERT INTO data (nama,jenkel,alamat) VALUES (?, ?, ?)";
  		$stmt = mysqli_prepare($this->con, $string);
  		$stmt->bind_param('sss',$this->getNama(),$this->getJenkel(),$this->getAlamat());
  		if($rsint = $stmt->execute()){
  			return "Sukses";
  		}else {
  			echo mysqli_error($this->con);
  		}
  	}

  }

 ?>
