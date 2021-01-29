<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../asset/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <form action="../login/logoutAdmin.php?pesan=1">
      <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-left "></i> Logout</button>
    </form>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../index.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../karyawan/register.php"><i class="fa fa-circle-o"></i> Register Karyawan</a></li>
            <li><a href="../karyawan/karyawan.php"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sistem Gaji</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="gaji.php"><i class="fa fa-circle-o"></i> Gaji Karyawan</a></li>
            <li><a href="potongan.php"><i class="fa fa-circle-o"></i> Potongan</a></li>
            <li><a href="tunjangan.php"><i class="fa fa-circle-o"></i> Tunjangan</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Absen Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="absenKaryawan.php"><i class="fa fa-circle-o"></i> Absen Karyawan</a></li>
            <li><a href="dataAbsen.php.php"><i class="fa fa-circle-o"></i> Data Absen</a></li>
            </ul>
        </li>
      </ul>
        
    </section>