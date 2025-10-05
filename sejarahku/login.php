<?php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php?status=already_logged_in");
    exit();
}

// Data user disimpan di array asosiatif
$users = [
    "admin" => "12345",
    "Nazla" => "2409106108"
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php?status=success");
        exit();
    } else {
        $error = "Username atau password kamu salah nih!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- menautkan ke file CSS -->
    <link rel="stylesheet" href="style3.css">
</head>
<body>

<header>
    <h1>Hallo, Selamat Datang di Website Sejarah Kami!</h1>
    <p>Silahkan login untuk melanjutkannya nih!</p>
</header>

<main>
    <div class="card auth-card">
        <h2>Login Akun</h2>

        <?php if ($error): ?>
            <p style="color:red; text-align:center; font-weight:600;">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> Sejarahku Kaltim Story. All Rights Reserved.</p>
</footer>

</body>
</html>