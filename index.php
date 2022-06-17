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

$mitra = query("SELECT DISTINCT nama_pelanggan FROM report_obl");
$query = query("SELECT * FROM report_obl");

if (isset($_POST["witel"])) {
    $witel = $_POST["witel"];
    if ($witel == 'ALL') {
        require 'showData/defaultData.php';
    } else {
        require 'showData/spesificData.php';
    }
} else {
    require 'showData/defaultData.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/styleDashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="title">
            <div class="profile">
                <img src="img/default.png" alt="">
                <div class="picdtl">
                    <div class="say">
                        <h4>Hi, <?= $_SESSION["nama"]; ?>!</h4>
                    </div>
                    <div class="name">
                        <h2>Selamat Datang</h2>
                    </div>
                </div>
            </div>
            <a href="logout.php"><button class="logout" id="logout"><img src="img/logout.png" alt="">Logout</button></a>
        </div>

        <div class="header">
            <div class="dropdown">
                <div class="content">
                    <label for="witel">Witel</label>
                    <form action="" method="post">
                        <select name="witel" id="witel" onchange="this.form.submit()">
                            <option value="ALL" disabled selected>ALL</option>
                            <option value="BALIKPAPAN" <?php if ($witel == "BALIKPAPAN") echo 'selected="selected"'; ?>>BALIKPAPAN</option>
                            <option value="SAMARINDA" <?php if ($witel == "SAMARINDA") echo 'selected="selected"'; ?>>SAMARINDA</option>
                            <option value="KALBAR" <?php if ($witel == "KALBAR") echo 'selected="selected"'; ?>>KALBAR</option>
                            <option value="KALSEL" <?php if ($witel == "KALSEL") echo 'selected="selected"'; ?>>KALSEL</option>
                            <option value="KALTARA" <?php if ($witel == "KALTARA") echo 'selected="selected"'; ?>>KALTARA</option>
                            <option value="KALTENG" <?php if ($witel == "KALTENG") echo 'selected="selected"'; ?>>KALTENG</option>
                        </select>
                    </form>
                </div>
                <div class="content">
                    <label for="tahun">Tahun</label>
                    <form action="" method="post">
                        <select name="tahun" id="tahun" onchange="this.form.submit()">
                            <option value="ALL" disabled selected>All</option>
                        </select>
                    </form>
                </div>
                <div class="content">
                    <label for="mitra">Mitra</label>
                    <form action="" method="post">
                        <select name="mitra" id="mitra" onchange="this.form.submit()">
                            <option value="ALL" disabled selected>All</option>
                            <?php foreach ($mitra as $row) : ?>
                                <option value="<?= $row["nama_pelanggan"]; ?>"><?= $row["nama_pelanggan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
                <div class="content">
                    <label for="segmen">Segmen</label>
                    <form action="" method="post">
                        <select name="segmen" id="segmen" onchange="this.form.submit()">
                            <option value="ALL" disabled selected>All</option>
                            <option value="DES">DES</option>
                            <option value="DGS">DGS</option>
                            <option value="DBS">DBS</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="searching">
                <a href=""><button class="refresh"><img src="img/refresh.svg" alt="">Refresh</button></a>
                <a href="tambahData.php"><button class="add"><img src="img/add.png" alt="">Tambah Data</button></a>
                <div class="form-input">
                    <img src="img/search.png" alt="" id="search">
                    <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword..." autocomplete="off">
                    <img src="img/cancel.png" alt="" id="cancel">
                </div>
            </div>
        </div>

        <div class="content-table" id="content-table">
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

        <div class="detail" id="detail">
            <div class="content">
                <a href="dokumenWitel.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">1</label>
                        </div>
                        <p>P0-P1</p>
                    </div>
                    <div class="_2">
                        <p class="text-1">Dokumen di Witel</p>
                        <p>Total : <span style="background-color: #dc3545;"><?= $totalWitel; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="dokumenOBL.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">2</label>
                        </div>
                        <p>P2-P8</p>
                    </div>
                    <div class="_2">
                        <p class="text-1">Dokumen di OBL</p>
                        <p>Total : <span style="background-color: #FD7E14;"><?= $totalOBL; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="dokumenLegal.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">3</label>
                        </div>
                        <p>KL KB</p>
                    </div>
                    <div class="_2">
                        <p class="text-1">Dokumen di Legal</p>
                        <p>Total : <span style="background-color: #6610F2;"><?= $totalLegal; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="">
                    <div class="_1">
                        <div class="num">
                            <label for="">4</label>
                        </div>
                        <p>SPH SKM</p>
                    </div>
                    <div class="_2">
                        <p class="text-1">Dokumen di Mitra (OBL)</p>
                        <p>Total : <span style="background-color: #FFC107;">.</span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="closeSM.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">5</label>
                        </div>
                    </div>
                    <div class="_2">
                        <p class="text-1">Close SM</p>
                        <p>Total : <span style="background-color: #6610F2;"><?= $totalClose; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="pjm.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">6</label>
                        </div>
                    </div>
                    <div class="_2">
                        <p class="text-1">PJM</p>
                        <p>Total : <span style="background-color: #20C997;"><?= $totalPJM; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="">
                    <div class="_1">
                        <div class="num">
                            <label for="">7</label>
                        </div>
                        <p>SPH SKM</p>
                    </div>
                    <div class="_2">
                        <p class="text-1">Dokumen di Mitra (PJM)</p>
                        <p>Total : <span style="background-color: #FFC107;">.</span></p>
                    </div>
                </a>
            </div>
            <div class="content">
                <a href="done.php?witel=<?= $witel; ?>">
                    <div class="_1">
                        <div class="num">
                            <label for="">8</label>
                        </div>
                    </div>
                    <div class="_2">
                        <p class="text-1">Done</p>
                        <p>Total : <span style="background-color: #0DCAF0;"><?= $totalDone; ?></span></p>
                    </div>
                </a>
            </div>
            <div class="last">
                <div class="content total">
                    <a href="">
                        <div class="_1">
                            <div class="num" style="background-color: #dc3545;">
                                <label for="" style="color: white;">.</label>
                            </div>
                        </div>
                        <div class="_2">
                            <p class="text-1">Cancel</p>
                        </div>
                    </a>
                </div>
                <div class="content total">
                    <a href="totalData.php?witel=<?= $witel; ?>">
                        <div class="_1">
                            <div class="num" style="background-color: #0d6efd;">
                                <label for="" style="color: white;"><?= $totalAll; ?></label>
                            </div>
                        </div>
                        <div class="_2">
                            <p class="text-1">Total Data</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ajax/ajaxSearch.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1200,
        });
    </script>
    <script>
        const search = document.getElementById('keyword');
        const cancel = document.getElementById('cancel');
        const table = document.getElementById('content-table');
        const detail = document.getElementById('detail');

        if (search) {
            search.addEventListener('click', function(e) {
                table.style.display = 'block';
                detail.style.display = 'none';
                search.style.outlineWidth = '2px';
                search.style.outlineStyle = 'solid';
                search.style.outlineColor = '#0d6efd';
            });
        }
        if (cancel) {
            cancel.addEventListener('click', function(e) {
                table.style.display = 'none';
                detail.style.display = 'flex';
                search.style.outline = 'none';
            });
        }
    </script>
</body>

</html>