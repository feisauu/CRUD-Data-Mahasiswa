<?php
include 'koneksi.php';

$nim = $_POST["nim"];
$foto = $_FILES["foto"]["name"];
$nama = $_POST["nama"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$fakultas = $_POST["fakultas"];
$prodi = $_POST["prodi"];
$alamat = $_POST["alamat"];
$email = $_POST["email"];

if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        $query  = "UPDATE tbmahasiswa SET foto = '$nama_gambar_baru', nama = '$nama', jenis_kelamin = '$jenis_kelamin', fakultas = '$fakultas', prodi = '$prodi', alamat = '$alamat', email = '$email'";
        $query .= " WHERE nim = '$nim'";
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg, dan jpeg.');window.location='tambah_data.php';</script>";
        exit;
    }
} else {
    $query  = "UPDATE tbmahasiswa SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', fakultas = '$fakultas', prodi = '$prodi', alamat = '$alamat', email = '$email'";
    $query .= " WHERE nim = '$nim'";
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
?>
