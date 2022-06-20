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
    $query = query("SELECT * FROM report_obl GROUP BY nama_pelanggan ORDER BY nilai_kb DESC");

    foreach ($query as $key => $dataQuery) {
        $namaPenggan = $dataQuery['nama_pelanggan'];
        $queryNilai = query("SELECT nama_pelanggan, nilai_kb FROM report_obl WHERE nama_pelanggan='$namaPenggan'");
        unset($totalNilai);
        foreach ($queryNilai as $key => $todo) {
            $totalNilai[] = $todo['nilai_kb'];
            // rupiah($row["nilai_kb"]);
        }
        try {
            $nilaiData = array_sum($totalNilai);
        } catch (\Throwable $th) {
        }
        $queryCollection[] = [
            'id' => $dataQuery['id'],
            'proses' => $dataQuery['proses'],
            'nama_pelanggan' => $dataQuery['nama_pelanggan'],
            'total_order' => $dataQuery['total_order'],
            'nilai_kb' => $nilaiData,
        ];
    }
    usort($queryCollection, function($a, $b)
             {
                 if ($a["nilai_kb"] == $b["nilai_kb"])
                     return (0);
                 return (($a["nilai_kb"] > $b["nilai_kb"]) ? -1 : 1);
             });
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
                <?php foreach ($queryCollection as $key => $row) { ?>
                    <tr>
                        <td class="no"><?= $i; ?></td>
                        <td><?= $row['nama_pelanggan']; ?></td>
                        <td><?= $row['total_order']; ?></td>
                        <td><?= $row['nilai_kb']; ?></td>
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
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>