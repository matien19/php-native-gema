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
  session_start();
  $halaman = 'data_pengguna';
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
            <h1 class="m-0">Data Pengguna</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <?php
              if (isset($con, $_POST['simpan'])) {
                $nip      = trim(mysqli_real_escape_string($con, $_POST['nip']));
                $nama     = trim(mysqli_real_escape_string($con, $_POST['nama']));
                $user     = trim(mysqli_real_escape_string($con, $_POST['user']));
                $pass     = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));

                $cekdata  = mysqli_query($con, "SELECT * FROM tbl_pengguna WHERE NIP='$nip'") or die (mysqli_error($con));

                if (mysqli_num_rows($cekdata) > 0) {
                    ?>
                    <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
                    <script>
                    swal("Error", "NIP sudah ada dalam database", "error");
                    
                    setTimeout(function(){ 
                    window.location.href = "../backoffice_data_pengguna";

                    }, 1000);
                    </script> 
                    <?php
                } else {
                    mysqli_query($con, "INSERT INTO tbl_pengguna VALUES ('$nip','$user','$pass','$nama')") or die (mysqli_error($con));
                    ?>
                    <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
                    <script>
                    swal("Berhasil", "Data Admin berhasil ditambah", "success");
                    
                    setTimeout(function(){ 
                    window.location.href = "../backoffice_data_pengguna";

                    }, 1000);
                    </script> 
                    <?php
                }
              }

              if (isset($con, $_POST['edit'])) {
                $nip  = trim(mysqli_real_escape_string($con, $_POST['nip2']));
                $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
                $user = trim(mysqli_real_escape_string($con, $_POST['user']));

                mysqli_query($con, "UPDATE tbl_pengguna SET nama='$nama', username='$user' WHERE NIP='$nip'")or die(mysqli_error($con));
                ?>

                <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
                <script>
                swal("Berhasil", "Data Admin berhasil diedit", "success");
                
                setTimeout(function(){ 
                window.location.href = "../backoffice_data_pengguna";

                }, 1000);
                </script> 
                <?php
              }
           ?>
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
      

</body>
</html>
