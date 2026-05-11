<?php
require('../../backend/connection.php');
session_start();

if (!isset($_SESSION['user']) || !$_SESSION['user']['isLogged']) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>AI Assistant — FocusFlow</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/chat.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="app-container chat-mode">
        <header class="main-header">
            <div class="user-info">
                <h1>AI Assistant ✨</h1>
                <p>Chiedimi di organizzare i tuoi pensieri.</p>
            </div>
        </header>

        <!-- Quick Prompts in evidenza sopra la chat -->
        <div class="quick-prompts-container">
            <div class="quick-prompts-scroll">
                <button class="quick-prompt-btn"
                    data-prompt="Organizza la mia giornata: ho bisogno di una pianificazione con priorità.">
                    🗓️ Organizza giornata
                </button>
                <button class="quick-prompt-btn"
                    data-prompt="Aiutami a fare un brain dump: ho troppi pensieri confusi e voglio metterli in ordine.">
                    🧠 Brain dump
                </button>
                <button class="quick-prompt-btn"
                    data-prompt="Suggerisci una tecnica di focus per concentrarmi meglio in questo momento.">
                    🎯 Tecnica focus
                </button>
                <!-- ✅ NUOVO: Bottone anti-panico -->
                <button class="quick-prompt-btn panic-btn"
                    data-prompt="STO AVENDO UN ATTACCO DI PANICO. Aiutami subito: 1. Fammi fare un esercizio di respirazione guidata 2. Aiutami a radicarmi nel presente 3. Ricordami che passerà 4. Dammi un piano d'azione immediato.">
                    🆘 Anti-panico
                </button>
            </div>
        </div>

        <main class="chat-container" id="chat-window">
            <div class="message ai-message">
                <div class="message-content">
                    Ciao <?php echo $name; ?>, sono il tuo supporto cognitivo. Hai dei pensieri caotici da scaricare o
                    vuoi pianificare una sessione di focus? 🌊
                </div>
            </div>
        </main>

        <div class="chat-input-area">
            <form id="chat-form" class="chat-form">
                <textarea id="user-input" placeholder="Scrivi qui..." rows="1"></textarea>
                <button type="submit" class="send-btn">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
        </div>

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

    <script src="../js/chat.js"></script>
</body>

</html>