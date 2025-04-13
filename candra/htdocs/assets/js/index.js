// Menunggu hingga DOM (struktur dokumen HTML) sepenuhnya dimuat sebelum menjalankan script
document.addEventListener('DOMContentLoaded', function () {
    // Mengambil elemen modal dengan id 'BeliModal'
    const BeliModal = document.getElementById('BeliModal');

    // Menambahkan event listener ketika modal ditampilkan
    BeliModal.addEventListener('show.bs.modal', function (event) {
        // Mengambil tombol yang memicu modal
        const button = event.relatedTarget;

        // Mengambil atribut data dari tombol yang ditekan
        const NamaBarang = button.getAttribute('data-nama'); // Nama barang
        const Harga = button.getAttribute('data-harga'); // Harga barang
        const IdBarang = button.getAttribute('data-id'); // ID barang
        const IdUser = button.getAttribute('data-user'); // ID user

        // Menampilkan nama barang di dalam modal
        BeliModal.querySelector('#NamaBarang').innerText = NamaBarang;
        // Menampilkan harga barang dengan format mata uang
        BeliModal.querySelector('#Harga').innerText = 'Rp ' + Harga;
        // Menyimpan ID barang ke dalam input tersembunyi
        BeliModal.querySelector('#IdBarang').value = IdBarang;
        // Menyimpan ID user ke dalam input tersembunyi
        BeliModal.querySelector('#IdUser').value = IdUser;
    });
});

// Menunggu hingga DOM sepenuhnya dimuat sebelum menjalankan script
document.addEventListener('DOMContentLoaded', function () {
    // Mengambil elemen modal dan input yang terkait dengan perhitungan harga
    const modal = document.getElementById('BeliModal');
    const jumlahInput = document.getElementById('jumlah');
    const totalHargaInput = document.getElementById('TotalHarga');
    const totalHargaText = document.getElementById('TotalHargaText');
    const plusButton = document.getElementById('plus');
    const minusButton = document.getElementById('minus');
    let hargaSatuan = 1; // Variabel untuk menyimpan harga satuan barang

    // Menambahkan event listener ketika modal ditampilkan
    modal.addEventListener('show.bs.modal', function (event) {
        // Mengambil tombol yang memicu modal
        const button = event.relatedTarget;

        // Mengambil atribut data dari tombol
        const namaBarang = button.getAttribute('data-nama'); // Nama barang
        hargaSatuan = parseInt(button.getAttribute('data-harga')) || 1; // Harga satuan barang (default 1 jika tidak ada)
        const idBarang = button.getAttribute('data-id'); // ID barang

        // Menampilkan nama barang di dalam modal
        modal.querySelector('#NamaBarang').innerText = namaBarang;
        // Menampilkan harga satuan barang dengan format mata uang
        modal.querySelector('#Harga').innerText = 'Rp ' + hargaSatuan;
        // Menampilkan total harga awal (harga satuan)
        modal.querySelector('#TotalHargaText').innerText = 'Rp ' + hargaSatuan.toLocaleString('id-ID');
        // Menyimpan total harga ke dalam input tersembunyi
        modal.querySelector('#TotalHarga').value = hargaSatuan;
        // Menyetel jumlah awal menjadi 1
        modal.querySelector('#jumlah').value = 1;
    });

    // Fungsi untuk menghitung dan memperbarui total harga berdasarkan jumlah barang
    function updateTotal() {
        let jumlah = parseInt(jumlahInput.value) || 1; // Mengambil nilai jumlah barang (default 1 jika kosong)
        let totalHarga = jumlah * hargaSatuan; // Menghitung total harga
        totalHargaText.innerText = 'Rp ' + totalHarga.toLocaleString('id-ID'); // Menampilkan total harga dengan format mata uang
        totalHargaInput.value = totalHarga; // Menyimpan total harga ke dalam input tersembunyi
    }

    // Event listener untuk tombol tambah jumlah barang
    plusButton.addEventListener('click', function () {
        jumlahInput.value = parseInt(jumlahInput.value) + 1; // Menambah jumlah barang
        updateTotal(); // Memperbarui total harga
    });

    // Event listener untuk tombol kurangi jumlah barang
    minusButton.addEventListener('click', function () {
        if (parseInt(jumlahInput.value) > 1) { // Mencegah jumlah kurang dari 1
            jumlahInput.value = parseInt(jumlahInput.value) - 1; // Mengurangi jumlah barang
            updateTotal(); // Memperbarui total harga
        }
    });
});
