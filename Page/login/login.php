<?php
session_start();
include('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk memeriksa username
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data user ke session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirect ke halaman startquiz.php
            header("Location: ../startquiz/startquiz.php");
            exit();
        } else {
            $error = "Login gagal. Password salah.";
        }
    } else {
        $error = "Login gagal. Username tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="logstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
</head>

<body>
    <audio id="button-sound" src="../../Asset/Video&Font/button_click.mp3"></audio>

    <div class="container">
        <img src="../../Asset/Register login/Background Login.png" alt="" class="border">
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
                    </table>
                    <button class="login" type="button" id="login-btn">Login</button>
                </form>
            </div>
            <div class="akun">
                <p>Belum punya akun?</p>
                <button class="register" id="register-btn">Register</button>
            </div>
        </div>
    </div>
    <script>
        const container = document.querySelector('.container');
        const loginButton = document.getElementById('login-btn');
        const registerButton = document.getElementById('register-btn');
        const buttonSound = document.getElementById('button-sound');

        // Handle login button click
        loginButton.addEventListener('click', () => {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../startquiz/startquiz.php';
            }, 1000); // Waktu animasi out (1 detik)
        });

        // Handle register button click
        registerButton.addEventListener('click', () => {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../register/register.php';
            }, 1000); // Waktu animasi out (1 detik)
        });
    </script>
</body>
<?php if (isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
</html>