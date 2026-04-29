<?php
require('../../backend/connection.php');

session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user']['isLogged']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = ucfirst(trim($_POST['name'] ?? ''));
        $surname = ucfirst(trim($_POST['surname'] ?? ''));
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!empty($name) && !empty($surname) && !empty($email) && !empty($password)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $query = 'SELECT email FROM users WHERE email = ?';
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows == 1) {
                echo "
                utente già registrato";
            } else {
                $query = 'INSERT INTO users (name, surname, email, password) values (?, ?, ?, ?)';
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ssss', $name, $surname, $email, $password_hash);
                if ($stmt->execute()) {
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['surname'] = $surname;
                    $_SESSION['user']['work_start'] = "08:00:00";
                    $_SESSION['user']['work_end'] = "18:00:00";
                    $_SESSION['user']['type'] = "worker";
                    $_SESSION['user']['isLogged'] = true;

                    header('Location: dashboard.php');
                    exit;
                }
            }
        } else {
            die("
        <!DOCTYPE html>
        <html lang='it'>
        <head>
            <meta charset='UTF-8'>
            <link rel='stylesheet' href='base.css'>
            <link rel='stylesheet' href='login-signup.css'>
        </head>
        <body>
            <div class='login-container status-card'>
                <header class='login-header'>
                    <div class='error-icon'>❌</div>
                    <h1 class='error-title'>Dati mancanti</h1>
                    <p>Compila tutti i campi richiesti.</p>
                </header>
                <div style='width: 100%;'>
                    <a href='signup.php' class='btn-login' style='display: block; text-decoration: none;'>Torna indietro</a>
                </div>
            </div>
        </body>
        </html>");
        }
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang='it'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <title>focusFlow — Crea Account</title>
    <link rel='stylesheet' href='../css/base.css'>
    <link rel='stylesheet' href='../css/login-signup.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap'
        rel='stylesheet'>
</head>

<body>

    <div class='login-container'>
        <header class='login-header'>
            <div class='logo-icon'>🚀</div>
            <h1>Inizia il viaggio</h1>
            <p>Crea il tuo spazio di focus personalizzato.</p>
        </header>

        <form class='login-form' action='signup.php' method='POST'>
            <div class='input-group'>
                <label for='name'>Nome</label>
                <input type='text' name='name' id='name' placeholder='Mario' required>
            </div>  

            <div class='input-group'>
                <label for='surname'>Cognome</label>
                <input type='text' name='surname' id='surname' placeholder='Rossi' required>
            </div>

            <div class='input-group'>
                <label for='email'>Email</label>
                <input type='email' name='email' id='email' placeholder='esempio@mail.com' required>
            </div>

            <div class='input-group'>
                <label for='password'>Password</label>
                <input type='password' name='password' id='password' placeholder='Almeno 8 caratteri' required>
            </div>

            <div class='form-options'>
                <label class='remember-me'>
                    <input type='checkbox' required> Accetto i <a href='#' class='forgot-link'>Termini di Servizio</a>
                </label>
            </div>

            <button type='submit' class='btn-login'>Crea Account</button>
        </form>

        <div class='login-footer'>
            <p>Hai già un account? <a href='login.php'>Accedi qui</a></p>
        </div>
    </div>

</body>

</html>