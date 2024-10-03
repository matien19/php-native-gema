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
  $halaman = 'data_jurusan';

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
            <h1 class="m-0">Data Jurusan</h1>
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
            <div class="card">
              <div class="card-header" style="background-color:#000435;">
              <font color="#ffffff"><h3 class="card-title"><i class="fas fa-user"></i> Data Jurusan</h3></font>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="tambahpengguna.php" class="btn btn-md btn-default" role="button" style="background-color: #000435;"><font color="#ffffff"><i class="fas fa-plus"></i>  Tambah data</a></font>
              -->
              <button type="button" class="btn btn-md btn-default" data-toggle="modal" data-target="#modal-tambah"  style="background-color: #000435;"><font color="#ffffff"><i class="fas fa-plus"></i> Tambah data </font></button>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%"><center>No</center></th>
                    <th width="15%">Kode Jurusan</th>
                    <th>Nama Jurusan</th>
                    
                    <th><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql_jurusan = mysqli_query($con, "SELECT * FROM tbl_jurusan")or die(mysqli_error($con));

                    if (mysqli_num_rows($sql_jurusan) > 0 ) {
                        while ($data = mysqli_fetch_array($sql_jurusan)) {
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['kode_jurusan'];?></td>
                                <td><?= $data['nama_jurusan'];?></td>
                                
                                <td>
                                  <center>
                               
                                <a href="hapus.php?kode_jurusan=<?=$data['kode_jurusan']?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit" data-kodejurusan="<?= $data['kode_jurusan'];?>" data-nama="<?= $data['nama_jurusan'];?>"
                                
                                ><i class="fas fa-edit"></i> Edit</button>
                                </center>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        echo '<tr><td colspan="7" align="center"> Tidak Ada Data Ditemukan</td></tr>';
                      }
                   
                    ?>

                  </tbody>

                </table>
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


<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #000435;">
        <h5 class="modal-title"> <font color="#ffffff"><i class="fas fa-plus"></i> Tambah Data Jurusan </font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="tambah.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="kd_jurusan">Kode Jurusan</label>
          <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" required autofocus>
        </div>
        <div class="form-group">
          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
        </div>
        
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-warning" name="simpan"><i class="fas fa-download"></i>  Simpan Data</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #000435;">
        <h5 class="modal-title"> <font color="#ffffff"><i class="fas fa-edit"></i> Edit Data Jurusan </font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="edit.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="kode_jurusan">Kode Jurusan</label>
          <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" disabled>
          <input type="text" class="form-control" id="kode_jurusan2" name="kode_jurusan" hidden>
        </div>
        <div class="form-group">
          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
        </div>
      
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-warning" name="edit"><i class="fas fa-sync"></i>  Edit Data</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
include '../script.php';
?>
      
      


<script type="text/javascript">
  $('#modal-edit').on('show.bs.modal' , function (e) {
    var kode_jurusan   = $(e.relatedTarget).data('kodejurusan');
    var nama_jurusan   = $(e.relatedTarget).data('nama');
   

    $(e.currentTarget).find('input[name="kode_jurusan"]').val(kode_jurusan);
    $(e.currentTarget).find('input[name="nama_jurusan"]').val(nama_jurusan);
    

  });

</script>
</body>
</html>
