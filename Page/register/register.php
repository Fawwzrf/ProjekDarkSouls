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
    <div class="container">
        <img src="/Asset/Register login/background.png" alt="" class="border">
        <div class="content">
            <div class="title">
                <h3>DARK SOULS</h3>
            </div>
            <div class="form">
                <form action="">
                    <table>
                        <tr>
                            <td><img src="/Asset/Register login/mahkota.png" alt=""></td>
                            <td>Username</td>
                            <td><input type="text" name="" id="username"></td>
                        </tr>
                        <tr>
                            <td><img src="/Asset/Register login/tameng.png" alt=""></td>
                            <td>Password</td>
                            <td><input type="password" name="" id="password"></td>
                        </tr>
                        <tr>
                            <td><img src="/Asset/Register login/Pedang.png" alt="" id="pdg"></td>
                            <td>Email</td>
                            <td><input type="text" name="" id="email"></td>
                        </tr>
                    </table>
                    <button class="register"type="button" onclick="location.href='/Page/login/login.php'">Register</button>
                </form>
            </div>
            <div class="akun">
                <p>Sudah punya akun?</p>
                <button class="login" onclick="location.href='/Page/login/login.php'">Login</button>
            </div>
        </div>
    </div>
</body>

</html>