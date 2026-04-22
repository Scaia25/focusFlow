<?php
require_once('connection.php');

session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user']['isLogged']) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user']['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['memory'])) {
        $description = trim($_POST['description'] ?? '');
        $title = trim($_POST['title'] ?? '');

        if (!empty($description) && !empty($title)) {
            $query = "INSERT INTO notes (user_email, description, title) values (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $email, $description, $title);
            if ($stmt->execute()) {
                echo '
                <div id="success-overlay" style="
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(15, 23, 42, 0.4); /* Sfondo semi-trasparente */
                    backdrop-filter: blur(4px);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 9999;
                    animation: fadeIn 0.3s ease-out;
                ">
                    <div style="
                        background: white;
                        padding: 30px;
                        border-radius: 32px;
                        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        text-align: center;
                        max-width: 90%;
                        width: 320px;
                        border-bottom: 8px solid #d97706;
                        animation: scaleIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    ">
                        <div style="
                            width: 60px;
                            height: 60px;
                            background: rgba(79, 70, 229, 0.1);
                            border-radius: 20px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 30px;
                            margin-bottom: 20px;
                            color: var(--primary);
                        ">
                            ✨
                        </div>
                        <h4 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin-bottom: 8px;">
                            Nota salvata!
                        </h4>
                        <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 24px; line-height: 1.5;">
                            Il tuo pensiero è stato<br>custodito nel diario.
                        </p>
                        <button onclick="document.getElementById(\'success-overlay\').remove()" style="
                            background: #f59e0b;
                            color: white;
                            border: none;
                            padding: 12px 30px;
                            border-radius: 14px;
                            font-weight: 700;
                            cursor: pointer;
                            width: 100%;
                            transition: transform 0.2s;
                        ">
                            Ottimo!
                        </button>
                    </div>
                </div>

                <style>
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                @keyframes scaleIn {
                    from { opacity: 0; transform: scale(0.8); }
                    to { opacity: 1; transform: scale(1); }
                }
                </style>
                ';
            } else {
                die("Errore nel caricamento dati nel database!");
            }
        } else {
            echo "<script>alert('Errore nei parametri!')</script>";
        }
    } else if (isset($_POST['task'])) {
        $description = trim($_POST['description'] ?? '');
        $task_date = $_POST['task_date'] ?? null;
        $task_hour = $_POST['task_hour'] ?? null;
        
        if (!empty($description) && !empty($task_date) && !empty($task_hour)) {
            $query = "INSERT INTO tasks (user_email, description, task_date, task_hour) values (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $email, $description, $task_date, $task_hour);
            if ($stmt->execute()) {
                echo '
                <div id="success-overlay" style="
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(15, 23, 42, 0.4); /* Sfondo semi-trasparente */
                    backdrop-filter: blur(4px);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 9999;
                    animation: fadeIn 0.3s ease-out;
                ">
                    <div style="
                        background: white;
                        padding: 30px;
                        border-radius: 32px;
                        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        text-align: center;
                        max-width: 90%;
                        width: 320px;
                        border-bottom: 8px solid #3730a3;
                        animation: scaleIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    ">
                        <div style="
                            width: 60px;
                            height: 60px;
                            background: rgba(79, 70, 229, 0.1);
                            border-radius: 20px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 30px;
                            margin-bottom: 20px;
                            color: var(--primary);
                        ">
                            ✨
                        </div>
                        <h4 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin-bottom: 8px;">
                            Nota salvata!
                        </h4>
                        <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 24px; line-height: 1.5;">
                            L\'attività è stata<br>salvata nel diario.
                        </p>
                        <button onclick="document.getElementById(\'success-overlay\').remove()" style="
                            background: #665bff;
                            color: white;
                            border: none;
                            padding: 12px 30px;
                            border-radius: 14px;
                            font-weight: 700;
                            cursor: pointer;
                            width: 100%;
                            transition: transform 0.2s;
                        ">
                            Ottimo!
                        </button>
                    </div>
                </div>

                <style>
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                @keyframes scaleIn {
                    from { opacity: 0; transform: scale(0.8); }
                    to { opacity: 1; transform: scale(1); }
                }
                </style>
                ';
            } else {
                die("Errore nel caricamento dati nel database!");
            }
        } else {
            echo "<script>alert('Errore nei parametri!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Aggiungi al diario — FocusFlow</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="insert.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="app-container">
        <header class="main-header">
            <div class="user-info">
                <h1>Nuovo Elemento ⚡</h1>
                <p>Scarica i pensieri, libera la mente.</p>
            </div>
            <a href="dashboard.php" class="cancel-link">Annulla</a>
        </header>

        <main class="grid-layout">
            <section class="insert-card task-border">
                <div class="card-tag" style="background: rgba(79, 70, 229, 0.2); color: #3730a3;">Azione Rapida</div>
                <h3 class="insert-title">Cosa vuoi fare?</h3>
                <form action="insert.php" method="POST" class="insert-form">
                    <input type="text" name="description" class="custom-input" placeholder="Es: Comprare il pane..."
                        required>
                    <div class="form-rows">
                        <input type="time" name="task_hour" class="custom-input time-input"
                            value="<?php echo date('H:i'); ?>">
                        <input type="date" name="task_date" class="custom-input date-input"
                            value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <button type="submit" name="task" class="btn-primary save-task"
                        style="background: #665bff; width: 100%;">Aggiungi attività</button>
                </form>
            </section>

            <section class="insert-card memory-border">
                <div class="card-tag" style="background: rgba(245, 158, 11, 0.2); color: #d97706;">Note</div>
                <h3 class="insert-title">Nota importante</h3>
                <form action="insert.php" method="POST" class="insert-form">
                    <input type="text" name="title" class="custom-input" placeholder="Dai un titolo alla tua nota...">
                    <textarea name="description" class="custom-input"
                        placeholder="Scrivi qui i tuoi appunti per non scordarli mai più..." rows="4"></textarea>
                    <button type="submit" name="memory" class="btn-primary save-memory"
                        style="background: #f59e0b; width: 100%;">Salva nota</button>
                </form>
            </section>
        </main>

        <nav class="nav-wrapper">
            <div class="bottom-nav">
                <a href="dashboard.php" class="nav-item">🏠 <span class="label">Oggi</span></a>
                <a href="#" class="nav-item">💬 <span class="label">AI Chat</span></a>
                <div class="nav-add"><a href="insert.php"><button class="add-button">+</button></a></div>
                <a href="diary.php" class="nav-item">🗒 <span class="label">Diario</span></a>
                <a href="settings.php" class="nav-item">⚙️ <span class="label">Settings</span></a>
            </div>
        </nav>
    </div>

</body>

</html>