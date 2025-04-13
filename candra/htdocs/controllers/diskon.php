<?php

include_once '../models/diskon.php';

$count = new Diskon();

if ($_GET['aksi'] == 'count') {
    $harga = isset($_POST['harga']) ? (float)$_POST['harga'] : 0;
    $diskon = isset($_POST['diskon']) ? (float)$_POST['diskon'] : 0;

    if ($harga <= 0 || $diskon < 1 || $diskon > 100) {
        $_SESSION['error'] = 'Harap masukkan harga yang valid dan diskon antara 1% hingga 100%.';
    } else {
        $jumlahDiskon = ($harga * $diskon) / 100;
        $hargaSetelahDiskon = $harga - $jumlahDiskon;
        $_SESSION['harga_diskon'] = $hargaSetelahDiskon;
    }

    header("Location: ../views/barang.php");
    exit;

}