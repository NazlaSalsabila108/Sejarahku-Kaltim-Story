<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php?access=denied");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Sejarahku Kaltim Story</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<header>
    <div class="header-content">
        <h1>Selamat datang, <?php echo $username; ?>!</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php?page=tentang">Tentang</a></li>
                <li><a href="dashboard.php?page=cerita">Cerita</a></li>
                <li><a href="dashboard.php?page=kontak">Kontak</a></li>
                <li><a href="logout.php" class="btn btn-secondary">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
<?php
$page = $_GET['page'] ?? 'tentang';

if ($page === 'tentang') {
    include 'partials/tentang.php';
} elseif ($page === 'cerita') {
    include 'partials/cerita.php';
} elseif ($page === 'kontak') {
    include 'partials/kontak.php';
} else {
    echo "<section class='card'><h2>Halaman tidak ditemukan</h2></section>";
}
?>
</main>

<footer>
    <p>&copy; 2025 Sejarahku Kaltim Story</p>
</footer>

<script src="script.js"></script>
</body>
</html>