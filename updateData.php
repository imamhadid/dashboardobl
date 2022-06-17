<?php
session_start();
require 'config/functions.php';

$id = $_GET["id"];
$query = query("SELECT * FROM report_obl WHERE id = $id")[0];

if (isset($_POST["update"])) {
    $id = htmlspecialchars($_POST['id']);
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
    $valJangkaWaktu = intval($jangkaWaktu);
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
    $close = htmlspecialchars($_POST['close']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    if ($keterangan == '') {
        $keterangan = '-';
    }

    if ($status == 'PERPANJANGAN') {
        $proses = 'DONE';
    }

    if ($close == 'CLOSE SM') {
        $proses = 'CLOSE SM';
    }
    var_dump($close);
    var_dump($proses);
    die;

    $query = "UPDATE report_obl SET
                    proses = '$proses',
                    tanggal_update = '$tanggal', 
                    no_folder = '$noFolder', 
                    jenis_spk = '$jenisSPK', 
                    nama_pelanggan = '$namaPelanggan',
                    jenis_layanan = '$jenisLayanan',
                    nama_vendor = '$namaVendor',
                    jangka_waktu = $valJangkaWaktu,
                    nilai_kb = $valNilaiKB,
                    no_kfs = '$noKFS',
                    no_kl = '$noKL',
                    pic = '$pic',
                    status = '$status',
                    witel = '$witel',
                    keterangan = '$keterangan' 
            WHERE id = $id";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                    alert('Data gagal diupdate!');
                    document.location.href = 'index.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
    <title>Update Data</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <h2>Update Data</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $query["id"]; ?>">
                <div class="form-input">
                    <label for="">Proses</label>
                    <select name="proses" id="proses" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="WITEL" <?php if ($query["proses"] == "WITEL") echo 'selected="selected"'; ?>>WITEL</option>
                        <option value="OBL" <?php if ($query["proses"] == "OBL") echo 'selected="selected"'; ?>>OBL</option>
                        <option value="LEGAL" <?php if ($query["proses"] == "LEGAL") echo 'selected="selected"'; ?>>LEGAL</option>
                        <option value="MITRA (OBL) <?php if ($query["proses"] == "MITRA (OBL)") echo 'selected="selected"'; ?>">MITRA (OBL)</option>
                        <option value="PJM" <?php if ($query["proses"] == "PJM") echo 'selected="selected"'; ?>>PJM</option>
                        <option value="MITRA (PJM)" <?php if ($query["proses"] == "MITRA (PJM)") echo 'selected="selected"'; ?>>MITRA (PJM)</option>
                        <option value="DONE" <?php if ($query["proses"] == "DONE") echo 'selected="selected"'; ?>>DONE</option>
                        <option value="CANCEL" <?php if ($query["proses"] == "CANCEL") echo 'selected="selected"'; ?>>CANCEL</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="tanggalUpdate">Tanggal Update</label>
                    <input type="date" name="tanggalUpdate" id="tanggalUpdate" value="<?php echo date('Y-m-d', strtotime($query["tanggal_update"])) ?>" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="noFolder">No Folder</label>
                    <input type="text" name="noFolder" id="noFolder" placeholder="Masukkan nomor folder..." value="<?= $query["no_folder"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jenisSPK">Jenis SPK</label>
                    <select name="jenisSPK" id="jenisSPK" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="KL" <?php if ($query["jenis_spk"] == "KL") echo 'selected="selected"'; ?>>KL</option>
                        <option value="SP" <?php if ($query["jenis_spk"] == "SP") echo 'selected="selected"'; ?>>SP</option>
                        <option value="WO" <?php if ($query["jenis_spk"] == "WO") echo 'selected="selected"'; ?>>WO</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" id="namaPelanggan" placeholder="Masukkan nama pelanggan..." value="<?= $query["nama_pelanggan"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jenisLayanan">Jenis Layanan</label>
                    <input type="text" name="jenisLayanan" id="jenisLayanan" placeholder="Masukkan jenis layanan..." value="<?= $query["jenis_layanan"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="namaVendor">Nama Vendor</label>
                    <input type="text" name="namaVendor" id="namaVendor" placeholder="Masukkan nama vendor..." value="<?= $query["nama_vendor"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="jangkaWaktu">Jangka Waktu (Bulan)</label>
                    <input type="number" name="jangkaWaktu" id="jangkaWaktu" placeholder="Masukkan jangka waktu..." value="<?= $query["jangka_waktu"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="nilaiKB">Nilai KB</label>
                    <input type="text" name="nilaiKB" id="nilaiKB" placeholder="Masukkan Nilai KB..." value="<?= rupiah($query["nilai_kb"]); ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="noKFS">No KFS/SPK</label>
                    <input type="text" name="noKFS" id="noKFS" placeholder="Masukkan No KFS/SPK..." value="<?= $query["no_kfs"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="noKL">No KL/WO/Surat Pesanan</label>
                    <input type="text" name="noKL" id="noKL" placeholder="Masukkan No KL/WO/Surat Pesanan..." value="<?= $query["no_kl"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="pic">PIC</label>
                    <input type="text" name="pic" id="pic" placeholder="Masukkan pic..." value="<?= $query["pic"]; ?>" autocomplete="off">
                </div>
                <div class="form-input">
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="AMANDEMEN" <?php if ($query["status"] == "AMANDEMEN") echo 'selected="selected"'; ?>>AMANDEMEN</option>
                        <option value="PASANG BARU" <?php if ($query["status"] == "PASANG BARU") echo 'selected="selected"'; ?>>PASANG BARU</option>
                        <option value="PERPANJANGAN" <?php if ($query["status"] == "PERPANJANGAN") echo 'selected="selected"'; ?>>PERPANJANGAN</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="witel">Witel</label>
                    <select name="witel" id="witel" required>
                        <option value="-" selected disabled>Pilih</option>
                        <option value="BALIKPAPAN" <?php if ($query["witel"] == "BALIKPAPAN") echo 'selected="selected"'; ?>>BALIKPAPAN</option>
                        <option value="SAMARINDA" <?php if ($query["witel"] == "SAMARINDA") echo 'selected="selected"'; ?>>SAMARINDA</option>
                        <option value="KALBAR" <?php if ($query["witel"] == "KALBAR") echo 'selected="selected"'; ?>>KALBAR</option>
                        <option value="KALSEL" <?php if ($query["witel"] == "KALSEL") echo 'selected="selected"'; ?>>KALSEL</option>
                        <option value="KALTARA" <?php if ($query["witel"] == "KALTARA") echo 'selected="selected"'; ?>>KALTARA</option>
                        <option value="KALTENG" <?php if ($query["witel"] == "KALTENG") echo 'selected="selected"'; ?>>KALTENG</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="close">Status Close</label>
                    <select name="close" id="close">
                        <option value="NO CLOSE" selected>NO CLOSE</option>
                        <option value="CLOSE SM">CLOSE SM</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"><?= $query["keterangan"]; ?></textarea>
                </div>
                <div class="form-button">
                    <button type="submit" name="update">Update</button>
                    <a href="dokumenWitel.php">Kembali ke Tabel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>