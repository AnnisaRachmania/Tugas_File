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
        }

        h3 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        td:first-child {
            text-align: right;
            width: 120px;
        }

        td:nth-child(2) {
            text-align: center;
            width: 20px;
        }

        td:nth-child(3) {
            width: 200px;
        }
    </style>
</head>

<body>
    <h3>Input Data Buku</h3>
    <form action="simpan_data.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Kode Buku</td>
                <td>:</td>
                <td><input type="text" name="kode" required></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang" required></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td>:</td>
                <td><input type="text" name="tahun" required></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td>:</td>
                <td><input type="text" name="halaman" required></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" required></td>
            </tr>
            <tr>
                <td>Genre Buku</td>
                <td>:</td>
                <td><input type="text" name="genre" required></td>
            </tr>
            <tr>
                <td>Cover Buku</td>
                <td>:</td>
                <td><input type="file" name="cover" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right"><input type="submit" name="add_book" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>

</html>


