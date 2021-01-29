<?php
require '../controller/controllerCrudGaji.php';

class prosesGaji
{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelGaji();
		if($this->action=="tambah")
		{
			$id_ptg=$_POST['potongan'];
			$pegawai=$_POST['pegawai'];
			$tgl=$_POST['tgl'];
			$jabatan=$_POST['jabatan'];
			$tunjangan=$_POST['tunjangan'];

			if(isset($_POST['potongan'])){
				if($id_ptg!="-- Pilih Potongan --"){
				$potongan=$_POST['potongan'];
				$ptg = explode('/',$potongan);
			    $id_ptg = $ptg[0];
			}else{
				$id_ptg='NULL';
			}
			}

			$pgw = explode('/',$pegawai);
			$id_pgw = $pgw[0];


			$tanggal           = explode('/',$tgl);
			$tanggal_gaji = $tanggal[2]."-".$tanggal[0]."-".$tanggal[1];

			$gajibersih = explode('/',$jabatan);
			$id_gajibersih = $gajibersih[0];

			$tjg = explode('/',$tunjangan);
			$id_tjg = $tjg[0];

			
			//echo $id_ptg;

			//echo $id_pgw."+".$tanggal_gaji."+".$id_gajibersih."+".$id_tjg."+".$id_ptg."+";

			$objmodel->insert($id_pgw,$tanggal_gaji,$id_gajibersih,$id_tjg,$id_ptg);
			header("location:../gaji/gaji.php");
			}

		else if($this->action=="tambahPotongan")
		{
			$namaPotongan=$_POST['nama_potongan'];
			$jumlahPotongan=$_POST['jumlah_potongan'];
			
			$objmodel->insertPotongan($namaPotongan,$jumlahPotongan);
			header("location:../gaji/potongan.php");

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

$objproses=new prosesGaji($_GET['aksi']);
$objproses->proses();
?>