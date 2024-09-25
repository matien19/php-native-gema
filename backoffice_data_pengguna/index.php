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
            <div class="card">
              <div class="card-header" style="background-color:#000435;">
              <font color="#ffffff"><h3 class="card-title"><i class="fas fa-users"></i> Data Pengguna</h3></font>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="tambahpengguna.php" class="btn btn-md btn-default" role="button" style="background-color: #000435;"><font color="#ffffff"><i class="fas fa-plus"></i>  Tambah data</a></font>
              <button type="button" class="btn btn-md btn-default" data-toggle="modal" data-target="#modal-tambah"  style="background-color: #000435;"><font color="#ffffff"><i class="fas fa-plus"></i> Tambah data modal </font></button>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="20%">NIP</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql_panggilpengguna = mysqli_query($con, "SELECT * FROM tbl_pengguna")or die(mysqli_error($con));
                    if (mysqli_num_rows($sql_panggilpengguna) > 0) 
                    {
                      while($data = mysqli_fetch_array($sql_panggilpengguna))
                      {
                        ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $data['NIP'];?></td>
                          <td><?= $data['nama']?></td>
                          <td><?= $data['username'];?></td>
                          <td>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default" data-nip="<?= $data['NIP'];?>"><i class="fas fa-trash"></i>Hapus</button>
                          </td>
                        </tr>
                        <?php
                      }
                    }else{
                      echo '<tr><td colspan="4" align="center"> Tidak Ada Data Ditemukan</td></tr>';
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="hapuspengguna.php" role="form" class="form-layout" method="POST">
        <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
            <p><b>Apakah anda akan menghapus data?</b></p>

          </div>
        <input type="text" name="nip_pengguna" id="nip" hidden>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fas fa-times"></i> Batalkan</button>
        <button type="submit" class="btn btn-danger btn-md" >Ya, Hapus Data</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #000435;">
        <h4 class="modal-title"> <font color="#ffffff"><i class="fas fa-plus"></i> Tambah Data Pengguna </font></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="proses.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip" required autofocus>
        </div>
        <div class="form-group">
          <label for="user">Nama User</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="user">Username</label>
          <input type="text" class="form-control" id="user" name="user" required>
        </div>
        <div class="form-group">
          <label for="passbaru">Ketik Password</label>
          <input type="password" class="form-control" id="passbaru" name="pass" placeholder="Password" required >
        </div>
        
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="simpan"><i class="fas fa-download"></i>  Simpan Data</button>
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
  $('#modal-default').on('show.bs.modal' , function (e) {
    var nip = $(e.relatedTarget).data('nip');

    $(e.currentTarget).find('input[name="nip_pengguna"]').val(nip);

  });

</script>
</body>
</html>
