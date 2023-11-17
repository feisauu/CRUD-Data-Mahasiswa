<?php
include("koneksi.php");

$nim = $_POST["nim"];
$foto = $_FILES["foto"]["name"];
$nama = $_POST["nama"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$fakultas = $_POST["fakultas"];
$prodi = $_POST["prodi"];
$alamat = $_POST["alamat"];
$email = $_POST["email"];


if($foto != ""){
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak. '-'.$foto;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        $query = "INSERT INTO tbmahasiswa (nim, foto, nama, jenis_kelamin, fakultas, prodi, alamat, email) VALUES ('$nim', '$nama_gambar_baru', '$nama', '$jenis_kelamin', '$fakultas', '$prodi', '$alamat', '$email')";
        $result = mysqli_query($koneksi, $query);
        
        if (!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa png, jpg, dan jpeg');window.location='tambah_data.php';</script>";
    }
} else {
    $query = "INSERT INTO tbmahasiswa (nim, nama, jenis_kelamin, prodi, fakultas, alamat, email) VALUES ('$nim','$nama', '$jenis_kelamin', '$fakultas', '$alamat', '$email')";
    $result = mysqli_query($koneksi, $query);
    
    if (!$result) {
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php';</script>";
    }
}
?>
