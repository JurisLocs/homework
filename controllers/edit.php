<?php
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$section_id = $_GET['id'] ?? null;

if ($section_id) {
    $stmt = $pdo->prepare('SELECT * FROM sections WHERE id = ?');
    $stmt->execute([$section_id]);
    $section = $stmt->fetch();

    if (!$section) {
        die('Section not found.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $data = $_POST['data'];

        $stmt = $pdo->prepare('UPDATE sections SET name = ?, data = ? WHERE id = ?');
        $stmt->execute([$name, $data, $section_id]);

        header('Location: sections');
        exit;
    }
} else {
    die('Invalid section ID.');
}

require 'views/edit.view.php'

?>

