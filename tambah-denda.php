<?php
require 'koneksi.php';

$no_denda = $_POST['no_denda'];
$id_sewa = $_POST['id_sewa'];
$nama_denda = $_POST['nama_denda'];
$tgl_denda = $_POST['tgl_denda'];
$jumlah_denda = $_POST['jumlah_denda'];

$query = "INSERT INTO denda (no_denda, id_sewa, nama_denda, tgl_denda, jumlah_denda) VALUES ('$no_denda', '$id_sewa', '$nama_denda', '$tgl_denda', '$jumlah_denda')";

if (mysqli_query($koneksi, $query)) {
    header("location: denda.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>