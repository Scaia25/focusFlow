function handleDelete() {
    const confirmed = confirm("Sei sicuro di voler eliminare il tuo account? Questa azione è irreversibile.");

    if (confirmed) {
        document.getElementById('delete-form').submit();
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