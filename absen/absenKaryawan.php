<?php
session_start();
if ($_SESSION['ID']=="") {
  header("location:../login/loginPegawai.php?pesan=1");
}

$id = $_SESSION['ID'];

if (isset($_GET['pesan'])){
  if ($_GET['pesan'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          <strong><i class='glyphicon glyphicon-alert'></i> KARYAWAN DILARANG KE PAGE DASHBOARD!!!</strong>
          </div>";
      }
    }
              require '../controller/controllerCrudPegawai.php';
              $modelPegawai = new modelPegawai();
              $modelPegawai-> select();
              $modelPegawai-> selectAbsen();
              $dataPegawai = $modelPegawai->getData();
              $dataAbsen = $modelPegawai->getDataAbsen();
                ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Absensi Pegawai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
$foto="../foto/x.jpg";
      foreach ($dataPegawai as $key) {
        if ($key['id_pegawai']==$id){
          if ($key['foto']=="") {
            $foto="../foto/x.jpg";
          }else{
            $foto=$key['foto'];
          }
?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.php" class="navbar-brand"><b>Sistem Informasi </b>Absensi</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../foto/<?= "$foto";?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= $_SESSION['NAMA']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../foto/<?="$foto";?>" class="img-circle" alt="User Image">

                  <p style="color:black;">
                    <?= $_SESSION['NAMA'];?>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="../login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.php"><b>Sistem </b>Gaji</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><b>Absensi Karyawan</b></p>

    <form action="../proses/prosesAbsen.php?aksi=tambah" method="post">
    	
      <div class="box-body box-profile" align="center">
         <img src="../foto/<?= "$foto";?>" alt="User profile picture" width="300px" height="300px">
      </div>
      <div class="form-group has-feedback">
      	<label for="text">ID PEGAWAI</label>
        <input type="text" class="form-control" placeholder="<?= $key['id_pegawai'];?>" name="id_pegawai" value="<?= $key['id_pegawai'];?>" readonly>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<label for="text">NAMA PEGAWAI</label>
        <input type="text" class="form-control" placeholder="<?= $key['nama_pegawai'];?>" name="nama_pegawai" readonly>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<label for="text">WAKTU</label>
        <input type="text" class="form-control" placeholder="<?= date('Y-m-d H:i:s');  ?>" name="waktu" readonly>
        <span class="glyphicon glyphicon-heart-empty form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button id="btnAbsen" type="submit" class="btn btn-primary btn-block btn-flat">Klik untuk Absen</button>
        

        
              <?php
  }
}
?>

      <?php
      foreach ($dataAbsen as $key) {
        if ($key['id_pegawai']==$id){
        $tgl = explode('-',$key['tanggal_absen']);
        $tanggal = explode(' ',$tgl[2]);
        $tglfix = $tanggal[0];
        if (date('d')== $tglfix){
        echo "Anda sudah absen hari ini :)";}
}



}
        ?>
        <script>
        if (<?=date('d')?>===<?= $tglfix?>){
        document.getElementById("btnAbsen").disabled = true;
         }
        </script>
</div>
        </form>
        <!-- /.col -->
      </div>
    
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../asset/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
