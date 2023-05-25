<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h3 {
            color: #333;
        }

        form {
            width: 300px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
         
        }

        table td:first-child {
            width: 120px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h3>Update Data Buku</h3>

    <?php
    $kode = $_GET['code'];

    // Cari buku berdasarkan kode buku
    $file = file("data_buku.txt");
    foreach ($file as $line) {
        $buku = explode("-", $line);
        if ($buku[0] == $kode) {
            break;
        }
    }
    ?>

    <form action="edit.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><br>Kode</td>
                <td><br>:</td>
                <td><input type="text" name="kode" value="<?php echo $buku[0]; ?>"></td>
            </tr>
            <tr>
                <td><br>Judul</td>
                <td><br>:</td>
                <td><br><input type="text" name="judul" value="<?php echo $buku[1]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Pengarang</td>
                <td><br>:</td>
                <td><br><input type="text" name="pengarang" value="<?php echo $buku[2]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Tahun Terbit</td>
                <td><br>:</td>
                <td><br><input type="text" name="tahun" value="<?php echo $buku[3]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Jumlah Halaman</td>
                <td><br>:</td>
                <td><br><input type="text" name="halaman" value="<?php echo $buku[4]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Penerbit</td>
                <td><br>:</td>
                <td><br><input type="text" name="penerbit" value="<?php echo $buku[5]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Genre Buku</td>
                <td><br>:</td>
                <td><br><input type="text" name="genre" value="<?php echo $buku[6]; ?>" required></td>
            </tr>
            <tr>
                <td><br>Cover Buku</td>
                <td><br>:</td>
                <td><br><input type="file" name="cover" value="<?php echo $buku[7]; ?>" required></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
                <td style="text-align: right"><br><input type="submit" name="update_book" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
