<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
?>
<main>
  <?php if (empty($barangs)) { 
    echo"<h2>Tidak Ada Barang</h2>";
    ?>
  <?php } else { ?>
    <?php foreach ($barangs as $x): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><?= $x->NamaBarang ?></h5>
          <p class="card-text">Rp.<?= number_format($x->Harga, 0, ',', '.') ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php } ?>
</main>