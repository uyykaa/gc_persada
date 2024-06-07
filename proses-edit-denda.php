<?php
include('koneksi.php');

$no_denda = $_POST['no_denda'];
$nama_denda = $_POST['nama_denda'];
$tgl_denda = $_POST['tgl_denda'];
$jumlah_denda = $_POST['jumlah_denda'];

$query = mysqli_query($koneksi, "UPDATE denda SET nama_denda='$nama_denda', tgl_denda='$tgl_denda', jumlah_denda='$jumlah_denda' WHERE no_denda='$no_denda'");

if ($query) {
    header("location: denda.php"); 
} else {
    echo "ERROR, data gagal diupdate: " . mysqli_error($koneksi);
}
?>
