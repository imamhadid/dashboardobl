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
if (isset($_GET["witel"])) {
    $witel = $_GET["witel"];
} else {
    $witel = '';
}

if ($witel == '') {
    $query = query("SELECT * FROM report_obl ORDER BY nilai_kb DESC");
} else {
    $query = query("SELECT * FROM report_obl WHERE UPPER(proses) = 'WITEL' AND UPPER(witel) = '$witel' ORDER BY nilai_kb DESC");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleDetail.css">
    <title>Perangkingan</title>
</head>

<body>
    <div class="container">
        <h1>Perangkingan</h1>

        <div class="header">
            <img src="img/search.png" alt="" id="search">
            <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword..." autocomplete="off" autofocus>

            <div class="_1">
                <a href="index.php"><button style="background-color: #20C997;"><img src="img/home.png" alt="">Dashboard</button></a>
            </div>
        </div>

        <div class="content" id="content-table">
            <table>
                <tr>
                    <th>Rank</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Order</th>
                    <th>Total Nilai kb</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td class="no"><?= $i; ?></td>
                        <td><?= $row["nama_pelanggan"]; ?></td>
                        <td><?= $row["total_order"]; ?></td>
                        <td><?= rupiah($row["nilai_kb"]); ?></td>
                        <td class="aksi">
                        <a href="lihatDetailRank.php"><button class="view"><img src="img/view.png" alt=""></button></a>
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
</body>

</html>