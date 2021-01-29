<?php

session_start();

require '../controller/controllerLogin.php';
$modelLogin = new modelLogin();
$modelLogin-> selectAdmin();
$modelLogin-> selectPegawai();
$dataAdmin = $modelLogin->getDataAdmin();
$dataPegawai = $modelLogin->getDataPegawai();



if (isset($_POST['username'])) {
$username=$_POST['username'];
$password=$_POST['password'];
foreach ($dataAdmin as $key) {
	if ($key['username']=="$username") {
		if ($key['password']=="$password") {
			$_SESSION['ID'] = $id;
			$_SESSION['USERNAME'] = $key['username'];
			header("location:../index.php");
			echo "<a href='../index.php'>Back</a>";
			//echo "<META HTTP-EQUIV='Refresh' Content='0; URL=../index.php'>";
			//window.location.replace("../index.php/");
		}
		else{
			header("location:../login/loginPage.php?alert=3");
			//window.location.href = "../login/loginPage.php?alert=3";
			//window.location.replace("../login/loginPage.php?alert=3");
		}

		}
		else
		{
			header("location:../login/loginPage.php?alert=3");
			//window.location.href = "../login/loginPage.php?alert=3"
			//window.location.replace("../login/loginPage.php?alert=3");
			
	}
}

} else if(isset($_POST['id'])){

	
    $id=$_POST['id'];
	foreach ($dataPegawai as $key2) {
	if ($key2['id_pegawai']==$id) {
			$_SESSION['ID'] = $id;
			$_SESSION['NAMA'] = $key2['nama_pegawai'];
			$_SESSION['JABATAN'] = "PEGAWAI";
			header("location:../absen/absenKaryawan.php");
			//window.location.replace("../absen/absenKaryawan.php");
			//echo "<META HTTP-EQUIV='Refresh' Content='0; URL=../index.php'>";
		}
}
if($_SESSION['ID']==""){
	header("location:../login/loginPegawai.php?pesan=1");
}
}

?>