<?php

require '../koneksi/database.php';

class modelLogin extends database
{
	private $dataAdmin;
	private $dataPegawai;
	

	function selectAdmin(){
		$sqltext="SELECT * FROM admin";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataAdmin = $temp;
	}

	function selectPegawai(){
		$sqltext="SELECT * FROM pegawai";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataPegawai = $temp;
	}


	function getDataAdmin()
	{
		return $this->dataAdmin;
	}
	function getDataPegawai()
	{
		return $this->dataPegawai;
	}

}

// $modelBBM=new modelBBM();
// $modelBBM->select();
// if (isset($_POST['input'])) {
// echo $modelBBM->insert();
//  }
// //$modelBBM->viewData();

// // }
// //header('Location: ../view/viewProdukBBM.php'); 
// //$_POST['harga']
?>

