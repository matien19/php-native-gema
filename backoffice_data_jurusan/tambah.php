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
<?php
if (isset($_POST['simpan'])){
    $kd_jurusan = trim(mysqli_real_escape_string($con,$_POST['kd_jurusan']));
    $nama_jurusan = trim(mysqli_real_escape_string($con,$_POST['nama_jurusan']));

    $qrchek = mysqli_query($con,"SELECT * FROM tbl_jurusan WHERE kode_jurusan = '$kd_jurusan' OR nama_jurusan='$nama_jurusan'")or die(mysqli_error($con));
    if(mysqli_num_rows($qrchek)==0){
        $queryinput = mysqli_query($con,"INSERT INTO tbl_jurusan VALUES('$kd_jurusan','$nama_jurusan')")or die(mysqli_error($con));
        echo '
        <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
        <script>
        swal("Berhasil !", "Data Berhasil di tambahkan", "success");

        setTimeout(function(){ 
        window.location.href = "../backoffice_data_jurusan";

        }, 1500);
        </script> 
        ';
    }else{
        echo '
        <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
        <script>
        swal("Perhatian !", "Data yang anda inputkan sudah ada", "warning");

        setTimeout(function(){ 
        window.location.href = "../backoffice_data_jurusan";

        }, 1500);
        </script> 
        ';
    }
}else{
    echo "yyyy";
}
?>
 
</body>
</html>
