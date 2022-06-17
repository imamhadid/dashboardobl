<?php
$witel = '';
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'WITEL'");
$data = mysqli_fetch_assoc($result);
$totalWitel = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'OBL'");
$data = mysqli_fetch_assoc($result);
$totalOBL = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'LEGAL'");
$data = mysqli_fetch_assoc($result);
$totalLegal = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'PJM'");
$data = mysqli_fetch_assoc($result);
$totalPJM = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'DONE'");
$data = mysqli_fetch_assoc($result);
$totalDone = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'CLOSE SM'");
$data = mysqli_fetch_assoc($result);
$totalClose = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl");
$data = mysqli_fetch_assoc($result);
$totalAll = $data['total'];
