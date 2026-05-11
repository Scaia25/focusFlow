<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('connection.php');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_start();
    $email = $_SESSION['user']['email'];

    $query = "DELETE FROM tasks WHERE user_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $email);
    $resTasks = $stmt->execute();

    $query = "DELETE FROM notes WHERE user_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $email);
    $resNotes = $stmt->execute();

    $query = "DELETE FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $email);
    $resUsers = $stmt->execute();

    if (!$resTasks || !$resUsers || !$resNotes) {
        die("Errore di eliminazione dell'utente");
    }

    $_SESSION = [];
    session_destroy();

    echo "<script>localStorage.clear()</script>";
    
    $_COOKIE = [];
}

header("Location: ../../index.php");
exit;
?>