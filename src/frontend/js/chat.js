// Auto-resize textarea
const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
    tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
    tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
}

// Chat logic
const chatForm = document.getElementById('chat-form');
const inputField = document.getElementById('user-input');
const chatWindow = document.getElementById('chat-window');

// ARRAY PER LA CRONOLOGIA DELLA CONVERSAZIONE
let conversationHistory = [];
let isLoading = false; // previene invii multipli

// Bottone "torna in fondo" quando scrolli su
const scrollToBottomBtn = document.createElement('button');
scrollToBottomBtn.className = 'scroll-to-bottom-btn';
scrollToBottomBtn.innerHTML = '↓ Nuovi messaggi';
scrollToBottomBtn.style.display = 'none';
document.body.appendChild(scrollToBottomBtn);

// Controlla se l'utente è in fondo alla chat
function isUserAtBottom() {
    const threshold = 150; // pixel di tolleranza
    return (chatWindow.scrollHeight - chatWindow.scrollTop - chatWindow.clientHeight) < threshold;
}

// Mostra/nascondi bottone "torna in fondo"
function updateScrollButton() {
    if (!isUserAtBottom() && !isLoading) {
        scrollToBottomBtn.style.display = 'block';
    } else {
        scrollToBottomBtn.style.display = 'none';
    }
}

// Event listener per scroll
chatWindow.addEventListener('scroll', updateScrollButton);

// Click sul bottone per tornare in fondo
scrollToBottomBtn.addEventListener('click', () => {
    chatWindow.scrollTo({
        top: chatWindow.scrollHeight,
        behavior: 'smooth'
    });
});

// Gestione Quick Prompts
const quickPromptButtons = document.querySelectorAll('.quick-prompt-btn');

quickPromptButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (isLoading) return; // Previeni click multipli durante caricamento

        const promptText = button.getAttribute('data-prompt');
        inputField.value = promptText;
        inputField.focus();

        // Auto-resize dopo aver inserito il testo
        inputField.style.height = "auto";
        inputField.style.height = (inputField.scrollHeight) + "px";

        // Invia automaticamente il prompt
        chatForm.dispatchEvent(new Event('submit'));
    });
});

// Invio con Enter (senza Shift)
inputField.addEventListener('keydown', (e) => {
    // Enter senza Shift = invia
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault(); // Impedisce il newline
        if (!isLoading) {
            chatForm.dispatchEvent(new Event('submit')); // Triggera il submit del form
        }
    }
    // Shift + Enter = nuova linea (comportamento predefinito, non serve codice)
});

// Event listener per il submit del form
chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (isLoading) return; // Previeni invii multipli

    const message = inputField.value.trim();
    if (!message) return;

    // Blocca l'invio durante il caricamento
    isLoading = true;
    const sendBtn = document.querySelector('.send-btn');
    sendBtn.style.opacity = '0.5';
    sendBtn.style.pointerEvents = 'none';

    // 1. Aggiungi messaggio utente alla UI
    appendMessage('user', message);

    // 2. Salva nella cronologia (solo user e model, non il system prompt)
    conversationHistory.push({
        role: 'user',
        content: message
    });

    inputField.value = '';
    inputField.style.height = 'auto';
    scrollToBottomBtn.style.display = 'none'; // Nascondi bottone

    // 3. Mostra indicatore caricamento
    const loadingId = 'loading-' + Date.now();
    appendMessage('ai', '✨ Sta elaborando...', loadingId);

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

            // Scrolla in fondo SOLO se l'utente era già in fondo
            if (isUserAtBottom()) {
                chatWindow.scrollTo({ top: chatWindow.scrollHeight, behavior: 'smooth' });
            } else {
                // Mostra il bottone "torna in fondo"
                scrollToBottomBtn.style.display = 'block';
            }
        } else {
            throw new Error('Formato risposta non valido');
        }
    } catch (error) {
        console.error("Dettaglio Errore:", error);
        document.getElementById(loadingId).querySelector('.message-content').innerHTML =
            "❌ Errore: " + error.message;

        // Rimuovi l'ultimo messaggio utente dalla cronologia in caso di errore
        conversationHistory.pop();

        // Mostra bottone anche in caso di errore se non sei in fondo
        if (!isUserAtBottom()) {
            scrollToBottomBtn.style.display = 'block';
        }
    } finally {
        // Riabilita l'invio
        isLoading = false;
        sendBtn.style.opacity = '1';
        sendBtn.style.pointerEvents = 'auto';
        inputField.focus();
    }
});

function appendMessage(role, text, id = null) {
    const msgDiv = document.createElement('div');
    msgDiv.className = `message ${role}-message`;
    if (id) msgDiv.id = id;

    msgDiv.innerHTML = `<div class="message-content">${text}</div>`;
    chatWindow.appendChild(msgDiv);

    // Scrolla in fondo SOLO se l'utente è già in fondo
    if (isUserAtBottom()) {
        chatWindow.scrollTop = chatWindow.scrollHeight;
    }
}