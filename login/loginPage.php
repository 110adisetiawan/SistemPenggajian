<?php
if (isset($_GET['alert'])){
      if ($_GET['alert'] == 1) {
    echo "<div class='register-box'>
    <div class='alert alert-warning alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          <strong>Logout Berhasil!</strong>
          </div></div>";
      }
      if ($_GET['alert'] == 2) {
    echo "<div class='register-box'>
    <div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          <strong>ANDA HARUS LOGIN DULU!</strong>
          </div></div>";
      }
      if ($_GET['alert'] == 3) {
    echo "<div class='register-box'>
    <div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          <strong>USERNAME ATAU PASSWORD SALAH!</strong>
          </div></div>";
      }
  }


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.php"><b>Sistem</b>Penggajian</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Halo Selamat Datang...</p>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-11">
          <button type="button" class="btn btn-primary btn-block btn-flat margin" data-toggle="modal" href="#loginAdmin">Login Sebagai Admin</button>
        </div>
        
        <!-- /.col -->
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-11">
          <form action="loginPegawai.php">
          <button type="submit" class="btn btn-primary btn-block btn-flat margin" href="loginPegawai.php">Login Sebagai Pegawai</button>
        </div>
        </form>
        
        <!-- /.col -->
      </div>


  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- Modal -->
  <div class="modal fade" id="loginAdmin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">LOGIN ADMIN</h4>
          </div>
          <div class="modal-body">
            <!-- form start -->
            <form role="form" action="../proses/prosesLogin.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="text">Username</label>
                  <input type="input" class="form-control" name="username"  value="">
                  <label for="text">Password</label>
                  <input type="password" class="form-control" name="password"  value="">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">LOGIN</button>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>

    <!-- /.modal -->



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
