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
        $error = "Registrasi gagal! Username atau email sudah digunakan.";
    } else {
        // Insert data ke tabel users
        $insert_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($koneksi, $insert_query)) {
            $success = "Registrasi Berhasil! Anda akan diarahkan ke halaman login.";
        } else {
            $error = "Registrasi gagal! Periksa data yang anda masukkan!";
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
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td><img src="../../Asset/Register login/mahkota.png" alt=""></td>
                            <td>Username</td>
                            <td><input type="text" id="username" name="username" required></td>
                        </tr>
                        <tr>
                            <td><img src="../../Asset/Register login/tameng.png" alt=""></td>
                            <td>Password</td>
                            <td><input type="password" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><img src="../../Asset/Register login/Pedang.png" alt="" id="pdg"></td>
                            <td>Email</td>
                            <td><input type="text" id="email" name="email" required></td>
                        </tr>
                    </table>
                    <button class="register" type="submit" id="register-btn">Register</button>
                </form>
            </div>
            <div class="akun">
                <p>Sudah punya akun?</p>
                <button class="login" id="login-btn">Login</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <p id="popupMessage"></p>
        <button id="popupButton">OK</button>
    </div>

    <script>
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const popupMessage = document.getElementById('popupMessage');
        const popupButton = document.getElementById('popupButton');
        const container = document.querySelector('.container');
        const buttonSound = document.getElementById('button-sound');
        const loginButton = document.getElementById('login-btn');

        popupButton.addEventListener('click', function() {
            const isSuccess = popup.dataset.success === 'true';
            if (isSuccess) {
                buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
                container.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = '../login/login.php';
                }, 1000);
            }

            popup.classList.remove('show');
            overlay.classList.remove('show');
        });

        loginButton.addEventListener('click', function() {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../login/login.php';
            }, 1000);
        });

        <?php if (isset($success)) { ?>
        document.addEventListener('DOMContentLoaded', function() {
            popupMessage.textContent = "<?php echo $success; ?>";
            popup.dataset.success = 'true';
            popup.classList.add('show');
            overlay.classList.add('show');
        });
        <?php } elseif (isset($error)) { ?>
        document.addEventListener('DOMContentLoaded', function() {
            popupMessage.textContent = "<?php echo $error; ?>";
            popup.dataset.success = 'false';
            popup.classList.add('show');
            overlay.classList.add('show');
        });
        <?php } ?>
    </script>
</body>

</html>
