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
  $halaman = 'data_mahasiswa';

 if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status != 0 ) {
      echo '<script>window.location = "../auth/logout.php" </script>';
    }
  }else {
    echo '<script>window.location = "../auth/logout.php" </script>';
  }


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
            <h1 class="m-0">Data Dosen</h1>
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
                $nim   = trim(mysqli_real_escape_string($con, $_POST['nim']));
                $nama   = trim(mysqli_real_escape_string($con, $_POST['nama']));
                $jurusan  = trim(mysqli_real_escape_string($con, $_POST['jurusan']));
                $kelamin  = trim(mysqli_real_escape_string($con, $_POST['kelamin']));
                $kontak = trim(mysqli_real_escape_string($con, $_POST['kontak']));
                $status = trim(mysqli_real_escape_string($con, $_POST['status']));
                $pass   = sha1($nim);
                $stat   = 2; 

                $sql_cek = mysqli_query($con, "SELECT nim FROM tbl_mahasiswa WHERE nim='$nim'")or die(mysqli_error($con));

                if (mysqli_num_rows($sql_cek) > 0) {
                    echo '
                    <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
                    <script>
                    swal("Perhatian !", "Data mahasiswa dengan NIM '.$nim.' sudah ada", "warning");
        
                    setTimeout(function(){ 
                    window.location.href = "../backoffice_data_mahasiswa";
        
                    }, 1500);
                    </script> 
                    ';
                }else {
                    mysqli_query($con, "INSERT INTO tbl_mahasiswa VALUES ('$nim','$nama','$kontak','$kelamin','$jurusan','$status')")or die(mysqli_error($con));

                    mysqli_query($con, "INSERT INTO tbl_pengguna VALUES ('$nim','$nim','$pass','$nama','$stat')")or die(mysqli_error($con));

                    echo '
                    <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
                    <script>
                    swal("Berhasil", "Data Mahasiswa Berhasil ditambah", "success");
        
                    setTimeout(function(){ 
                    window.location.href = "../backoffice_data_mahasiswa";
        
                    }, 1000);
                    </script> 
                    ';
                }
            
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
