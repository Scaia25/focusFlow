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
                <a href="chat.php" class="nav-item active">💬 <span class="label">AI Chat</span></a>
                <div class="nav-add"><a href="insert.php"><button class="add-button">+</button></a></div>
                <a href="diary.php" class="nav-item">🧠 <span class="label">Memoria</span></a>
                <a href="settings.php" class="nav-item">⚙️ <span class="label">Settings</span></a>
            </div>
        </nav>
    </div>

    <script>       // Auto-resize textarea
        const tx = document.getElementsByTagName("textarea");
        for (let i = 0; i < tx.length; i++) {
            tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
            tx[i].addEventListener("input", OnInput, false);
        }

        function OnInput() {
            this.style.height = "auto";
            this.style.height = (this.style.scrollHeight) + "px";
        }
    </script>


    <script>
        const chatForm = document.getElementById('chat-form');
        const inputField = document.getElementById('user-input');
        const chatWindow = document.getElementById('chat-window');

        // ARRAY PER LA CRONOLOGIA DELLA CONVERSAZIONE
        let conversationHistory = [];

        // ✅ NUOVO: Invio con Enter (senza Shift)
        inputField.addEventListener('keydown', (e) => {
            // Enter senza Shift = invia
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault(); // Impedisce il newline
                chatForm.dispatchEvent(new Event('submit')); // Triggera il submit del form
            }
            // Shift + Enter = nuova linea (comportamento predefinito, non serve codice)
        });

        // Event listener esistente per il submit del form
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const message = inputField.value.trim();
            if (!message) return;

            // 1. Aggiungi messaggio utente alla UI
            appendMessage('user', message);

            // 2. Salva nella cronologia (solo user e model, non il system prompt)
            conversationHistory.push({
                role: 'user',
                content: message
            });

            inputField.value = '';
            inputField.style.height = 'auto';

            // 3. Mostra indicatore caricamento
            const loadingId = 'loading-' + Date.now();
            appendMessage('ai', 'Sta elaborando i tuoi pensieri...', loadingId);

            try {
                // INVIA L'INTERA CRONOLOGIA
                const response = await fetch('../../backend/chat_functions.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        messages: conversationHistory  // Invia tutti i messaggi
                    })
                });

                const textResponse = await response.text();
                console.log("Risposta grezza dal server:", textResponse);

                const data = JSON.parse(textResponse);

                if (data.error) {
                    throw new Error(data.error + (data.details ? ": " + data.details : ""));
                }

                if (data.candidates && data.candidates[0].content.parts[0].text) {
                    const aiText = data.candidates[0].content.parts[0].text;

                    // SALVA LA RISPOSTA NELLA CRONOLOGIA
                    conversationHistory.push({
                        role: 'model',
                        content: aiText
                    });

                    // TRASFORMAZIONE MARKDOWN -> HTML
                    const formattedText = aiText
                        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                        .replace(/^[ \t]*[\*\-][ \t]+/gm, '• ')
                        .replace(/\n/g, '<br>');

                    document.getElementById(loadingId).querySelector('.message-content').innerHTML = formattedText;
                } else {
                    throw new Error('Formato risposta non valido');
                }
            } catch (error) {
                console.error("Dettaglio Errore:", error);
                document.getElementById(loadingId).querySelector('.message-content').innerText =
                    "Errore: " + error.message;

                // Rimuovi l'ultimo messaggio utente dalla cronologia in caso di errore
                conversationHistory.pop();
            }

            // Scroll fluido in fondo
            chatWindow.scrollTo({ top: chatWindow.scrollHeight, behavior: 'smooth' });
        });

        function appendMessage(role, text, id = null) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `message ${role}-message`;
            if (id) msgDiv.id = id;

            msgDiv.innerHTML = `<div class="message-content">${text}</div>`;
            chatWindow.appendChild(msgDiv);
            chatWindow.scrollTop = chatWindow.scrollHeight;
        }
    </script>
</body>

</html>