<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
$hargaDiskon = isset($_SESSION['harga_diskon']) ? $_SESSION['harga_diskon'] : '';
?>

<main>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Tambah Barang </h3>
                </div>
               <div class="card-body">
                <form action="../controllers/barang.php?aksi=tambah" method="post">
                    <label for="">Nama Barang</label>
                    <input class="form-control" type="text" name="NamaBarang" placeholder="Masukan Nama Barang">
                    <label for="">Harga</label>
                   <input type="number" class="form-control" name="Harga" placeholder="Rp.000">
                   <label for="">Setelah Diskon</label>
                   <input type="number" class="form-control" name="Besarandiskon" placeholder="%" min="0"  max="100" step="0.01" required>
                   <button type="submit" name="tambah" class="btn btn-primary mt-2">Kirim</button>
                </form>
               </div> 
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Data Barang</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover"> 
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Setelah Diskon</th>
                            <th>Aksi</th>
                        </tr>     
                        <?php if (empty($barangs)) { 
                                echo "<h2>Tidak Ada Barang</h2>";
                            } else { ?>
                            <tbody> 
                            <?php foreach ($barangs as $x):  ?>
                            <?php
                                $harga = $x->Harga;
                                $diskon = isset($x->Besarandiskon) ? $x->Besarandiskon : 0;
                                $jumlahDiskon = ($diskon > 0) ? ($harga * $diskon) / 100 : 0;
                                $hargaSetelahDiskon = $harga - $jumlahDiskon;
                            ?>
                                    <tr>
                                        <td><?= htmlspecialchars($x->NamaBarang) ?></td>
                                        <td>Rp.<?= number_format($x->Harga, 0, ',', '.') ?></td>
                                        <td>Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></td>
                                        <td>
                                            <a href = "edit.php?id=<?= $x->IdBarang ?>" button class="btn btn-primary" >Edit</a>
                                            <a onclick="return confirm('yakin?')" href="../../controllers/barang.php?IdBarang=<?= $x->IdBarang ?>&aksi=hapus" class="btn btn-danger">Hapus</a>
                                           
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php } ?>
                    </table>
                  
                </div>
            </div>
              <!-- MODAL EDIT -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Form Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="../controllers/barang.php?aksi=edit">
                            <input type="hidden" id="IdBarang" name="IdBarang">
                            <div class="mb-3">
                                <label for="NamaBarang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="Harga" name="Harga" placeholder="Rp. 000">
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <!-- MODAL PENETAPAN DISKON -->
        <div class="modal fade" id="DiskonModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Form Penetapan Diskon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="../controllers/diskon.php?aksi=count" method="POST">
                    <label for="harga">Jumlah Harga</label>
                    <input type="text" name="harga" id="Harga" class="form-control m-2" readonly>

                    <label for="diskon">Terapkan Diskon %</label>
                    <input type="number" name="diskon" id="diskon" class="form-control m-2" placeholder="Masukkan Diskon (1-100)">
                    <label for="harga_final">Harga Final</label>
                    <input type="text" name="harga_final" id="harga_final" class="form-control" value="<?= number_format($hargaDiskon, 0, ',', '.') ?>" readonly>               
                    <button type="submit" class="btn btn-primary mt-3">Hitung Diskon</button>
                </form>
            </div>
        </div>
    </div>
</div>
       
        </div>
    </div>
</div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const EditModal = document.getElementById('EditModal');
        
        EditModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const NamaBarang = button.getAttribute('data-nama');
            const Harga = button.getAttribute('data-harga');
            const IdBarang = button.getAttribute('data-id');

            EditModal.querySelector('#NamaBarang').value = NamaBarang;
            EditModal.querySelector('#Harga').value = Harga;
            EditModal.querySelector('#IdBarang').value = IdBarang;
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
    const DiskonModal = document.getElementById('DiskonModal');

    DiskonModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const Harga = button.getAttribute('data-harga'); 
        
        DiskonModal.querySelector('#Harga').value = Harga;
      
    });
});


</script>
