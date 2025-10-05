<?php
session_start();

// Hapus semua data session
session_unset();
session_destroy();

// Akan kembali lagi ke halaman login
header("Location: login.php?logout=success");
exit();
?>
