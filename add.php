<?php var_dump($_POST);
require_once('config.php');
requireLogin(); // Только для авторизованных

if ($_POST) {
    $message = trim($_POST['message'] ?? '');

    if ($message) {
        $stmt = $pdo->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
        $stmt->execute([getCurrentUserId(), $message]);
    }

    header('Location: index.php');
    exit;
}
if ($_POST) {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    }

    if ($name && $message) {
        
        $stmt = $pdo->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
        $stmt->execute([$name, $message]);

        
        header('Location: index.php');
        exit;
    } else {
        $error = "Пожалуйста, заполните все поля.";
    }
    
?>