<?php
require '../controller/controllerCrudPegawai.php';

class prosesAbsen
{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelPegawai();
		if($this->action=="tambah")
		{
			$id_pegawai=$_POST['id_pegawai'];
			echo $id_pegawai;
			
			$objmodel->insertAbsen($id_pegawai);
			header("location:../absen/absenKaryawan.php");
			}

		else if($this->action=="hapus")
		{
			$id=$_GET['id'];
			echo $id;
			$objmodel->delete($id);
			header("location:../karyawan/karyawan.php");

		}


		else if($this->action=="edit")
		{
			$idPegawai=$_POST['id'];
			$nmPegawai=$_POST['nama'];
			$almt=$_POST['alamat'];
			$agama=$_POST['agama'];
			$jabatan=$_POST['jabatan'];
			$objmodel->update($idPegawai,$nmPegawai,$almt,$agama,$jabatan);
			header("location:../karyawan/karyawan.php");
		}

	}
}

$objproses=new prosesAbsen($_GET['aksi']);
$objproses->proses();
?>