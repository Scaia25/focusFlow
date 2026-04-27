// Logica per implementare calendario data/ora
function aggiornaDisplay() {
    const adesso = new Date();

    // --- DATA (Giovedì, 9 Apr) ---
    const giornoSettimana = adesso.toLocaleDateString('it-IT', { weekday: 'long' });
    const giornoNumero = adesso.getDate();
    let mese = adesso.toLocaleDateString('it-IT', { month: 'short' }).replace('.', '');

    // Rendiamo maiuscole le prime lettere
    const giornoSettimanaMain = giornoSettimana.charAt(0).toUpperCase() + giornoSettimana.slice(1);
    const meseMain = mese.charAt(0).toUpperCase() + mese.slice(1);

    // Componiamo la stringa: "Giovedì, 9 Apr"
    const dataFinale = `${giornoSettimanaMain}, ${giornoNumero} ${meseMain}`;

    // --- ORA (12:45) ---
    const oraStr = adesso.toLocaleTimeString('it-IT', {
        hour: '2-digit',
        minute: '2-digit'
    });

    // --- INSERIMENTO ---
    document.getElementById('current-date').textContent = dataFinale;
    document.getElementById('current-time').textContent = oraStr;
}

aggiornaDisplay();
setInterval(aggiornaDisplay, 1000);

// Logica per implementare il timer
let countdown;
let timerEndTime; // Il momento in cui il timer scadrà
let timeLeft; // Tempo rimanente in secondi
let isPaused = false;
let totalDuration; // Durata iniziale impostata

const timerText = document.getElementById('timer-text');
const progressLine = document.getElementById('progress-line');
const pauseBtn = document.getElementById('pause-btn');

// Carica il timer all'avvio
window.onload = function () {
    const savedEnd = localStorage.getItem('timerEndTime');
    const savedDuration = localStorage.getItem('totalDuration');
    const savedPaused = localStorage.getItem('isPaused') === 'true';
    const savedTimeLeft = localStorage.getItem('timeLeft');

    if (savedEnd && savedDuration) {
        totalDuration = parseInt(savedDuration);

        if (savedPaused) {
            isPaused = true;
            timeLeft = parseInt(savedTimeLeft);
            pauseBtn.innerText = "Riprendi";
            updateDisplay(timeLeft);
            updateProgress(timeLeft);
        } else {
            timerEndTime = parseInt(savedEnd);
            runTimer();
        }
    }
};

function startTimer(minutes) {
    clearInterval(countdown);
    isPaused = false;
    pauseBtn.innerText = "Pausa";

    const seconds = minutes * 60;
    totalDuration = seconds;
    timeLeft = seconds; // Assicurati di inizializzare timeLeft qui
    timerEndTime = Date.now() + seconds * 1000;

    // Forza l'aggiornamento visivo immediato senza aspettare il primo secondo del setInterval
    updateDisplay(timeLeft);
    updateProgress(timeLeft);

    localStorage.setItem('timerEndTime', timerEndTime);
    localStorage.setItem('totalDuration', totalDuration);
    localStorage.setItem('isPaused', false);

    runTimer();
}

function runTimer() {
    countdown = setInterval(() => {
        if (!isPaused) {
            const now = Date.now();
            timeLeft = Math.round((timerEndTime - now) / 1000);

            if (timeLeft <= 0) {
                clearInterval(countdown);
                completeTimer();
                return;
            }

            updateDisplay(timeLeft);
            updateProgress(timeLeft);
            // Salva il tempo rimanente corrente per sicurezza in caso di pausa futura
            localStorage.setItem('timeLeft', timeLeft);
        }
    }, 1000);
}

function togglePause() {
    if (timeLeft <= 0) return;

    isPaused = !isPaused;
    localStorage.setItem('isPaused', isPaused);

    if (isPaused) {
        pauseBtn.innerText = "Riprendi";
        // Quando mettiamo in pausa, salviamo quanto tempo mancava effettivamente
        localStorage.setItem('timeLeft', timeLeft);
        clearInterval(countdown);
    } else {
        pauseBtn.innerText = "Pausa";
        // Quando riprendiamo, ricalcoliamo il nuovo EndTime
        timerEndTime = Date.now() + (timeLeft * 1000);
        localStorage.setItem('timerEndTime', timerEndTime);
        runTimer();
    }
}

function resetTimer() {
    clearInterval(countdown);
    localStorage.clear();
    timerText.innerText = "00:00";
    progressLine.style.width = "0%";
    pauseBtn.innerText = "Pausa";
    timeLeft = 0;
}

