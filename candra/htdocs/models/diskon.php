<?php

include_once '../controllers/conn.php';

class Diskon {
  public function Counting($harga, $diskon){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $harga = isset($_POST['harga']) ? (float)$_POST['harga'] : 0;
          $diskon = isset($_POST['diskon']) ? (float)$_POST['diskon'] : 0;
          if ($harga <= 0 || $diskon <= 1 || $diskon > 100) {
            echo '<div class="alert alert-danger mt-3">Harap masukkan harga yang valid dan diskon antara 1% hingga 100%.</div>';
          } else {
            $jumlahDiskon = ($harga * $diskon) / 100;
            $hargaSetelahDiskon = $harga - $jumlahDiskon;

            echo '<div class="alert alert-success mt-3">';
            echo '<p>Harga Awal: Rp' . number_format($harga, 0, ',', '.') . '</p>';
            echo '<p>Diskon: ' . $diskon . '%</p>';
            echo '<p>Jumlah Diskon: Rp' . number_format($jumlahDiskon, 0, ',', '.') . '</p>';
            echo '<p>Harga Setelah Diskon: Rp' . number_format($hargaSetelahDiskon, 0, ',', '.') . '</p>';
            echo '</div>';
          }
        }
  }
}