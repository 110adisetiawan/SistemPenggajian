<?php

require '../koneksi/database.php';

class modelPegawai extends database
{
	private $dataPegawai;
	private $dataAbsen;
	

	function select(){
		$sqltext="SELECT * FROM pegawai";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataPegawai = $temp;
	}

	function selectAbsen(){
		$sqltext="SELECT * FROM absenpegawai INNER JOIN pegawai on absenpegawai.id_pegawai=pegawai.id_pegawai";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataAbsen = $temp;
	}

	function insert($id,$nama,$alamat,$agama,$jabatan,$foto)
	{
		$sqltext="INSERT INTO pegawai VALUES ('$id','$nama','$alamat','$agama','$jabatan','$foto')";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function insertAbsen($id_pegawai)
	{
		$sqltext="INSERT INTO absenpegawai VALUES (NULL,'$id_pegawai',current_timestamp())";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function delet($id)
	{
		$sqltext="DELETE FROM pegawai WHERE id_pegawai='$id'";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function update($id,$nama,$alamat,$agama,$jabatan)
	{
		$sqltext="UPDATE pegawai SET nama_pegawai='$nama', alamat='$alamat', agama='$agama', jabatan='$jabatan' WHERE id_pegawai = '$id' ";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function getData()
	{
		return $this->dataPegawai;
	}

	function getDataAbsen()
	{
		return $this->dataAbsen;
	}

	

	

	function viewData()
	{
		
		foreach ($this->dataBBM as $key) {
			echo "<tr><td>".$key['KODE_PRODUK']."</td>";
    		echo "<td>".$key['NAMA_PRODUK']."</td>";
    		echo "<td>".$key['HARGA']."</td>";
    		echo "<td><button type='button'>Edit</button></td></tr>";

		}
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