function updateDisplay(seconds) {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    timerText.innerText = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

function updateProgress(seconds) {
    const percentage = ((totalDuration - seconds) / totalDuration) * 100;
    progressLine.style.width = `${percentage}%`;
}

function completeTimer() {
    timerText.innerText = "Fine!";
    progressLine.style.width = "100%";
    localStorage.clear();
    // Qui puoi aggiungere un suono di notifica
    alert("Ottimo lavoro! Sessione completata.");
}


// --- CONFIGURAZIONE GIORNATA LAVORATIVA ---
function aggiornaRadarIperfocus() {
    const adesso = new Date();
    const oraAttualeDecimale = adesso.getHours() + (adesso.getMinutes() / 60) + (adesso.getSeconds() / 3600);

    const radarContainer = document.querySelector('.time-radar-container');
    const radarSvg = document.querySelector('.time-radar');
    const radarInfo = document.querySelector('.radar-info');

    const mattinaLimite = work_start - 2;

    // Funzione di supporto per svuotare e riempire con stile
    const setStatusLayout = (icon, title, subtext, modeClass) => {
        radarSvg.style.display = "none";
        radarContainer.className = `time-radar-container ${modeClass}`;

        // Ingrandiamo il contenuto iniettando HTML più strutturato
        radarInfo.style.position = "static"; // Rimuove l'absolute per centrare tutto
        radarInfo.innerHTML = `
        <span class="status-icon-large">${icon}</span>
        <div class="status-message">${title}</div>
        <div class="status-subtext">${subtext}</div>
    `;
    };

    if (oraAttualeDecimale > work_end || oraAttualeDecimale < mattinaLimite) {
        setStatusLayout(
            "🌙", // Batteria carica/riposo
            "Tempo di Ricarica",
            "La tua giornata è terminata. Scollega la mente e goditi il meritato riposo.",
            "night-mode"
        );
    }
    else if (oraAttualeDecimale >= mattinaLimite && oraAttualeDecimale < work_start) {
        setStatusLayout(
            "🚀", // Razzo per la partenza
            "Pronto al Decollo?",
            'Buongiorno, manca poco! Organizza lo spazio e preparati a focalizzarti.',
            "energy-mode"
        );
    }
    else {
        // --- MOOD LAVORO (Ripristina barra originale) ---
        radarSvg.style.display = "block";
        radarContainer.className = "time-radar-container";
            // Puliamo radarInfo per rimettere la struttura originale se era stata sovrascritta
            radarInfo.innerHTML = `
            <span class="radar-label" id="radar-label">Giornata ` + dayType + `</span>
            <span class="radar-percent" id="radar-percent-text">0%</span>
        `;

        let percentuale = ((oraAttualeDecimale - work_start) / (work_end - work_start)) * 100;
        const radarPath = document.getElementById('radar-progress-path');
        const radarPercentText = document.getElementById('radar-percent-text');

        if (radarPath) radarPath.style.strokeDashoffset = 126 - (126 * percentuale / 100);
        if (radarPercentText) radarPercentText.textContent = percentuale.toFixed(1).replace('.', ',') + "%";
    }
}

// Avvio immediato e aggiornamento ogni secondo per i decimali fluidi
aggiornaRadarIperfocus();
setInterval(aggiornaRadarIperfocus, 1000);

/* gestione dei cookie per le task giornaliere */
function toggleTaskCookie(checkbox, taskName) {
    // .trim() rimuove spazi vuoti ai lati
    // .replace(/ /g, '_') sostituisce TUTTI gli spazi con underscore (esattamente come str_replace in PHP)
    const cookieName = "task_" + taskName.trim().replace(/ /g, '_');

    if (checkbox.checked) {
        const scadenza = new Date();
        scadenza.setHours(24, 0, 0, 0); // Scade a mezzanotte
        document.cookie = cookieName + "=fatto; expires=" + scadenza.toUTCString() + "; path=/";
    } else {
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    }
}

/* logic for close the warnings in the settings page after press the X */
document.addEventListener('DOMContentLoaded', () => {
    // Seleziona il pulsante di chiusura e il contenitore del warning
    const closeBtn = document.querySelector('.warning-close');
    const warning = document.querySelector('.warning-container');

    // Aggiunge l'evento click
    if (closeBtn && warning) {
        closeBtn.addEventListener('click', () => {
            // Aggiungiamo un'animazione di uscita fluida prima di rimuoverlo
            warning.style.opacity = '0';
            warning.style.transform = 'translateY(-10px)';
            warning.style.transition = 'all 0.3s ease';

            // Rimuove l'elemento dal DOM dopo che l'animazione è finita
            setTimeout(() => {
                warning.remove();
            }, 300);
        });
    }
});