<?php
// Menyertakan file header yang berisi bagian atas layout HTML
include_once 'views/layouts/header.php';

// Menyertakan controller barang yang berisi logika untuk mengambil data barang
include_once 'controllers/barang.php';
?>

<main>
<div class="container mt-2">
    <h2 class="text-secondary">Barang</h2>
    <div class="row">

<?php 
// Jika tidak ada barang dalam daftar, tampilkan pesan "Tidak Ada Barang"
if (empty($barangs)) { 
    echo "<h2>Tidak Ada Barang</h2>";
} else { ?> 

    <?php 
    // Looping untuk menampilkan setiap barang yang ada dalam daftar
    foreach ($barangs as $x):  
    ?>
        <?php
            // Mengambil harga barang
            $harga = $x->Harga;

            // Mengecek apakah ada diskon, jika tidak ada maka diskon = 0
            $diskon = isset($x->Besarandiskon) ? $x->Besarandiskon : 0;

            // Menghitung jumlah diskon dalam satuan mata uang
            $jumlahDiskon = ($diskon > 0) ? ($harga * $diskon) / 100 : 0;

            // Menghitung harga setelah dikurangi diskon
            $hargaSetelahDiskon = $harga - $jumlahDiskon;
        ?>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                <!-- Menampilkan nama barang -->
                <h5 class="card-title"><?= htmlspecialchars($x->NamaBarang) ?></h5>
                <p>
                    <?php if ($diskon > 0) : ?>
                        <!-- Jika ada diskon, tampilkan harga awal yang dicoret dan harga setelah diskon -->
                        <span style="text-decoration: line-through; color: red;">
                            Rp.<?= number_format($harga, 0, ',', '.') ?>
                        </span>
                        <br>
                        <span>Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></span>
                    <?php else : ?>
                        <!-- Jika tidak ada diskon, tampilkan harga biasa -->
                        Rp.<?= number_format($harga, 0, ',', '.') ?>
                    <?php endif; ?>
                </p>

                <!-- Tombol beli yang membuka modal konfirmasi pembelian -->
                <a href="#" class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#BeliModal"
                  data-id="<?= $x->IdBarang ?>"
                  data-nama="<?= $x->NamaBarang ?>"
                  data-harga="<?= ($diskon > 0) ? $hargaSetelahDiskon : $harga ?>"
                  data-user="<?= $_SESSION['data']['IdUser'] ?>">
                  Beli
                </a>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php } ?>
  </div>
</div>

<!-- Modal untuk konfirmasi pembelian -->
<div class="modal fade" id="BeliModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Judul modal -->
                <h5 class="modal-title" id="ModalLabel">Konfirmasi Pembelian</h5>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Menampilkan nama barang yang dipilih -->
                <h5 id="NamaBarang"></h5>
                <h5>Harga : <span id="Harga"></span></h5>

                <!-- Formulir untuk melakukan pembelian -->
                <form action="controllers/transaksi.php?aksi=beli" method="post">
                    <label for="">Jumlah</label>
                    <div class="counter-container">
                        <!-- Tombol untuk mengurangi jumlah barang -->
                        <button type="button" class="counter-button btn btn-primary" id="minus">-</button>
                        <!-- Input jumlah barang yang dibeli -->
                        <input type="text" id="jumlah" name="Jumlah" class="counter-input" value="1" readonly>
                        <!-- Tombol untuk menambah jumlah barang -->
                        <button type="button" class="counter-button btn btn-primary" id="plus">+</button>
                    </div>
                    <!-- Menampilkan total harga berdasarkan jumlah barang -->
                    <h5 class="mt-3">Total Harga: <span id="TotalHargaText">0</span></h5>

                    <!-- Input tersembunyi untuk mengirimkan data ke server -->
                    <input type="hidden" id="TotalHarga" name="TotalHarga">
                    <input type="hidden" name="IdBarang" id="IdBarang">
                    <input type="hidden" name="IdUser" id="IdUser">

                    <!-- Tombol untuk mengkonfirmasi pembelian -->
                    <button class="btn btn-success mt-4" type="submit" name="beli" 
                        onclick="return confirm('Apakah Semua Data Pembelian Sudah Sesuai?')">Beli Sekarang!</button>
                </form>
            </div>
        </div>   
    </div>
</div>      

</main>

<!-- Memuat file JavaScript eksternal -->
<script src="assets/js/index.js"></script>

</html>
