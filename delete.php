<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Buku</title>
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

        p {
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        a.button {
            padding: 8px 12px;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        a.button:hover {
            background-color: #d32f2f;
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
        <h3>Hapus Data Buku</h3>

        <?php
        function deleteBook($bookCode)
        {
            $file = 'data_buku.txt';
            $tempFile = 'temp.txt';
            $handle = fopen($file, 'r');
            $tempHandle = fopen($tempFile, 'w');

            if ($handle && $tempHandle) {
                while (($line = fgets($handle)) !== false) {
                    $bookData = explode(' - ', $line);
                    if ($bookData[0] !== $bookCode) {
                        fwrite($tempHandle, $line);
                    }
                }

                fclose($handle);
                fclose($tempHandle);

                // Ganti file asli dengan file temporer yang sudah diubah
                rename($tempFile, $file);

                echo "<b><p>Data buku berhasil dihapus.</p></b>";
            } else {
                echo "<b><p>Gagal menghapus data buku.</p></b>";
            }
        }

        if (isset($_GET['code'])) {
            $bookCodeToDelete = $_GET['code'];

            deleteBook($bookCodeToDelete);
        }

        // Pemrosesan penghapusan data buku
        if (isset($_POST['delete_book'])) {
            $bookCodeToDelete = $_POST['book_code'];

            deleteBook($bookCodeToDelete);
        }

        echo '<a href="baca_data.php" class="button">Kembali ke Data Buku</a>';
        ?>

    </div>
</body>

</html>
