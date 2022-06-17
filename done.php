<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$nama = $_SESSION['nama'];

$namaAkun = query("SELECT * FROM account WHERE nama = '$nama'")[0];
$level = $namaAkun["level"];
$witel = $_GET["witel"];

if ($witel == '') {
    $query = query("SELECT * FROM report_obl WHERE UPPER(proses) = 'DONE'");
} else {
    $query = query("SELECT * FROM report_obl WHERE UPPER(proses) = 'DONE' AND UPPER(witel) = '$witel'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleDetail.css">
    <title>DONE</title>
</head>

<body>
    <div class="container">
        <h1>Dokumen di Witel</h1>

        <div class="header">
            <img src="img/search.png" alt="" id="search">
            <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword..." autocomplete="off" id="keyword" autofocus>

            <div class="_1">
                <a href="perangkingan.php"><button style="background-color: #6c757d;"><img src="img/list.png" alt="">Lihat Perangkingan</button></a>
                <button style="background-color: #FD7E14;"><img src="img/download.png" alt="">Download</button>
                <a href="index.php"><button style="background-color: #20C997;"><img src="img/home.png" alt="">Dashboard</button></a>
            </div>
        </div>

        <div class="content" id="content-table">
            <table>
                <tr>
                    <th>No</th>
                    <th>Proses</th>
                    <th>Tanggal Update</th>
                    <th>No Folder</th>
                    <th>Jenis SPK</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Layanan</th>
                    <th>Nama Vendor</th>
                    <th>Jangka Waktu</th>
                    <th>Nilai KB</th>
                    <th>No KFS/SPK</th>
                    <th>No KL/WO/Surat Pesanan</th>
                    <th>PIC</th>
                    <th>Status</th>
                    <th>Witel</th>
                    <th>Keterangan</th>
                    <th class="aksi" id="aksiTh">Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td class="no"><?= $i; ?></td>
                        <td><?= $row["proses"]; ?></td>
                        <td><?= $row["tanggal_update"]; ?></td>
                        <td><?= $row["no_folder"]; ?></td>
                        <td><?= $row["jenis_spk"]; ?></td>
                        <td><?= $row["nama_pelanggan"]; ?></td>
                        <td><?= $row["jenis_layanan"]; ?></td>
                        <td><?= $row["nama_vendor"]; ?></td>
                        <td><?= $row["jangka_waktu"]; ?></td>
                        <td><?= rupiah($row["nilai_kb"]); ?></td>
                        <td><?= $row["no_kfs"]; ?></td>
                        <td><?= $row["no_kl"]; ?></td>
                        <td><?= $row["pic"]; ?></td>
                        <td><?= $row["status"]; ?></td>
                        <td><?= $row["witel"]; ?></td>
                        <td><?= $row["keterangan"]; ?></td>
                        <td class="aksi" id="aksiTd">
                            <a href="updateData.php?id=<?= $row["id"]; ?>"><button class="update"><img src="img/update.png" alt=""></button></a>
                            <a href="" onclick="return confirm('Yakin untuk menghapus data ini?')"><button class="delete"><img src="img/delete.png" alt=""></button></a>
                        </td>
                        <?php
                        if ($level == 'witel') {
                            echo "<script>
                                document.getElementById('aksiTh').style.display = 'none';
                                document.getElementById('aksiTd').remove();
                            </script>";
                        }
                        ?>
                        <?php $i++; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>