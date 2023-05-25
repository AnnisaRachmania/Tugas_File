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

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        td img {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            max-height: 150px;
        }

        .actions {
            text-align: center;
        }

        .actions a {
            margin-right: 5px;
            text-decoration: none;
            color: #000;
            padding: 5px 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .actions a:hover {
            background-color: #ddd;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
        }

        .add-data {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h3>Data Buku Perpustakaan Mentari</h3>
    <div class="add-data">
        <a href="form_insert.php">Tambah Data</a>
    </div>

    <?php
        // Fungsi untuk membaca data dari file
        function readData()
        {
            $file = 'data_buku.txt';
            $data = [];

            if (file_exists($file)) {
                $handle = fopen($file, 'r');

                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                        $data[] = explode('-', $line);
                    }

                    fclose($handle);
                }
            }

            return $data;
        }

        $data = readData();

        if (empty($data)) {
            echo "<div class='no-data'><b>Tidak ada data buku.</b></div>";
        } else {
            echo "<table>";
            echo "<tr><th>Kode Buku</th><th>Judul</th><th>Pengarang</th><th>Tahun Terbit</th><th>Jumlah Halaman</th><th>Penerbit</th><th>Genre</th><th>Cover</th><th>Aksi</th></tr>";

            foreach ($data as $key => $buku) {
                echo "<tr>";
                foreach ($buku as $index => $value) {
                    if ($index === 7) {
                        $cover = trim($value); // Menghapus spasi tambahan jika ada
                        echo "<td><img src='uploads/" . $cover . "' alt='Cover'></td>";
                    } else {
                        echo "<td>" . $value . "</td>";
                    }
                }
                echo "<td class='actions'><a href='form_update.php?code=" . $buku[0] . "'>Edit</a>  <a href='delete.php?code=" . $buku[0] . "'>Delete</a></td>";

                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>

</html>

