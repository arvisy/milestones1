<?php
    include("register-data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../asset/css/register.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <form method="post" action="../php/register-data.php">
                <div class="field-form">
                    <label for="nama">Nama:</label>
                    <div class="input-with-icon">
                        <img src="../asset/image/user.png" alt="User Icon">
                        <input type="text" name="nama" placeholder="Nama" required>
                    </div>
                </div>                
                <div class="field-form">
                    <label for="telepon">Telepon:</label>
                    <div class="input-with-icon">
                        <img src="../asset/image/phone-call.png" alt="Phone Icon">
                        <input type="text" name="telepon" placeholder="Telepon" required>
                    </div>
                </div>
                <div class="field-form">
                    <label for="email">Email:</label>
                    <div class="input-with-icon">
                        <img src="../asset/image/email.png" alt="Email Icon">
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="field-form">
                    <label for="password">Password:</label>
                    <div class="input-with-icon">
                        <img src="../asset/image/padlock.png" alt="Password Icon">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="field-form">
                    <input type="submit" name="register" value="Register">
                </div>
                <div class="field-form">
                    <hr class="horizontal-line">
                </div>
                <div class="field-form">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

