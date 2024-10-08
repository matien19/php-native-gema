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
            <div class="card">
              <div class="card-header" style="background-color:#000435;">
              <font color="#ffffff"><h3 class="card-title"><i class="fas fa-user"></i> Data Dosen</h3></font>
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
                    <th width="15%">NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                    <th>Kelamin</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql_mahasiswa = mysqli_query($con, "SELECT * FROM tbl_mahasiswa")or die(mysqli_error($con));

                    if (mysqli_num_rows($sql_mahasiswa) > 0 ) {
                        while ($data = mysqli_fetch_array($sql_mahasiswa)) {
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['nim'];?></td>
                                <td><?= $data['nama'];?></td>
                                <td>
                                <?php
                                $kode_jurusan = $data['jurusan'];
                                $sqljurusan = mysqli_query($con,"SELECT * FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'")or die(mysqli_error($con));
                                $dt_jurusan = mysqli_fetch_assoc($sqljurusan);
                                $nama_jurusan = $dt_jurusan['nama_jurusan'];
                                ?>    
                                <?= $nama_jurusan;?></td>
                                <td>
                                    <?php
                                    $kode_kelamin = $data['kelamin'];
                                    if($kode_kelamin=="L"){
                                        $kelamin = "Laki-laki";
                                    }else{
                                        $kelamin = "Perempuan";
                                    }
                                    ?>
                                    <?=$kelamin;?>
                                </td>
                                <td><?= $data['kontak'];?></td>
                                <td>
                                <?php
                                $id_status = $data['status'];
                                $sqlstatus = mysqli_query($con,"SELECT * FROM tbl_status WHERE id_status='$id_status'")or die(mysqli_error($con));
                                $dt_status = mysqli_fetch_assoc($sqlstatus);
                                $status = $dt_status['keterangan'];
                                if($id_status==1){
                                    $warnabtn = "btn-success";
                                }else if($id_status==2){
                                    $warnabtn = "btn-danger";
                                }else if($id_status==3){
                                    $warnabtn = "btn-warning";
                                }else if($id_status==4){
                                    $warnabtn = "btn-secondary";
                                }else if($id_status==5){
                                    $warnabtn = "btn-info";
                                }
                                ?> 
                                <button class="btn btn-sm <?=$warnabtn?>"><?= $status;?></td></button>
                                <!-- <td>
                                    <?php
                                    // $stat = $data['status'];
                                    
                                    // if ($stat == 'Y') {
                                    //     echo '<button type="button" class="btn btn-sm btn-success">Aktif</button>';
                                    // } else {
                                    //     echo '<button type="button" class="btn btn-sm btn-danger">Tidak Aktif</button>';
                                    // }
                                    
                                    ?>

                                </td> -->
                                <td>
                                  <center>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default"  ><i class="fas fa-trash"></i>Hapus</button>

                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit"
                               
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="hapus.php" role="form" class="form-layout" method="POST">
        <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
            <p><b>Apakah anda akan menghapus data?</b></p>

          </div>
        <input type="text" name="nidn" id="nidn" hidden>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fas fa-times"></i> Batalkan</button>
        <button type="submit" class="btn btn-danger btn-md" name="hapus">Ya, Hapus Data</button>
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
        <h5 class="modal-title"> <font color="#ffffff"><i class="fas fa-plus"></i> Tambah Data Mahasiswa </font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="tambah.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="number" class="form-control" id="nim" name="nim" required autofocus>
        </div>
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select name="jurusan" id="" class="form-control" required>
            <option value="">--pilih jurusan--</option>
            <?php
            $qrjurusan = mysqli_query($con,"SELECT * FROM tbl_jurusan")or die(mysqli_error($con));
            while($data_jurusan = mysqli_fetch_array($qrjurusan)){
                ?>
                    <option value="<?=$data_jurusan['kode_jurusan']?>"><?=$data_jurusan['nama_jurusan']?></option>
                <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="kelamin">Kelamin</label>
          <select name="kelamin" id="" class="form-control" required>
          <option value="">--pilih kelamin--</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="number" class="form-control" id="kontak" name="kontak" required >
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="" class="form-control" required>
            <option value="">--pilih status--</option>
            <?php
            $qrstatus = mysqli_query($con,"SELECT * FROM tbl_status")or die(mysqli_error($con));
            while($data_status = mysqli_fetch_array($qrstatus)){
                ?>
                    <option value="<?=$data_status['id_status']?>"><?=$data_status['keterangan']?></option>
                <?php
            }
            ?>
          </select>
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
        <h5 class="modal-title"> <font color="#ffffff"><i class="fas fa-edit"></i> Edit Data Dosen </font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="edit.php" role="form" class="form-layout" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="nidn">NIDN</label>
          <input type="number" class="form-control" id="nidn" name="nidn" disabled>
          <input type="number" class="form-control" id="nidn" name="nidn2" hidden>
        </div>
        <div class="form-group">
          <label for="nama">Nama Dosen</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="number" class="form-control" id="kontak" name="kontak" required >
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status"  class="form-control" required>
            <option value=""> -- Pilih Status -- </option>
            <option value="Y"> Aktif </option>
            <option value="N"> Tidak Aktif </option>
          </select>
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
  $('#modal-default').on('show.bs.modal' , function (e) {
    var nidn = $(e.relatedTarget).data('nidn');

    $(e.currentTarget).find('input[name="nidn"]').val(nidn);

  });

</script>

<script type="text/javascript">
  $('#modal-edit').on('show.bs.modal' , function (e) {
    var nidn   = $(e.relatedTarget).data('nidn');
    var nama   = $(e.relatedTarget).data('nama');
    var email  = $(e.relatedTarget).data('email');
    var kontak = $(e.relatedTarget).data('kontak');
    var status = $(e.relatedTarget).data('status');

    $(e.currentTarget).find('input[name="nidn"]').val(nidn);
    $(e.currentTarget).find('input[name="nidn2"]').val(nidn);
    $(e.currentTarget).find('input[name="nama"]').val(nama);
    $(e.currentTarget).find('input[name="email"]').val(email);
    $(e.currentTarget).find('input[name="kontak"]').val(kontak);
    $(e.currentTarget).find('select[name="status"]').val(status);

  });

</script>
</body>
</html>
