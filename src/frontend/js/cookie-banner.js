// Gestione banner cookie e modale policy
(function() {
    const banner = document.getElementById('cookie-banner');
    const modal = document.getElementById('cookie-policy-modal');
    const btnEssential = document.getElementById('btn-essential-only');
    const btnAccept = document.getElementById('btn-accept-all');
    const openPolicy = document.getElementById('open-cookie-policy');
    const closeModal = document.getElementById('close-cookie-modal');
    const overlay = modal ? modal.querySelector('.cookie-modal__overlay') : null;
    const openSettings = document.getElementById('open-cookie-settings');

    // Controlla se il consenso è già stato dato
    if (localStorage.getItem('cookie_consent')) {
        if (banner) banner.setAttribute('aria-hidden', 'true');
    }

    // Salva scelta e nascondi banner
    function setConsent(type) {
        localStorage.setItem('cookie_consent', type); // 'essential' o 'all'
        if (banner) banner.setAttribute('aria-hidden', 'true');
        // Qui puoi attivare/disattivare Google Analytics in base al tipo
        console.log('Cookie consent:', type);
    }

    // Apri modale
    function openModal() {
        if (modal) modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    // Chiudi modale
    function closeModalFn() {
        if (modal) modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Event listener
    if (btnEssential) btnEssential.addEventListener('click', () => setConsent('essential'));
    if (btnAccept) btnAccept.addEventListener('click', () => setConsent('all'));
    if (openPolicy) openPolicy.addEventListener('click', (e) => { e.preventDefault(); openModal(); });
    if (closeModal) closeModal.addEventListener('click', closeModalFn);
    if (overlay) overlay.addEventListener('click', closeModalFn);
    if (openSettings) openSettings.addEventListener('click', (e) => { e.preventDefault(); openModal(); });

    // Chiudi modale con ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && modal.getAttribute('aria-hidden') === 'false') {
            closeModalFn();
        }
    });
})();