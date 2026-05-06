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
$work_start = $_SESSION['user']['work_start'];
$work_end = $_SESSION['user']['work_end'];
$type = $_SESSION['user']['type'];

// Cookie saving for daily tasklist
$query = "SELECT ID_task, user_email, description, task_hour FROM tasks WHERE user_email = ? AND task_date = curdate() ORDER BY task_hour ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();

$res = $stmt->get_result();

/* work_start and work_end calculation in hours for using in JS script */
$work_start = explode(':', $work_start);
$work_start = (double) $work_start[0] + ($work_start[1] / 60) + ($work_start[2] / 3600);

$work_end = explode(':', $work_end);
$work_end = (double) $work_end[0] + ($work_end[1] / 60) + ($work_end[2] / 3600);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>FocusFlow — Deep Focus</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="app-container">
        <header class="main-header">
            <div class="user-info">
                <h1>Ciao, <?php echo $name; ?> 👋</h1>
                <p>Liberati dalle distrazioni, concentrati sul presente.</p>
            </div>
            <a class="view-profile" href="settings.php">Visualizza profilo</a>
        </header>

        <main class="grid-layout">
            <section class="dashboard-header-stats">
                <div class="time-radar-container">
                    <svg class="time-radar" viewBox="0 0 100 50">
                        <path class="radar-bg" d="M10,45 A40,40 0 0,1 90,45" fill="none" stroke="#e2e8f0"
                            stroke-width="6" stroke-linecap="round" />
                        <path id="radar-progress-path" class="radar-progress" d="M10,45 A40,40 0 0,1 90,45" fill="none"
                            stroke="url(#radar-grad)" stroke-width="7" stroke-linecap="round" stroke-dasharray="126"
                            stroke-dashoffset="126" />
                        <defs>
                            <linearGradient id="radar-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#4f46e5" />
                                <stop offset="100%" stop-color="#6366f1" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="radar-info">
                        <span class="radar-label" id="radar-label">Giornata lavorativa</span>
                        <span class="radar-percent" id="radar-percent-text">0%</span>
                    </div>
                </div>

                <div class="temporal-indicators">
                    <div class="temp-item clock-box">
                        <span class="current-time" id="current-time"></span>
                        <span class="current-date" id="current-date"></span>
                    </div>
                </div>
            </section>

            <section class="focus-card">
                <div class="card-tag">Timer Iperfocus</div>

                <div class="time-presets">
                    <button class="preset-btn" onclick="startTimer(15)">15m</button>
                    <button class="preset-btn" onclick="startTimer(30)">30m</button>
                    <button class="preset-btn" onclick="startTimer(60)">60m</button>
                </div>

                <div class="timer-display">
                    <span class="time" id="timer-text">00:00</span>
                    <div class="timer-control">
                        <button class="btn-primary reset" onclick="resetTimer()">Resetta</button>
                        <button class="btn-primary player" id="pause-btn" onclick="togglePause()">Pausa</button>
                    </div>
                </div>

                <div class="progress-container">
                    <div class="progress-bar" id="progress-line" style="width: 0%;"></div>
                </div>
            </section>

            <section class="task-section">
                <div class="section-header">
                    <h3>Coda di lavoro per oggi</h3>
                    <span class="count"><?php echo $res->num_rows ?></span>
                </div>
                <div class="task-list">
                    <?php
                    if ($res->num_rows > 0) {
                        $taskNumber = 1;
                        while ($row = $res->fetch_assoc()) {
                            $cleanDescription = trim($row['description']);
                            $cookieName = "task_" . str_replace(' ', '_', $cleanDescription);

                            $isChecked = isset($_COOKIE[$cookieName]) ? 'checked' : '';

                            // Pulizia dati per HTML
                            $desc = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                            $time = new DateTime($row['task_hour']);
                            $time = $time->format('G:i');
                            $time = htmlspecialchars($time, ENT_QUOTES, 'UTF-8');

                            echo '<div class="task-card">
                                    <div class="task-icon">' . $taskNumber . '</div>
                                    <div class="task-info">
                                        <h4>' . $desc . '</h4>
                                        <p>' . $time . '</p>
                                    </div>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" ' . $isChecked . '
                                            onclick="toggleTaskCookie(this, \'' . addslashes($row['description']) . '\')">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>';

                            $taskNumber++;
                        }
                    } else {
                        echo "Nessuna attività in programma, aggiungila ora!";
                    }
                    ?>
                </div>
            </section>
        </main>

        <nav class="nav-wrapper">
            <div class="bottom-nav">
                <a href="dashboard.php" class="nav-item">🏠 <span class="label">Oggi</span></a>
                <a href="chat.php" class="nav-item active">💬 <span class="label">AI Chat</span></a>
                <div class="nav-add"><a href="insert.php"><button class="add-button">+</button></a></div>
                <a href="diary.php" class="nav-item">🧠 <span class="label">Memoria</span></a>
                <a href="settings.php" class="nav-item">⚙️ <span class="label">Settings</span></a>
            </div>
        </nav>
    </div>

    <?php
    if ($type == "worker") {
        echo "<script>let dayType = 'lavorativa'</script>";
    } else {
        echo "<script>let dayType = 'scolastica'</script>";
    }
    ?>

    <script>
        const work_start = <?php echo json_encode($work_start); ?>;
        const work_end = <?php echo json_encode($work_end); ?>;
        let type = <?php echo json_encode($type); ?>;
    </script>

    <script src="../js/script.js"></script>
</body>

</html>