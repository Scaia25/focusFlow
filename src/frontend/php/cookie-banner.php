<!-- ==================== COOKIE CONSENT BANNER ==================== -->
<div id="cookie-banner" class="cookie-banner" role="dialog" aria-labelledby="cookie-title" aria-hidden="false">
    <div class="cookie-banner__content">
        <div class="cookie-banner__icon">🍪</div>
        <div class="cookie-banner__text">
            <h3 id="cookie-title">Rispettiamo la tua privacy</h3>
            <p>
                FocusFlow utilizza cookie tecnici essenziali per il funzionamento del sito.
                Con il tuo consenso, attiviamo cookie analitici <strong>anonimi</strong> (Google Analytics)
                per capire come migliorare il servizio.
                <br><strong>Non usiamo cookie pubblicitari e non vendiamo i tuoi dati.</strong>
            </p>
            <a href="#cookie-policy" class="cookie-banner__link" id="open-cookie-policy">Leggi la Cookie Policy completa
                →</a>
        </div>
        <div class="cookie-banner__actions">
            <button id="btn-essential-only" class="cookie-btn cookie-btn--secondary">
                Solo essenziali
            </button>
            <button id="btn-accept-all" class="cookie-btn cookie-btn--primary">
                Accetta tutti
            </button>
        </div>
    </div>
</div>

