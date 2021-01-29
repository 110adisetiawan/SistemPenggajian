<?php

require '../koneksi/database.php';

class modelGaji extends database
{
	private $dataGaji;
	private $dataPotongan;
	private $dataTunjangan;
	private $dataPegawai;
	private $gaji;
	

	function select(){
		$sqltext="SELECT * FROM gaji INNER JOIN pegawai on gaji.id_pegawai=pegawai.id_pegawai INNER JOIN datagaji on gaji.id_datagaji=datagaji.id_dataGaji INNER JOIN tunjangan on gaji.id_tunjangan=tunjangan.id_tunjangan INNER JOIN potongan on gaji.id_potongan=potongan.id_potongan";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataGaji = $temp;
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

	function selectGaji(){
		$sqltext="SELECT * FROM datagaji";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->gaji = $temp;
	}

	function selectPotongan(){
		$sqltext="SELECT * FROM potongan";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataPotongan = $temp;
	}

	function selectTunjangan(){
		$sqltext="SELECT * FROM tunjangan";
		$statement=mysqli_query($this->koneksi,$sqltext);

		
		while ($row = mysqli_fetch_array($statement))
		{
			$temp[] = $row;
		}
		$this->dataTunjangan = $temp;
	}

	function insert($id_peg,$tgl,$id_gajibersih,$id_tunjangan,$id_potongan)
	{
		$sqltext="INSERT INTO gaji VALUES (NULL,'$id_peg','$tgl','$id_gajibersih','$id_tunjangan','$id_potongan')";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function insertPotongan($nama_potongan,$jumlah_potongan)
	{
		$sqltext="INSERT INTO potongan VALUES (NULL,'$nama_potongan','$jumlah_potongan')";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function delete($id)
	{
		$sqltext="DELETE FROM pegawai WHERE id_pegawai='$id'";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function update($id,$nama,$alamat,$agama,$jabatan,$foto)
	{
		$sqltext="UPDATE pegawai SET nama_pegawai='$nama', alamat='$alamat', agama='$agama', jabatan='$jabatan' , foto='$foto' WHERE id_pegawai = '$id' ";
		$statement=mysqli_query($this->koneksi,$sqltext);
	}

	function getData()
	{
		return $this->dataGaji;
	}

	function getDataPegawai()
	{
		return $this->dataPegawai;	
	}

	function getDataGaji()
	{
		return $this->gaji;
	}

	function getDataPotongan()
	{
		return $this->dataPotongan;
	}

	function getDataTunjangan()
	{
		return $this->dataTunjangan;
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

