<?php
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'WITEL' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalWitel = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'OBL' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalOBL = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'LEGAL' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalLegal = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'PJM' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalPJM = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'DONE' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalDone = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE proses = 'CLOSE SM' AND witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalClose = $data['total'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM report_obl WHERE witel = '$witel'");
$data = mysqli_fetch_assoc($result);
$totalAll = $data['total'];
