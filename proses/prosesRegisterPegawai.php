<?php
require '../controller/controllerCrudPegawai.php';

class prosesPegawai
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
			$id=NULL;
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$agama=$_POST['agama'];
			$jabatan=$_POST['jabatan'];
			$foto=$_FILES['foto']['name'];

			if($foto != "") {
  			$ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
 		 	$x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  			$ekstensi = strtolower(end($x));
  			$file_tmp = $_FILES['foto']['tmp_name'];   
  			$angka_acak     = rand(1,999);
  			$nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya

  			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){     
            move_uploaded_file($file_tmp, '../foto/'.$nama_gambar_baru);
			$objmodel->insert($id,$nama,$alamat,$agama,$jabatan,$nama_gambar_baru);
			header("location:../karyawan/karyawan.php");
			}
			else {
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='register.php';</script>";
			}
		}
		else{
			$objmodel->insert($id,$nama,$alamat,$agama,$jabatan,null);
			header("location:../karyawan/karyawan.php");
		}
	}






		else if($this->action=="hapus")
		{
			$id=$_GET['id'];
			echo $id;
			$objmodel->delet($id);
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

$objproses=new prosesPegawai($_GET['aksi']);
$objproses->proses();
?>