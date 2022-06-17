<?php
require 'connection.php';

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',',);
    return $hasil_rupiah;
}

function toNumber($angka)
{
    $val = preg_replace('/[^0-9]/', '', $angka);
    return $val;
}

function delete($id)
{
    global $conn;

    $query = "DELETE FROM report_obl WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