<!-- ==================== COOKIE POLICY MODALE ==================== -->
<div id="cookie-policy-modal" class="cookie-modal" role="dialog" aria-labelledby="policy-title" aria-hidden="true">
    <div class="cookie-modal__overlay"></div>
    <div class="cookie-modal__container">
        <div class="cookie-modal__header">
            <h2 id="policy-title">🍪 Cookie Policy</h2>
            <button id="close-cookie-modal" class="cookie-modal__close" aria-label="Chiudi">
                ✕
            </button>
        </div>
        <div class="cookie-modal__body">

            <p class="cookie-modal__updated"><strong>Ultimo aggiornamento:</strong> 29 Aprile 2026</p>

            <!-- SEZIONE 1 -->
            <h3>1. Cosa sono i cookie</h3>
            <p>I cookie sono piccoli file di testo che i siti web salvano sul tuo dispositivo (computer, smartphone,
                tablet) durante la navigazione. Servono a ricordare informazioni su di te, come le tue preferenze o lo
                stato di accesso.</p>

            <h4>In base alla durata:</h4>
            <ul>
                <li><strong>Cookie di sessione:</strong> vengono cancellati quando chiudi il browser</li>
                <li><strong>Cookie persistenti:</strong> rimangono sul dispositivo per un periodo definito (es. 1 anno)
                </li>
            </ul>

            <h4>In base alla provenienza:</h4>
            <ul>
                <li><strong>Cookie di prima parte:</strong> impostati direttamente da FocusFlow</li>
                <li><strong>Cookie di terze parti:</strong> impostati da servizi esterni come Stripe o Google Analytics
                </li>
            </ul>

            <!-- SEZIONE 2 -->
            <h3>2. Cookie che utilizziamo</h3>

            <h4>🔒 Cookie strettamente necessari (sempre attivi)</h4>
            <p>Essenziali per il funzionamento del servizio. Non richiedono il tuo consenso.</p>
            <div class="cookie-table-wrapper">
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Scopo</th>
                            <th>Durata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>session_token</code></td>
                            <td>Mantiene l'accesso durante la navigazione</td>
                            <td>Sessione</td>
                        </tr>
                        <tr>
                            <td><code>csrf_token</code></td>
                            <td>Protegge da attacchi informatici (CSRF)</td>
                            <td>Sessione</td>
                        </tr>
                        <tr>
                            <td><code>auth_refresh</code></td>
                            <td>Permette la ri-autenticazione senza inserire di nuovo la password</td>
                            <td>7 giorni</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>⚙️ Cookie di funzionalità (sempre attivi)</h4>
            <p>Ricordano le tue preferenze per migliorare l'esperienza d'uso.</p>
            <div class="cookie-table-wrapper">
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Scopo</th>
                            <th>Durata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>theme_preference</code></td>
                            <td>Ricorda la scelta tra modalità chiara/scura</td>
                            <td>1 anno</td>
                        </tr>
                        <tr>
                            <td><code>language_preference</code></td>
                            <td>Ricorda la lingua scelta</td>
                            <td>1 anno</td>
                        </tr>
                        <tr>
                            <td><code>timer_sound</code></td>
                            <td>Ricorda il suono di notifica preferito</td>
                            <td>1 anno</td>
                        </tr>
                        <tr>
                            <td><code>hero_task_mode</code></td>
                            <td>Ricorda la visualizzazione a 1 o 3 task</td>
                            <td>1 anno</td>
                        </tr>
                        <tr>
                            <td><code>cookie_consent</code></td>
                            <td>Salva la tua preferenza sui cookie</td>
                            <td>1 anno</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>📊 Cookie analitici (solo con consenso)</h4>
            <p>Ci aiutano a capire come usi FocusFlow in forma <strong>anonima e aggregata</strong>. <strong>Vengono
                    attivati solo se clicchi "Accetta tutti".</strong></p>
            <div class="cookie-table-wrapper">
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Scopo</th>
                            <th>Durata</th>
                            <th>Fornitore</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>_ga</code></td>
                            <td>Distingue gli utenti unici</td>
                            <td>2 anni</td>
                            <td>Google Analytics 4</td>
                        </tr>
                        <tr>
                            <td><code>_ga_*</code></td>
                            <td>Mantiene lo stato della sessione</td>
                            <td>2 anni</td>
                            <td>Google Analytics 4</td>
                        </tr>
                        <tr>
                            <td><code>_gid</code></td>
                            <td>Distingue gli utenti (breve termine)</td>
                            <td>24 ore</td>
                            <td>Google Analytics 4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p><strong>Cosa tracciamo:</strong> pagine visitate, funzionalità usate, durata della sessione, tipo di
                dispositivo (aggregato).</p>
            <p><strong>Cosa NON tracciamo:</strong> contenuti dei tuoi task, testo del Brain Dump, dati personali.
                <strong>Non condividiamo dati con inserzionisti.</strong></p>

            <h4>💳 Cookie di Stripe (pagamenti)</h4>
            <p>Quando ti abboni, Stripe imposta cookie propri per prevenire frodi e gestire la sessione di pagamento.
            </p>
            <div class="cookie-table-wrapper">
                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Scopo</th>
                            <th>Durata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>__stripe_mid</code></td>
                            <td>Rilevamento frodi</td>
                            <td>1 anno</td>
                        </tr>
                        <tr>
                            <td><code>__stripe_sid</code></td>
                            <td>Identificatore di sessione</td>
                            <td>30 minuti</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p><a href="https://stripe.com/it/privacy" target="_blank" rel="noopener">Privacy Policy di Stripe →</a></p>

            <h4>🚫 Cookie di marketing: NON li usiamo</h4>
            <p>FocusFlow <strong>non</strong> utilizza cookie pubblicitari, di retargeting o di profilazione. Non
                mostriamo pubblicità personalizzata e non vendiamo i tuoi dati a terze parti.</p>

            <!-- SEZIONE 3 -->
            <h3>3. Come gestire i cookie</h3>
            <p><strong>Al primo accesso</strong> vedrai un banner con due opzioni:</p>
            <ul>
                <li><strong>"Solo essenziali"</strong> → attivi solo i cookie tecnici necessari</li>
                <li><strong>"Accetta tutti"</strong> → attivi anche Google Analytics</li>
            </ul>
            <p>La tua scelta viene salvata per 1 anno. Puoi cambiarla in qualsiasi momento cliccando su
                <strong>"Impostazioni cookie"</strong> nel footer del sito.</p>

            <h4>Gestione via browser</h4>
            <p>Puoi anche bloccare o cancellare i cookie dalle impostazioni del tuo browser:</p>
            <ul>
                <li><strong>Chrome:</strong> Impostazioni → Privacy e sicurezza → Cookie</li>
                <li><strong>Firefox:</strong> Impostazioni → Privacy e sicurezza → Cookie e dati dei siti</li>
                <li><strong>Safari:</strong> Preferenze → Privacy → Gestisci dati siti web</li>
                <li><strong>Edge:</strong> Impostazioni → Cookie e autorizzazioni siti</li>
            </ul>
            <p><strong>Attenzione:</strong> bloccando tutti i cookie, FocusFlow potrebbe non funzionare correttamente
                (es. non rimarrai connesso).</p>

            <h3>4. Segnale Do Not Track (DNT)</h3>
            <p>Rispettiamo il segnale "Do Not Track" del browser. Se attivo, disattiviamo automaticamente Google
                Analytics e usiamo solo cookie essenziali.</p>

            <h3>5. Contatti</h3>
            <p>Per domande sulla privacy o sui cookie:</p>
            <p>📧 <strong>Email:</strong> privacy@focusflow.com</p>
            <p>📍 <strong>Sede:</strong> FocusFlow — Via Roma, 42 — 24122 Bergamo (BG) — Italia</p>

            <p class="cookie-modal__compliance">Questa policy è conforme a: GDPR (Reg. UE 2016/679), Direttiva ePrivacy
                (2002/58/CE), Provvedimento Garante Privacy Italiano.</p>
        </div>
    </div>
</div>