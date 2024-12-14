<?php
session_start();
include('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Cek apakah username atau email sudah ada di database
    $check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Pendaftaran gagal. Username atau email sudah digunakan.";
    } else {
        // Insert data ke tabel users
        $insert_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($koneksi, $insert_query)) {
            header('Location: ../login/login.php');
            exit();
        } else {
            $error = "Pendaftaran gagal. Silakan coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="regisstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
</head>

<body>
    <audio id="button-sound" src="../../Asset/Video&Font/button_click.mp3"></audio>

    <div class="container">
        <img src="../../Asset/Register login/background.png" alt="" class="border">
        <div class="content">
            <div class="title">
                <h3>DARK SOULS</h3>
            </div>
            <div class="form">
                <form action="">
                    <table>
                        <tr>
                            <td><img src="../../Asset/Register login/mahkota.png" alt=""></td>
                            <td>Username</td>
                            <td><input type="text" id="username" name="username"></td>
                        </tr>
                        <tr>
                            <td><img src="../../Asset/Register login/tameng.png" alt=""></td>
                            <td>Password</td>
                            <td><input type="password" id="password" name="password"></td>
                        </tr>
                        <tr>
                            <td><img src="../../Asset/Register login/Pedang.png" alt="" id="pdg"></td>
                            <td>Email</td>
                            <td><input type="text" id="email" name="email"></td>
                        </tr>
                    </table>
                    <button class="register" type="button" id="register-btn">Register</button>
                </form>
            </div>
            <div class="akun">
                <p>Sudah punya akun?</p>
                <button class="login" id="login-btn">Login</button>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector('.container');
        const registerButton = document.getElementById('register-btn');
        const loginButton = document.getElementById('login-btn');
        const buttonSound = document.getElementById('button-sound');

        // Handle Register button click
        registerButton.addEventListener('click', () => {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../login/login.php';
            }, 1000); // Durasi animasi keluar
        });

        // Handle Login button click
        loginButton.addEventListener('click', () => {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../login/login.php';
            }, 1000); // Durasi animasi keluar
        });
    </script>
</body>
</html>
<?php if (isset($error)) echo "<p>$error</p>"; ?>