<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FocusFlow — La tua protesi cognitiva</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="src/frontend/css/base.css">
    <link rel="stylesheet" href="src/frontend/css/index.css">
    <link rel="stylesheet" href="src/frontend/css/cookie-banner.css">
</head>

<body>

    <nav class="landing-nav">
        <div class="logo">FocusFlow<span>🧠</span></div>
        <div class="nav-links">
            <a href="src/frontend/php/login.php" class="btn-login">Accedi</a>
            <a href="src/frontend/php/signup.php" class="btn-cta-nav">Inizia ora</a>
        </div>
    </nav>

    <header class="hero-section">
        <div class="hero-content">
            <span class="badge">Creato per menti divergenti</span>
            <h1>Domina il tempo, elimina la nebbia mentale.</h1>
            <p>FocusFlow non è una semplice to-do list. È la tua memoria esterna progettata per combattere la cecità
                temporale e l'ansia da prestazione.</p>
            <div class="hero-btns">
                <button class="btn-primary-large">Inizia il mese gratuito</button>
                <p class="price-hint">30 giorni di prova inclusi. Poi solo 5€/mese.</p>
            </div>
        </div>

        <div class="hero-mockup">
            <div class="mockup-container">
                <div class="mockup-header">
                    <div class="dot" style="background: #FD5753;"></div>
                    <div class="dot" style="background: #febb40;"></div>
                    <div class="dot" style="background: #34C749;"></div>
                </div>
                <div class="mockup-screen">
                    <div class="placeholder-content">
                        <img src="src/frontend/img/dashboard.png" alt="Dashboard utente focusFlow">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🌀</div>
            <h3>Radar Temporale</h3>
            <p>Trasforma il tempo in un elemento visivo fisico. Vedi la tua giornata scorrere senza ansia.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🤖</div>
            <h3>AI Body Doubling</h3>
            <p>Un assistente che scompone i task in micro-step da 5-10 minuti. Addio paralisi decisionale.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">💾</div>
            <h3>Memoria Esterna</h3>
            <p>Un database semantico per i tuoi pensieri. Chiedi all'AI dove hai lasciato le tue idee.</p>
        </div>
    </section>

    <section id="prezzi" class="pricing-section">
        <div class="price-card">
            <div class="card-tag">Offerta Lancio</div>
            <h3>FocusFlow Premium</h3>
            <div class="price">5€<span>/mese</span></div>
            <p class="free-month-label">Primo mese GRATIS</p>
            <ul>
                <li>✨ Assistente AI illimitato</li>
                <li>☁️ Sincronizzazione Cloud</li>
                <li>🧠 Memoria Semantica</li>
                <li>📱 Installabile come PWA</li>
            </ul>
            <button class="btn-buy">Attiva Prova Gratuita</button>
        </div>
    </section>

    <footer class="landing-footer">
        <p>© 2026 FocusFlow — Creato con cura per chi vede il mondo in modo diverso. 🌊</p>
    </footer>

    <?php require 'src/frontend/php/cookie-banner.php'; ?>

    <script src="src/frontend/js/cookie-banner.js"></script>

</body>

</html>