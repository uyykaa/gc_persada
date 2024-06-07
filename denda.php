<?php
session_start();
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIA KAS GC PERSADA</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
<?php 
require 'sidebar.php';
?>
<div id="content">
  <?php require 'navbar.php'; ?>
  <div class="container-fluid">
    <button type="button" class="btn btn-success" style="margin:5px; visibility:<?=$lihat?>" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Denda</i></button><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Denda</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No </th>
                <th>Id sewa</th>
                <th>Nama Pelanggan </th>
                <th>Nama Denda </th>
                <th>Tgl denda</th>
                <th>Jumlah Denda</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
              <?php 
              // Query untuk mengambil data denda
              $query = mysqli_query($koneksi, "SELECT denda.*, pelanggan.nama AS nama_pelanggan FROM denda 
                JOIN sewa_kendaraan ON denda.id_sewa = sewa_kendaraan.id_sewa
                JOIN pelanggan ON sewa_kendaraan.no_pelanggan = pelanggan.no_pelanggan");
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)) {
                // Hitung jumlah_denda denda
                $id_sewa = $data['id_sewa'];
                $harga_query = mysqli_query($koneksi, "SELECT mobil.harga FROM mobil INNER JOIN sewa_kendaraan ON mobil.id_mobil = sewa_kendaraan.id_mobil WHERE sewa_kendaraan.id_sewa = '$id_sewa'");
                $harga_mobil = mysqli_fetch_assoc($harga_query)['harga'];
                $jumlah_denda = $harga_mobil * 0.1; // 10% dari harga mobil
                
              ?>
                <tr>
                  <td><?=$data['no_denda']?></td>
                  <td><?=$data['id_sewa']?></td>
                  <td><?=$data['nama_pelanggan']?></td>
                  <td><?=$data['nama_denda']?></td>
                  <td><?=$data['tgl_denda']?></td>
                  <td><?=$jumlah_denda?></td>
                  <td>
                    <!-- Button modal -->
                    <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?=$data['no_denda']?>"></a>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?=$data['no_denda']?>" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Denda</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="proses-edit-denda.php" method="post">
                          <?php
                          $id = $data['no_denda']; 
                          $query_edit = mysqli_query($koneksi, "SELECT * FROM denda WHERE no_denda='$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                          ?>
                            <input type="hidden" name="no_denda" value="<?=$row['no_denda']?>">
                            <div class="form-group">
                              <label>Nama Denda</label>
                              <input type="text" name="nama_denda" class="form-control" value="<?=$row['nama_denda']?>">
                            </div>
                            <div class="form-group">
                              <label>Tgl Denda</label>
                              <input type="date" name="tgl_denda" class="form-control" value="<?=$row['tgl_denda']?>">
                            </div>
                            <div class="form-group">
                              <label>Jumlah Denda</label>
                              <input type="number" name="jumlah_denda" class="form-control" value="<?=$row['jumlah_denda']?>">
                            </div>
                            <div class="modal-footer">  
                              <button type="submit" class="btn btn-success">Ubah</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            </div>
                          <?php 
                          }
                          ?>  
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>  
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Tambah Denda -->
<div id="myModalTambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Denda</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- body modal -->
      <form action="tambah-denda.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>No Denda:</label>
            <input type="text" class="form-control" name="no_denda">
          </div>
          <div class="form-group">
            <label>Id Sewa:</label>
            <input type="text" class="form-control" name="id_sewa">
          </div>
          <div class="form-group">
            <label>Nama Denda:</label>
            <input type="text" class="form-control" name="nama_denda">
          </div>
          <div class="form-group">
            <label>Tgl Denda:</label>
            <input type="date" class="form-control" name="tgl_denda">
          </div>
          <div class="form-group">
            <label>Jumlah Denda:</label>
            <input type="number" class="form-control" name="jumlah_denda">
          </div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>
</html>