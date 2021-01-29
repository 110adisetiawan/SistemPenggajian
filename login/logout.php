<?php
session_start();
session_destroy();
header("location:../login/loginPegawai.php?pesan=2");
?>