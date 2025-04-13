<?php

include_once __DIR__ . '/../models/transaksi.php';

$transaksi = new Transaksi();

try {
    if (!empty($_GET['aksi'])) {
        if ($_GET['aksi'] == 'beli' && isset($_POST['beli'])) {
            $Jumlah = $_POST['Jumlah'];
            $TotalHarga = $_POST['TotalHarga'];
            $IdBarang = $_POST['IdBarang'];
            $IdUser = $_POST['IdUser'];
            $transaksi->Beli($Jumlah, $TotalHarga, $IdBarang, $IdUser);
        }

    }else{
      
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}