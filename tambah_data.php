<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DATA MAHASISWA</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
        * {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f5f5; 
        }

        h1 {
            text-transform: uppercase;
            color: #338a94;
            font-size: 30px;
            margin: 1%;
        }

        .base {
            width: 400px;
            height: fit-content;
            padding: 25px; 
            margin: 10px auto;
            background-color: #f5f5f5; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #008080; 
            text-align: center;
        }

        label {
            margin-top: 2px;
            display: block; 
            color: #338a94; 
            font-size: 14px;
            text-align: left;
        }

        select,
        input {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 7px;
            width: 100%;
            box-sizing: border-box;
            background-color: #fff;
            border: 2px solid #ccc;
            outline-color: #338a94;
            border-radius: 8px;
            font-size: 13px;
        }

        button {
            background-color: #338a94;
            color: #fff;
            padding: 12px;
            font-size: 13px; 
            border: 0;
            border-radius: 8px;
            cursor: pointer; 
            font-weight: bold;
            margin-top: 20px;
            
        }

        button:hover {
            background-color: orange; 
        }

    </style>
</head>
<body>
    <center><h1>Tambah Data</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>NIM</label>
            <input type="text" name="nim" required="" />
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" required="" />
        </div>
        <div>
            <label>Nama</label>
            <input type="text" name="nama" required="" />
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
            <option value="">--Jenis Kelamin--</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div>
        <label>Fakultas</label>
        <select name="fakultas" class="form-control" onchange="showProdi(this)">
            <option value="">--Fakultas--</option>
            <option value="Teknik">Teknik</option>
            <option value="Kedokteran">Kedokteran</option>
            <option value="Vokasi">Vokasi</option>
            <option value="Ilmu Sosial & Hukum">Ilmu Sosial & Hukum</option>
            <option value="Bahasa & Seni">Bahasa dan Seni</option>
            <option value="Pendidikan">Pendidikan</option>
            <option value="MIPA">MIPA</option>
            <option value="Pascarjana">Pascarjana</option>
        </select>
</div>
<div>
<div>
    <label>Prodi</label>
    <select name="prodi" class="form-control" id="prodi">
    </select>
</div>
<script>
    function showProdi(selectElement) {
        var fakultasSelect = selectElement;
        var prodiSelect = document.getElementById("prodi");
        var selectedFakultas = fakultasSelect.value;

        prodiSelect.innerHTML = "";

        var prodiList = [];
        switch (selectedFakultas) {
            case "Teknik":
                prodiList = ["S1 Teknik Informatika", "S1 Teknik Sipil", "S1 Teknik Elektro"];
                break;
            case "Kedokteran":
                prodiList = ["S1 Kedokteran", "S1 Farmasi", "S1 Gizi"];
                break;
            case "Vokasi":
                prodiList = ["D4 Manajemen Informatika", "D4 Teknik Mesin", "D4 Tata Boga"];
                break;
            case "Ilmu Sosial & Hukum":
                prodiList = ["S1 Hukum", "S1 Sosiologi", "S1 Geografi"];
                break;
            case "Bahasa & Seni":
                prodiList = ["S1 Sastra Indonesia", "S1 Seni Budaya", "S1 Sastra Jerman"];
                break;
            case "Pendidikan":
                prodiList = ["S1 PGSD", "S1 Pendidikan Luar Biasa", "S1 Pendidikan Matematika"];
                break;
            case "MIPA":
                prodiList = ["S1 Biologi", "S1 Matematika", "S1 Sains Data"];
                break;
            case "Pascarjana":
                prodiList = ["S2 PSikologi", "S2 Pendidikan Matematika", "S3 Fisika"];
                break;
            default:
                break;
        }

        addProdiOptions(prodiSelect, prodiList);
    }

    function addProdiOptions(selectElement, prodiList) {
        for (var i = 0; i < prodiList.length; i++) {
            var option = document.createElement("option");
            option.value = prodiList[i];
            option.text = prodiList[i];

            selectElement.add(option);
        }
    }
</script>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat"  required="" />
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email"  required="" />
        </div>
        <div>
            <button type="submit">Simpan Data</button>
        </div>
    </section>
    </form>
</body>
</html>