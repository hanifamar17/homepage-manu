<?php
require 'includes/db.php';

$username = 'admin';
$password = '17agustus45';

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
$stmt->execute([$username, $hash]);

echo "Admin created. HAPUS FILE INI SEKARANG.";