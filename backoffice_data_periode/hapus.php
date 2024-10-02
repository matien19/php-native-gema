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
if (isset($_POST['hapus'])){
    $kd_periode = trim(mysqli_real_escape_string($con,$_POST['kode_periode']));


        $queryhapus = mysqli_query($con,"DELETE FROM tbl_periode WHERE kode_periode='$kd_periode'")or die(mysqli_error($con));
        echo '
        <script src="../assets_adminlte/dist/js/sweetalert.min.js"></script>
        <script>
        swal("Berhasil !", "Data Berhasil di edit", "success");

        setTimeout(function(){ 
        window.location.href = "../backoffice_data_periode";

        }, 1500);
        </script> 
        ';
   
}
?>
 
</body>
</html>
