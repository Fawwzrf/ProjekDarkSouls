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

            $success = "Login Berhasil!";
        } else {
            $error = "Login Gagal! Password salah.";
        }
    } else {
        $error = "Login Gagal! Username tidak ditemukan.";
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
                    </table>
                    <button class="login" type="submit">Login</button>
                </form>
            </div>
            <div class="akun">
                <p>Belum punya akun?</p>
                <button class="register" id="register-btn">Register</button>
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
        const registerButton = document.getElementById('register-btn');

        popupButton.addEventListener('click', function() {
            const isSuccess = popup.dataset.success === 'true';
            if (isSuccess) {
                // Mainkan suara saat login berhasil
                buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
                // Mulai animasi dan pindah halaman setelah suara diputar
                container.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = '../startquiz/startquiz.php';
                }, 1000); // Waktu animasi out
            }

            popup.classList.remove('show');
            overlay.classList.remove('show');
        });

        registerButton.addEventListener('click', function() {
            buttonSound.play().catch(error => console.error("Audio tidak dapat diputar:", error));
            // Arahkan ke halaman register
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = '../register/register.php';
            }, 1000); // Waktu animasi out
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
