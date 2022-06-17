<?php
session_start();
require 'config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
    <title>Tambah Data</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <h2>Tambah Data</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Proses</label>
                    <select name="proses" id="proses" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="WITEL">WITEL</option>
                        <option value="OBL">OBL</option>
                        <option value="LEGAL">LEGAL</option>
                        <option value="MITRA (OBL)">MITRA (OBL)</option>
                        <option value="PJM">PJM</option>
                        <option value="MITRA (PJM)">MITRA (PJM)</option>
                        <option value="DONE">DONE</option>
                        <option value="CANCEL">CANCEL</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="pic">PIC</label>
                    <input type="text" name="pic" id="pic" placeholder="Masukkan pic..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="tanggalUpdate">Tanggal Update</label>
                    <input type="date" name="tanggalUpdate" id="tanggalUpdate" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="AMANDEMEN">AMANDEMEN</option>
                        <option value="PASANG BARU">PASANG BARU</option>
                        <option value="PERPANJANGAN">PERPANJANGAN</option> //LANGSUNG DONE
                    </select>
                </div>
                <div class="form-input">
                    <label for="noFolder">Nomor Folder</label>
                    <input type="text" name="noFolder" id="noFolder" placeholder="Masukkan nomor folder..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jenisSPK">Jenis SPK</label>
                    <select name="jenisSPK" id="jenisSPK" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="KL">KL</option>
                        <option value="SP">SP</option>
                        <option value="WO">WO</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" id="namaPelanggan" placeholder="Masukkan nama pelanggan..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jenisLayanan">Jenis Layanan</label>
                    <input type="text" name="jenisLayanan" id="jenisLayanan" placeholder="Masukkan jenis layanan..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="namaVendor">Nama Vendor</label>
                    <input type="text" name="namaVendor" id="namaVendor" placeholder="Masukkan nama vendor..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jangkaWaktu">Jangka Waktu (Bulan)</label>
                    <input type="number" name="jangkaWaktu" id="jangkaWaktu" min=1 max=12 placeholder="Masukkan jangka waktu..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="nilaiKB">Nilai KB</label>
                    <input type="text" name="nilaiKB" id="nilaiKB" placeholder="Masukkan Nilai KB..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="noKFS">No KFS/SPK</label>
                    <input type="text" name="noKFS" id="noKFS" placeholder="Masukkan No KFS/SPK..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="noKL">No KL/WO/Surat Pesanan</label>
                    <input type="text" name="noKL" id="noKL" placeholder="Masukkan No KL/WO/Surat Pesanan..." autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="witel">Witel</label>
                    <select name="witel" id="witel" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="BALIKPAPAN">BALIKPAPAN</option>
                        <option value="SAMARINDA">SAMARINDA</option>
                        <option value="KALBAR">KALBAR</option>
                        <option value="KALSEL">KALSEL</option>
                        <option value="KALTARA">KALTARA</option>
                        <option value="KALTENG">KALTENG</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"></textarea>
                </div>
                <div class="form-button">
                    <button type="submit" name="tambah" id="tambah">Submit</button>
                    <a href="index.php">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["tambah"])) {
        $id_data = query("SELECT id FROM report_obl ORDER BY id DESC LIMIT 1")[0]["id"];
        $id = $id_data + 1;
        $proses = htmlspecialchars($_POST['proses']);
        $tanggalUpdate = htmlspecialchars($_POST['tanggalUpdate']);
        $tanggal = date("j-M-Y", strtotime($tanggalUpdate));
        $noFolder = htmlspecialchars($_POST['noFolder']);
        if ($noFolder == '') {
            $noFolder = '-';
        }
        $jenisSPK = htmlspecialchars($_POST['jenisSPK']);
        $namaPelanggan = htmlspecialchars($_POST['namaPelanggan']);
        if ($namaPelanggan == '') {
            $namaPelanggan = '-';
        }
        $jenisLayanan = htmlspecialchars($_POST['jenisLayanan']);
        if ($jenisLayanan == '') {
            $jenisLayanan = '-';
        }
        $namaVendor = htmlspecialchars($_POST['namaVendor']);
        if ($namaVendor == '') {
            $namaVendor = '-';
        }
        $jangkaWaktu = htmlspecialchars($_POST['jangkaWaktu']);
        if ($jangkaWaktu == '') {
            $jangkaWaktu = 0;
        }
        $nilaiKB = htmlspecialchars($_POST['nilaiKB']);
        if ($nilaiKB == '') {
            $valNilaiKB = 0;
        } else {
            $valNilaiKB = intval(toNumber($nilaiKB));
        }
        $noKFS = htmlspecialchars($_POST['noKFS']);
        if ($noKFS == '') {
            $noKFS = '-';
        }
        $noKL = htmlspecialchars($_POST['noKL']);
        if ($noKL == '') {
            $noKL = '-';
        }
        $pic = htmlspecialchars($_POST['pic']);
        if ($pic == '') {
            $pic = '-';
        }
        $status = htmlspecialchars($_POST['status']);
        $witel = htmlspecialchars($_POST['witel']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        if ($keterangan == '') {
            $keterangan = '-';
        }

        if ($status == 'PERPANJANGAN') {
            $proses = 'DONE';
        }

        $query = "INSERT INTO report_obl (id, proses, tanggal_update, no_folder, jenis_spk, nama_pelanggan, jenis_layanan, nama_vendor, jangka_waktu, nilai_kb, no_kfs, no_kl, PIC, status, witel, keterangan) VALUES ('$id', '$proses', '$tanggal','$noFolder','$jenisSPK','$namaPelanggan','$jenisLayanan','$namaVendor',$jangkaWaktu, $valNilaiKB,'$noKFS','$noKL','$pic','$status','$witel','$keterangan')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'tambahData.php';
                </script>";
        }
    }
    ?>

    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>
    <!-- <script>
        const btnTambah = document.getElementById('tambah');
        if (btnTambah) {
            btnTambah.addEventListener('click', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambahkan!',
                    showDenyButton: true,
                    confirmButtonText: 'OK',
                    denyButtonText: 'Tambah Data Lagi',
                    denyButtonColor: '#FD7E14'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'index.php';
                    } else {
                        window.location = 'tambahData.php';
                    }
                });
            });
        }
    </script> -->
</body>

</html>