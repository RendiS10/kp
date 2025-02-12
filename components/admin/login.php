<?php
session_start();
require 'koneksi.php';
require 'controller.php'; 

$message = ''; // Variabel untuk menampung pesan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    
    $loginController = new LoginController();
    $message = $loginController->handleLogin($username, $password); // Dapatkan pesan dari controller
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../../public/css/login.css" />
    <link
      rel="icon"
      href="../../public/assets/images/logo/LS-logo-master.png"
      type="image/x-icon"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section>
        <div class="login-container">
            <img src="../../public/assets/images/logo/LS-logo-master.png" alt="Logo Luarsekolah" />
            <fieldset>
                <legend>Login</legend>
                <form method="POST">
                    <ul>
                        <li>
                            <label for="username">Username/Email</label>
                            <input type="text" name="username" id="username" required />
                        </li>
                        <li>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required />
                        </li>
                        <li>
                            <input type="submit" value="Login" />
                        </li>
                    </ul>
                </form>
            </fieldset>
        </div>
    </section>

    <?php if (!empty($message)) : ?>
    <script>
        Swal.fire({
            title: "<?php echo (strpos($message, 'berhasil') !== false) ? 'Sukses!' : 'Gagal!'; ?>",
            text: "<?php echo $message; ?>",
            icon: "<?php echo (strpos($message, 'berhasil') !== false) ? 'success' : 'error'; ?>",
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed && '<?php echo $message; ?>'.includes('berhasil')) {
                window.location.href = 'homeadmin.php';
            }
        });
    </script>
    <?php endif; ?>
</body>
</html>
