<?php include 'koneksi.php';

  if (isset($_GET['id'])) {
    $nim = ($_GET["id"]);
    $query = "SELECT * FROM tbmahasiswa WHERE nim='$nim'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data .');window.location='index.php';</script>";
  }         
  ?>

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
            font-size: 13px;
            text-align: left;
        }

        select,
        input {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
            background-color: #fff;
            border: 2px solid #ccc;
            outline-color: #338a94;
            border-radius: 8px;
            font-size: 12px;
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
        }

        button:hover {
            background-color: orange; 
        }
    </style>
</head>
<body>
    <center><h1>Edit Data <?php echo $data['nama']; ?></h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
        <input name="nim" value="<?php echo $data['nim']; ?>"  hidden />
        <div>
            <label>NIM</label>
            <input type="text" name="nim" required="" value="<?php echo $data['nim']; ?>"/>
        </div>
        <div>
            <label>Foto</label>
            <img src="gambar/<?php echo $data['foto']; ?>" style="width: 100px; float: left; margin-bottom: 5px;">
            <input type="file" name="foto"/>
        </div>
        <div>
            <label>Nama</label>
            <input type="text" name="nama" autofocus="" required="" value="<?php echo $data['nama']; ?>" />
            <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>">
        </div>
        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
            <option value="">--Jenis Kelamin--</option>
            <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
            </select>
        </div>
        <div>
    <label>Fakultas</label>
    <select name="fakultas" class="form-control" onchange="showProdi(this)" value="<?php echo $data['fakultas']; ?>">
        <option value="">--Fakultas--</option>
        <option value="Teknik" <?php if($data['fakultas'] == 'Teknik') echo 'selected="selected"'; ?>>Teknik</option>
        <option value="Kedokteran" <?php if($data['fakultas'] == 'Kedokteran') echo 'selected="selected"'; ?>>Kedokteran</option>
        <option value="Vokasi" <?php if($data['fakultas'] == 'Vokasi') echo 'selected="selected"'; ?>>Vokasi</option>
        <option value="Ilmu Sosial & Hukum" <?php if($data['fakultas'] == 'Ilmu Sosial & Hukum') echo 'selected="selected"'; ?>>Ilmu Sosial & Hukum</option>
        <option value="Bahasa & Seni" <?php if($data['fakultas'] == 'Bahasa & Seni') echo 'selected="selected"'; ?>>Bahasa dan Seni</option>
        <option value="Pendidikan" <?php if($data['fakultas'] == 'Pendidikan') echo 'selected="selected"'; ?>>Pendidikan</option>
        <option value="MIPA" <?php if($data['fakultas'] == 'MIPA') echo 'selected="selected"'; ?>>MIPA</option>
        <option value="Pascarjana" <?php if($data['fakultas'] == 'Pascarjana') echo 'selected="selected"'; ?>>Pascarjana</option>
    </select>
</div>
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

        addProdiOptions(prodiSelect, prodiList, "<?php echo $data['prodi']; ?>");
    }

    function addProdiOptions(selectElement, prodiList, selectedProdi) {
        for (var i = 0; i < prodiList.length; i++) {
            var option = document.createElement("option");
            option.value = prodiList[i];
            option.text = prodiList[i];

            if (prodiList[i] === selectedProdi) {
                option.selected = true;
            }

            selectElement.add(option);
        }
    }
    showProdi(document.querySelector("[name='fakultas']"));
</script>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat"  required="" value="<?php echo $data['alamat']; ?>"/>
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email"  required="" value="<?php echo $data['email']; ?>" />
        </div>
        <div>
            <br>
            <button type="submit">Simpan Perubahan</button>
        </div>
    </section>
    </form>
</body>
</html>