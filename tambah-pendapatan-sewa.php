<?php
require 'koneksi.php';

// Retrieve the variables from the POST request
$id_pendapatan = $_POST['id_pendapatan'];
$nama_akun = $_POST['nama_akun'];
$nama = $_POST['nama'];
$tgl_pendapatan = $_POST['tgl_pendapatan'];
$no_pendapatan = $_POST['no_pendapatan'];  // Assuming this is also sent via POST

// Initialize the total amount
$total_jumlah = 0;

// Query to calculate total denda and sewa
$query = "SELECT SUM(denda.jumlah) AS total_denda, SUM(sewa.jumlah) AS total_sewa
          FROM denda
          JOIN sewa_kendaraan AS sewa ON denda.id_sewa = sewa.id_sewa
          WHERE sewa.no_pendapatan = '$no_pendapatan' AND sewa.tgl_pendapatan = '$tgl_pendapatan'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_jumlah = $row['total_denda'] + $row['total_sewa'];
} else {
    echo "ERROR, gagal menghitung total jumlah: " . mysqli_error($koneksi);
    exit;
}

// Insert the data into pendapatan_sewa table
$query = "INSERT INTO pendapatan_sewa (id_pendapatan, nama_akun, nama, tgl_pendapatan, jumlah_pendapatan)
          VALUES ('$id_pendapatan', '$nama_akun', '$nama', '$tgl_pendapatan', '$total_jumlah')";

if (mysqli_query($koneksi, $query)) {
    // Redirect to pendapatan-sewa.php
    header("Location: pendapatan-sewa.php");
} else {
    // Show an error message if the query failed
    echo "ERROR, data gagal ditambahkan: " . mysqli_error($koneksi);
}
?>