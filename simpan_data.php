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
            background-color: #f2f2f2;
            padding: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        a.button {
            padding: 8px 12px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        a.button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Tambah Data Buku</h3>

        <?php
        // Fungsi untuk menambah data buku
        function addBook($book)
        {
            $file = 'data_buku.txt';
            $handle = fopen($file, 'a');

            if ($handle) {
                fwrite($handle, implode(' - ', $book) . PHP_EOL);
                fclose($handle);
                echo "<b><p>Data buku berhasil ditambahkan.</p></b>";
            } else {
                echo "<b><p>Gagal menambahkan data buku.</p></b>";
            }
        }

        // Form untuk menambah data buku
        if (isset($_POST['add_book'])) {
            $bookToAdd = [
                $_POST['kode'],
                $_POST['judul'],
                $_POST['pengarang'],
                $_POST['tahun'],
                $_POST['halaman'],
                $_POST['penerbit'],
                $_POST['genre'],
                $_FILES['cover']['name']
            ];

            $targetDir = 'uploads/';

            // Buat direktori 'uploads' jika belum ada
            if (!is_dir($targetDir)) {
                mkdir($targetDir);
            }

            $targetFile = $targetDir . basename($_FILES['cover']['name']);
            $uploadSuccess = move_uploaded_file($_FILES['cover']['tmp_name'], $targetFile);

            if ($uploadSuccess) {
                addBook($bookToAdd);
            } else {
                echo "<p>Gagal mengupload file cover.</p>";
            }
        }
        ?>
        <div class="back-link">
            <a href="form_insert.php" class="button">Tambah Data</a>
        </div>

        <div class="back-link">
            <a href="baca_data.php" class="button">Lihat Data Buku</a>
        </div>
    </div>
</body>

</html>













