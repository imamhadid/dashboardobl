<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "<script>
                    alert('Data berhasil dihapus!');
                    document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
                    alert('Data gagal dihapus!');
                    document.location.href = 'index.php';
        </script>";
}
