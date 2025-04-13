<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="loading" id="loading">
    <div class="loading-text">Loading...</div>
</div>
  <nav class="navbar navbar-expand-lg fixed-top text-dark p-3">
    <div class="container-fluid">
    <h6 class="navbar-brand fw-bolder"  href="#">APK DISKON</h6>
        <div class="navbar-nav ms-auto">
          <div class="button-container">
          <a href="../../views/dashboard.php" class="fs-3">
          <i class="fas fa-home"></i>
          </a>
          <a href="../../views/barang.php" class="fs-3">
          <i class="fas fa-cart-plus"></i>
          </a>

          <a href="../../controllers/user.php?aksi=logout" onclick="return confirm('Yakin ingin keluar dari aplikasi?')" class="fs-3">
          <i class="fas fa-sign-out-alt"></i>
          </a>
          </div>

        </div>
    </div>
</nav>
<script>
    window.addEventListener('load', function() {
        const loading = document.getElementById('loading');
        loading.classList.add('fade-out');
        setTimeout(() => {
            loading.style.display = 'none';
        }, 500);
    });
</script>
<script src="../../assets/js/scroll.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>