<?php
include 'koneksi.php';

class LoginController {
    public function handleLogin($username, $password) {
        $username = mysqli_real_escape_string($GLOBALS['koneksi'], $username);
        $password = mysqli_real_escape_string($GLOBALS['koneksi'], $password);

        $query = "SELECT * FROM login_admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($GLOBALS['koneksi'], $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            return "Login berhasil!";
        } else {
            return "Username atau password salah.";
        }
    }

    public function handleLogout() {
        session_start();
        session_unset();  // Menghapus semua variabel sesi
        session_destroy(); // Menghancurkan sesi
        header("Location: login.php"); // Arahkan kembali ke halaman login
        exit();
    }
}

// Tangani aksi logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $loginController = new LoginController();
    $loginController->handleLogout();
}
?>
