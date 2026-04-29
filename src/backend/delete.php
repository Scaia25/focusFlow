<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('connection.php');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_start();
    $email = $_SESSION['user']['email'];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

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

    if(!$resTasks || !$resUsers || !$resNotes) {
        die("Errore di eliminazione dell'utente");
    }

    $_SESSION = array();
    session_destroy();
}

header("../../index.php");
exit;
?>