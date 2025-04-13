<?php

include_once __DIR__ . '/../controllers/conn.php';



class Barang {
    public function TambahBarang($NamaBarang, $Harga,$Besarandiskon){
        $conn = new database();
        $sql = "INSERT INTO barang VALUES (NULL, '$NamaBarang', '$Harga','$Besarandiskon')";

        $result = mysqli_query($conn->koneksi, $sql);

        if($result){
            header("Location: ../views/barang.php");
        }else{
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/barang.php'</script>";
        }
    }

    public function TampilData(){
        $conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM barang ORDER BY IdBarang desc ");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
    }
    function tampil_data_byid($id)
    {
        $conn = new database();
        $sql = " SELECT * FROM barang  WHERE IdBarang = $id";

        $query = mysqli_query($conn->koneksi, $sql);

        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        } else {
            echo "tidak ada data";
        }
    }

    public function Hapus($id){
        $conn = new database();
        $sql = "DELETE FROM barang WHERE IdBarang = '$id'";
        $result = mysqli_query($conn->koneksi, $sql);
		return $result;
    }

    public function Edit($id, $NamaBarang, $Harga,$Besarandiskon){
        $conn = new database();
        $sql = "UPDATE barang SET NamaBarang='$NamaBarang', Harga='$Harga', Besarandiskon='$Besarandiskon' WHERE IdBarang = '$id'";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            header("Location: ../views/barang.php");
        } else {
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/barang.php'</script>";
        }
    }

    public function HitungBarang(){
        $conn = new database();
        $sql = "SELECT COUNT(*) AS total FROM barang";
        $result = mysqli_query($conn->koneksi, $sql);
        $data = mysqli_fetch_assoc($result);

    return $data['total'];
    }
    public function HitungTransaksi(){
        $conn = new database();
        $sql = "SELECT COUNT(*) AS total FROM transaksi";
        $result = mysqli_query($conn->koneksi, $sql);
        $data = mysqli_fetch_assoc($result);

    return $data['total'];
    }
}