<?php include_once '../models/barang.php';
$user = new Barang(); 
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body >

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center mb-4"><i class="fas fa-user-plus"></i> Edit Data</h2>
            <form action="../controllers/barang.php?aksi=edit" method="post">
            <?php foreach ($user->tampil_data_byid($_GET['id']) as $data) {
                ?>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" id="IdBarang" name="IdBarang" value="<?= $data->IdBarang ?>" hidden>
                    <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukkan nama lengkap" required value="<?= $data->NamaBarang ?>">
                </div>
                <div class="form-group">
                    <label for="email">Harga</label>
                    <input type="number" class="form-control" id="Harga" name="Harga"placeholder="Rp.000"" required  value="<?= $data->Harga ?>">
                </div>
                <div class="form-group">
                    <label for="username">Diskon</label>
                    <input type="number" class="form-control" id="Besarandiskon" name="Besarandiskon" placeholder="Masukkan username" required  value="<?= $data->Besarandiskon ?>">
                </div>
               
                <button type="submit" name="edit" class="btn btn-primary btn-block">Ganti</button>
                <?php } ?>
            </form>
       
        </div>
    </div>
</div>


</body>
</html>