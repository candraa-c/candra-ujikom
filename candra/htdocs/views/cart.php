<?php
include_once 'layouts/header.php';
include_once '../controllers/transaksi.php';
$UserId = $_SESSION['data']['IdUser']; 
$result = $transaksi->TampilTransaksi($UserId);
?>

<main>
<div class="container mt-4">
    <h2 class="text-secondary">Riwayat Pesanan</h2>
    <div class="row">
    <?php if (empty($result)) { ?>
        <h2>Tidak Ada Transaksi</h2>
    <?php } else { ?>
        <?php foreach ($result as $x): 
               $harga = $x->Harga;
               $diskon = $x->Besarandiskon ?? 0;
               $hargaSetelahDiskon = ($diskon > 0) ? $harga - ($harga * $diskon / 100) : $harga; ?>
            <div class="card mb-3">
                <div class="card-body m-3">
                    <h2>DETAIL PESANAN ANDA :</h2>
                    <h5 class="mt-3 card-title">Atas Nama : <?= $x->Username ?></h5>
                    <h5 class="mt-3 card-title">Nama Barang : <?= $x->NamaBarang ?></h5>
                    <h5 class="mt-3">Harga Satuan : 
                    <?php if ($diskon > 0): ?>
                        <span style="text-decoration: line-through; color: red;">
                            Rp.<?= number_format($harga, 0, ',', '.') ?>
                        </span>
                        <br>
                        <span>Setelah diskon : Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></span>
                    <?php else: ?>
                        <span>Rp.<?= number_format($harga, 0, ',', '.') ?></span>
                    <?php endif; ?>
                </h5>

                    <h5 class="mt-3">Jumlah : <?= $x->Jumlah ?></h5>

                    
                    <h5 class="mt-3">Total Harga Pembelian : Rp.<?= number_format($x->TotalHarga, 0, ',', '.') ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
    </div>
    </div>
</main>