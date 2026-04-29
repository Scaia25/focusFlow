<?php
require('../../backend/connection.php');

session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user']['isLogged']) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user']['email'];
$name = $_SESSION['user']['name'];
$surname = $_SESSION['user']['surname'];
$type = $_SESSION['user']['type'];
$work_start = $_SESSION['user']['work_start'];
$work_end = $_SESSION['user']['work_end'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['account'])) {
        $newName = trim($_POST['name'] ?? '');
        $newSurname = trim($_POST['surname'] ?? '');

        if (!empty($name) && !empty($surname) && !empty($email)) {
            $_SESSION['user']['name'] = $newName;
            $_SESSION['user']['surname'] = $newSurname;

            $query = "UPDATE users SET name = ?, surname = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $newName, $newSurname, $email);
            if ($stmt->execute()) {
                $_SESSION['user']['name'] = $newName;
                $_SESSION['user']['surname'] = $newSurname;
                $name = $newName;
                $surname = $newSurname;
                echo '
                <div id="status-widget" class="status-widget hide">
                    <div class="widget-content">
                        <span class="widget-icon">✅</span>
                        <span id="widget-message">Modifiche salvate con successo!</span>
                    </div>
                </div>';
            }
        } else {
            echo '
            <div class="warning-container">
                <div class="warning-icon">
                    <span class="pulse"></span>
                    <i class="icon">⚠️</i>
                </div>
                <div class="warning-content">
                    <h3 class="warning-title">Campi vuoti</h3>
                    <p class="warning-text">Compilare tutti i campi con valori validi!</p>
                </div>
                <button class="warning-close" aria-label="Chiudi">&times;</button>
            </div>';
        }
    } else if (isset($_POST['routine'])) {
        $newWork_start = trim($_POST['work_start'] ?? '');
        $newWork_end = trim($_POST['work_end'] ?? '');
        $newType = trim($_POST['type'] ?? '');


        if (!empty($newWork_start) && !empty($newWork_end) && !empty($newType)) {
            $time1 = new DateTime($newWork_start);
            $time2 = new DateTime($newWork_end);

            if ($time1 < $time2) {
                $query = "UPDATE users SET work_start = ?, work_end = ?, type = ? WHERE email = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $newWork_start, $newWork_end, $newType, $email);
                if ($stmt->execute()) {
                    $_SESSION['user']['work_start'] = $newWork_start;
                    $_SESSION['user']['work_end'] = $newWork_end;
                    $_SESSION['user']['type'] = $newType;
                    $work_start = $newWork_start;
                    $work_end = $newWork_end;
                    $type = $newType;
                    echo '
                <div id="status-widget" class="status-widget hide">
                    <div class="widget-content">
                        <span class="widget-icon">✅</span>
                        <span id="widget-message">Modifiche salvate con successo!</span>
                    </div>
                </div>';
                }
            } else {
                echo '
                <div class="warning-container">
                    <div class="warning-icon">
                        <span class="pulse"></span>
                        <i class="icon">⚠️</i>
                    </div>
                    <div class="warning-content">
                        <h3 class="warning-title">Orari non validi</h3>
                        <p class="warning-text">L\'orario di fine deve essere maggiore di quello d\'inizio!</p>
                    </div>
                    <button class="warning-close" aria-label="Chiudi">&times;</button>
                </div>';
            }
        } else {
            echo '
            <div class="warning-container">
                <div class="warning-icon">
                    <span class="pulse"></span>
                    <i class="icon">⚠️</i>
                </div>
                <div class="warning-content">
                    <h3 class="warning-title">Campi vuoti</h3>
                    <p class="warning-text">Compilare tutti i campi con valori validi!</p>
                </div>
                <button class="warning-close" aria-label="Chiudi">&times;</button>
            </div>';
        }
    }

}
?>

