<?php

include_once '../models/user.php';

$user = new User();

try {
    if (!empty($_GET['aksi'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        if ($_GET['aksi'] == 'register' && isset($_POST['register'])) {
            $NamaLengkap = $_POST['NamaLengkap'];
            $Role = $_POST['Role'];
            $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        
            $result = $user->register($Username, $Password, $NamaLengkap, $Role);
        
            if ($result) {
                $_SESSION['success_message'] = "Registrasi berhasil!";
                header("Location: ../login.php");
                exit;
            } else {
                echo "<script>
                        alert('Registrasi gagal, coba lagi');
                        window.location.href = '../login.php';
                      </script>";
            }
        }
        

        if ($_GET['aksi'] == 'login' && isset($_POST['login'])) {
            $user->login($Username, $Password);
        }
        if($_GET['aksi'] == 'logout'){
            $user->logout();
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

