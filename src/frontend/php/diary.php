<?php
require('../../backend/connection.php');
require('../../backend/functions.php');

session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user']['isLogged']) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user']['email'];

$query = "SELECT ID_note, title, description FROM notes JOIN users ON users.email = notes.user_email WHERE notes.user_email = ? ORDER BY ID_note ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$resNotes = $stmt->get_result();

$query = "SELECT ID_task, task_hour, task_date, description FROM tasks JOIN users ON users.email = tasks.user_email WHERE tasks.user_email = ? ORDER BY task_date DESC, task_hour DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$resTasks = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Diario — FocusFlow</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/diary.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="app-container">
        <header class="main-header">
            <div class="user-info">
                <h1>Il tuo Diario 📖</h1>
                <p>Cosa hai fatto finora?</p>
            </div>
        </header>

        <div class="diary-filter">
            <div class="filter-switch">
                <button class="f-btn active" id="taskBtn" onclick="showType('task')">Attività</button>
                <button class="f-btn" id="noteBtn" onclick="showType('note')">Note</button>
            </div>
        </div>

        <main class="diary-content">
            <?php
            if ($resTasks->num_rows > 0) {
                while ($row = $resTasks->fetch_assoc()) {
                    $desc = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');

                    $date = htmlspecialchars($row['task_date'], ENT_QUOTES, 'UTF-8');
                    $date = new DateTime($date);
                    $day = $date->format('d');
                    $month = month_translation($date->format('m'));
                    $year = $date->format('Y');


                    $time = htmlspecialchars($row['task_time'], ENT_QUOTES, 'UTF-8');
                    $time = new DateTime($time);
                    $time = $time->format('H:i');

                    echo "
                    <div class='diary-card task-element'>
                        <div class='card-main'>
                            <div class='card-left'>
                                <span class='tag-label tag-blue'>Attività</span>
                                <h3>$desc</h3>
                                <div class='meta-info'>
                                    <span>📅 $day $month $year </span>
                                    <span>⏰ $time</span>
                                </div>
                            </div>
                            <button class='delete-btn' onclick='deleteItem(this)'>🗑️</button>
                        </div>
                    </div>
                    ";
                }
            }


            if ($resNotes->num_rows > 0) {
                while ($row = $resNotes->fetch_assoc()) {
                    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                    $desc = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                    echo "
                    <div class='diary-card note-element' style='display: none;'>
                        <div class='card-main'>
                            <div class='card-left'>
                                <span class='tag-label tag-orange'>Nota</span>
                                <h3>$title</h3>
                                <p class='note-text'>$desc</p>
                            </div>
                            <button class='delete-btn'>🗑️</button>
                        </div>
                    </div>
                    ";
                }
            }
            ?>
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
        function showType(type) {
            // Cambio stile bottoni
            document.querySelectorAll('.f-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(type + 'Btn').classList.add('active');

            // Filtro elementi
            const tasks = document.querySelectorAll('.task-element');
            const notes = document.querySelectorAll('.note-element');

            if (type === 'task') {
                tasks.forEach(t => t.style.display = 'block');
                notes.forEach(n => n.style.display = 'none');
            } else {
                tasks.forEach(t => t.style.display = 'none');
                notes.forEach(n => n.style.display = 'block');
            }
        }

        function deleteItem(btn) {
            if (confirm('Vuoi eliminare questo elemento?')) {
                btn.closest('.diary-card').remove();
                // Qui andrà la chiamata AJAX per il database
            }
        }
    </script>
</body>

</html>