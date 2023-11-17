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
            background-color: #e7e7e7;
        }

        h1 {
        text-transform: uppercase;
        color: #fff;
        font-size: 40px;
        background-color: #338a94; 
        padding: 7px;
        }


        table {
            border: 3px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 93%;
            margin: 10px auto 10px auto;
        }

        table thead th {
            background-color: #338a94;
            border: 3px solid #ddeeee;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        table tbody td {
            border: 3px solid #ddeeee;
            color: #333;
            padding: 10px;
            text-align: center;
            font-size: 13px;
            background-color: #fff;
        }

        a {
            background-color: #338a94;
            color: #fff;
            padding: 10px;
            font-size: 13px;
            text-decoration: none;
            border-radius: 0.8rem;
            font-weight: bold;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        a:hover {
            background-color: orange;
            color: #fff;
        }

        @media only screen and (max-width: 768px) {
            h1 {
                font-size: 30px;
            }

            table {
                width: 80%;
            }

            table thead th,
            table tbody td {
                font-size: 12px;
            }
        }

    </style>
</head>
<body>
    <center><h1>DATA MAHASISWA</h1></center>
    <center><a href="tambah_data.php">+&nbsp;Tambah Data</a></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM tbmahasiswa ORDER BY nim ASC";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>                
                <td><?php echo $row['nim']; ?> </td>
                <td><img style="width: 80px;" src="gambar/<?php echo $row['foto']; ?>"></td>
                <td><?php echo $row['nama']; ?> </td>
                <td><?php echo $row['jenis_kelamin']; ?> </td>
                <td><?php echo $row['fakultas']; ?> </td>
                <td><?php echo $row['prodi']; ?> </td>
                <td><?php echo $row['alamat']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td>
                    <a href="edit_data.php?id=<?php echo $row['nim']; ?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['nim']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>