<?php
/* format work time to show on the routine settings section */
$work_start = new DateTime($work_start);
$work_end = new DateTime($work_end);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Impostazioni — FocusFlow</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="app-container">
        <header class="main-header">
            <div class="user-info">
                <h1>Impostazioni ⚙️</h1>
                <p>Personalizza la tua esperienza.</p>
            </div>
            <a href="../../backend/logout.php" class="logout-link">Logout</a>
        </header>

        <main class="settings-content">

            <section class="settings-group">
                <h2 class="group-title">Account</h2>
                <div class="settings-card">
                    <form action="settings.php" method="POST" class="settings-form">
                        <div class="input-field">
                            <label>Nome</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="custom-input" required>
                        </div>
                        <div class="input-field">
                            <label>Cognome</label>
                            <input type="text" name="surname" value="<?php echo $surname; ?>" class="custom-input"
                                required>
                            <div class="input-field">
                                <label>Email</label>
                                <input style="color: #7d7d7d;" type="email" name="email" value="<?php echo $email; ?>"
                                    class="custom-input" readonly>
                            </div>
                        </div>
                        <button type="submit" name="account" class="btn-save">Aggiorna Profilo</button>
                    </form>
                </div>
            </section>

            <section class="settings-group">
                <h2 class="group-title">Routine Giornaliera</h2>
                <div class="settings-card">
                    <form action="settings.php" method="POST" class="settings-form">
                        <div class="input-field">
                            <label>Profilo</label>
                            <div class="toggle-container">
                                <input type="radio" id="worker" name="type" value="worker" <?php if ($type == "worker")
                                    echo "checked"; ?>>
                                <label for="worker">Lavoratore</label>
                                <input type="radio" id="student" name="type" value="student" <?php if ($type == "student")
                                    echo "checked"; ?>>
                                <label for="student">Studente</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-field">
                                <label>Inizio</label>
                                <input type="time" name="work_start" value="<?php echo $work_start->format('H:i'); ?>"
                                    class="custom-input" required>
                            </div>
                            <div class="input-field">
                                <label>Fine</label>
                                <input type="time" name="work_end" value="<?php echo $work_end->format('H:i'); ?>"
                                    class="custom-input" required>
                            </div>
                        </div>

                        <!--
                        <div class="input-field">
                            <label>Pausa Pranzo</label>
                            <div class="form-row">
                                <input type="time" name="break_start" value="13:00" class="custom-input">
                                <input type="time" name="break_end" value="14:00" class="custom-input">
                            </div>
                        </div>
                        -->

                        <button type="submit" name="routine" class="btn-save">Salva Routine</button>
                    </form>
                </div>
            </section>

            <section class="settings-group">
                <h2 class="group-title danger-text">Zona Pericolosa</h2>
                <div class="settings-card danger-card">
                    <p>Una volta eliminato l'account, tutti i tuoi dati andranno persi per sempre.</p>

                    <form id="delete-form" action="delete_account.php" method="POST" style="display: none;">
                        <input type="hidden" name="confirm_delete" value="1">
                    </form>

                    <button onclick="handleDelete()" class="btn-delete-account">Elimina Account</button>
                </div>
            </section>

        </main>

        <nav class="nav-wrapper">
            <div class="bottom-nav">
                <a href="dashboard.php" class="nav-item">🏠 <span class="label">Oggi</span></a>
                <a href="chat.php" class="nav-item">💬 <span class="label">AI Chat</span></a>
                <div class="nav-add"><a href="insert.php"><button class="add-button">+</button></a></div>
                <a href="diary.php" class="nav-item">🗒 <span class="label">Diario</span></a>
                <a href="settings.php" class="nav-item">⚙️ <span class="label">Settings</span></a>
            </div>
        </nav>
    </div>

    <script>    
        function handleDelete() {
            const confirmed = confirm("Sei sicuro di voler eliminare il tuo account? Questa azione è irreversibile.");

            if (confirmed) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

    <script src="../js/script.js"></script>
</body>

</html>