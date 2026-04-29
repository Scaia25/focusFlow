<?php
require('../../backend/connection.php');

session_start();

if (!isset($_SESSION['user']['isLogged']) || !$_SESSION['user']['isLogged']) {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM users WHERE email = ? ";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows == 1) {
                $row = $res->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['name'] = $row['name'];
                    $_SESSION['user']['surname'] = $row['surname'];
                    $_SESSION['user']['work_start'] = $row['work_start'];
                    $_SESSION['user']['work_end'] = $row['work_end'];
                    $_SESSION['user']['type'] = $row['type'];
                    $_SESSION['user']['isLogged'] = true;
                    header("Location: dashboard.php");
                    exit();
                }
            }
            die("credenziali errate");
        } else {
            die("Inserire parametri validi");
        }
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>focusFlow — Accedi</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/login-signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <header class="login-header">
            <div class="logo-icon">🧠</div>
            <h1>Bentornato su focusFlow</h1>
            <p>Riduci il rumore, ritrova il focus.</p>
        </header>

        <form class="login-form" action="login.php" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="latua@email.com" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
            </div>

            <!--<div class="form-options">
                <label class="remember-me">
                    <input type="checkbox"> Mantieni l'accesso
                </label>
                <a href="#" class="forgot-link">Password dimenticata?</a>
            </div>-->
            <button type="submit" class="btn-login">Entra nel Flusso</button>
        </form>

        <div class="login-footer">
            <p>Non hai un account? <a href="signup.php">Inizia ora gratis</a></p>
        </div>
    </div>

</body>

</html>