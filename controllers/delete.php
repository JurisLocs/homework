<?php
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$section_id = $_GET['id'] ?? null;

if ($section_id) {
    $stmt = $pdo->prepare('DELETE FROM sections WHERE id = ?');
    $stmt->execute([$section_id]);

    header('Location: sections');
    exit;
} else {
    die('Invalid section ID.');
}
?>
