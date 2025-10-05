<?php
session_start();

// Jika sudah login, maka user akan langsung terhubung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php?status=already_logged_in");
    exit();
}

// Data user akan disimpan di array asosiatif
$users = [
    "admin" => "12345",
    "nazla" => "2409106108"
];

// Cek beranda utama 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php?login=success");
        exit();
    } else {
        header("Location: login.php?error=invalid");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>

<!-- <div class="container"> -->
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Masuk</button>
    </form>

    <?php
    if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
        echo "<p class='msg'>❌ Username atau password kamu salah nih! Tolong dicoba lagi yya</p>";
    }
    if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
        echo "<p class='success'>✅ Kamu sudah logout dengan aman deh sekarang.</p>";
    }
    if (isset($_GET['status']) && $_GET['status'] === 'unauthorized') {
        echo "<p class='msg'>⚠️ Silahkan login terlebih dahulu yya! ><</p>";
    }
    ?>
</div>

</body>
</html>