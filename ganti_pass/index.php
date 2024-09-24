<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | PT TMI</title>
  <link rel="shortcut icon" href="../auth/assets/img/logo.png">
  <?php
  include '../list_head_link.php';
  require_once '../database/config.php';
  $halaman = 'ganti_pass';
  session_start();
  ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"  style="background-color:#D6B70A;">
   <?php
   include '../navigasi_atas.php';
   ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4" style="background-color:#000435;">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="../auth/assets/img/logo.png" alt="TMI Logo" class="brand-image">
      <span class="brand-text font-weight-light">P.T TMI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <?php
    include '../sidebar.php';
    ?>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ganti Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header" style="background-color:#000435;">
              <font color="#ffffff"><h3 class="card-title"><i class="fas fa-lock"></i> Ganti Password</h3></font>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="gantipw.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $_SESSION['nip'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="user">Nama User</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['nama'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="user">Username</label>
                    <input type="text" class="form-control" id="user" name="user" value="<?= $_SESSION['user'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="passbaru">Ketik Password Baru</label>
                    <input type="password" class="form-control" id="passbaru" name="passbaru" placeholder="Password Baru" required autofocus>
                  </div>
                  <button type="submit" class="btn btn-primary btn-md btn-block" name="updatepw"><i class="fas fa-sync"></i>  Ganti Password</button>
              </form>
              </div>
                  <!-- /.card-body -->
             </div>
                <!-- /.card -->
           </div>
         </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
   <?php
   include '../footer.php';
   ?>
</div>
<!-- ./wrapper -->
<?php
include '../script.php';
?>
    
</script>
</body>
</html>
