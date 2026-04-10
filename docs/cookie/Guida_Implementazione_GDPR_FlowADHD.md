# Guida Implementazione GDPR & Cookie Compliance — FlowADHD
**Developer Guide — Technical Implementation**

---

## 📋 CHECKLIST COMPLIANCE COMPLETA

### ✅ Documenti Legali (COMPLETATI)
- [x] Privacy Policy conforme GDPR
- [x] Terms of Service
- [x] Cookie Policy dettagliata
- [ ] Data Processing Agreement (DPA) con fornitori terzi (vedi sezione 5)

### ✅ Implementazione Tecnica (DA COMPLETARE)
- [ ] Cookie Banner con opt-in esplicito
- [ ] Gestione consenso in LocalStorage
- [ ] Caricamento condizionale Google Analytics
- [ ] Pagina "Privacy Settings" nell'app
- [ ] Export dati utente (GDPR Art. 20)
- [ ] Funzione "Delete Account" (GDPR Art. 17)
- [ ] Log delle richieste GDPR

---

## 1. COOKIE BANNER — Implementazione Frontend

### 1.1 HTML Structure

Crea un file `cookie-banner.html` o integralo direttamente nell'`index.html`:

```html
<!-- Cookie Consent Banner -->
<div id="cookie-banner" class="cookie-banner hidden">
  <div class="cookie-banner__content">
    <h3>🍪 Utilizziamo i cookie</h3>
    <p>
      FlowADHD utilizza cookie essenziali per il funzionamento dell'app 
      e cookie analytics (opzionali) per migliorare l'esperienza utente.
    </p>
    <div class="cookie-banner__actions">
      <button id="cookie-reject" class="btn-secondary">
        Solo Essenziali
      </button>
      <button id="cookie-accept" class="btn-primary">
        Accetta Tutti
      </button>
    </div>
    <a href="/cookie-policy" class="cookie-banner__link">
      Leggi la Cookie Policy
    </a>
  </div>
</div>
```

### 1.2 CSS Styling (Glassmorphism ADHD-Friendly)

```css
/* cookie-banner.css */
.cookie-banner {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 9999;
  
  max-width: 500px;
  width: 90%;
  
  /* Glassmorphism */
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 20px;
  
  padding: 24px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
  
  /* Animazione entrata */
  animation: slideUp 0.4s ease-out;
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translate(-50%, 20px);
  }
  to {
    opacity: 1;
    transform: translate(-50%, 0);
  }
}

.cookie-banner.hidden {
  display: none;
}

.cookie-banner__content h3 {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 12px;
  color: var(--text-primary);
}

.cookie-banner__content p {
  font-size: 14px;
  line-height: 1.6;
  color: var(--text-secondary);
  margin-bottom: 20px;
}

.cookie-banner__actions {
  display: flex;
  gap: 12px;
  margin-bottom: 12px;
}

.cookie-banner__actions button {
  flex: 1;
  padding: 12px 20px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.btn-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
}

.btn-primary:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
  background: rgba(255, 255, 255, 0.1);
  color: var(--text-primary);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-secondary:hover {
  background: rgba(255, 255, 255, 0.2);
}

.cookie-banner__link {
  display: block;
  text-align: center;
  font-size: 12px;
  color: var(--text-muted);
  text-decoration: underline;
}

.cookie-banner__link:hover {
  color: var(--accent);
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
  .cookie-banner {
    background: rgba(30, 30, 40, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
}
```

### 1.3 JavaScript Logic

Crea `cookie-consent.js`:

```javascript
// cookie-consent.js

class CookieConsent {
  constructor() {
    this.consentKey = 'flowadhd_cookie_consent';
    this.consentValue = this.getConsent();
    this.init();
  }

  init() {
    // Se l'utente ha già scelto, non mostrare il banner
    if (this.consentValue !== null) {
      this.applyConsent(this.consentValue);
      return;
    }

    // Altrimenti, mostra il banner
    this.showBanner();
    this.attachEventListeners();
  }

  showBanner() {
    const banner = document.getElementById('cookie-banner');
    if (banner) {
      banner.classList.remove('hidden');
    }
  }

  hideBanner() {
    const banner = document.getElementById('cookie-banner');
    if (banner) {
      banner.classList.add('hidden');
    }
  }

  attachEventListeners() {
    const acceptBtn = document.getElementById('cookie-accept');
    const rejectBtn = document.getElementById('cookie-reject');

    acceptBtn?.addEventListener('click', () => this.acceptAll());
    rejectBtn?.addEventListener('click', () => this.rejectAll());
  }

  acceptAll() {
    this.saveConsent('all');
    this.applyConsent('all');
    this.hideBanner();
  }

  rejectAll() {
    this.saveConsent('essential');
    this.applyConsent('essential');
    this.hideBanner();
  }

  saveConsent(value) {
    localStorage.setItem(this.consentKey, value);
    this.consentValue = value;
    
    // Salva anche timestamp del consenso
    localStorage.setItem(`${this.consentKey}_timestamp`, Date.now());
  }

  getConsent() {
    return localStorage.getItem(this.consentKey);
  }

  applyConsent(consentType) {
    if (consentType === 'all') {
      this.enableAnalytics();
    } else {
      this.disableAnalytics();
    }
  }

  enableAnalytics() {
    // Carica Google Analytics solo se consentito
    if (!window.gtag) {
      this.loadGoogleAnalytics();
    }
    console.log('✅ Google Analytics ENABLED');
  }

  disableAnalytics() {
    // Disabilita Google Analytics
    window['ga-disable-G-XXXXXXXXX'] = true; // Sostituisci con il tuo GA4 ID
    console.log('❌ Google Analytics DISABLED');
  }

  loadGoogleAnalytics() {
    const GA_MEASUREMENT_ID = 'G-XXXXXXXXX'; // ⚠️ SOSTITUIRE CON TUO ID

    // Crea script tag per gtag.js
    const script = document.createElement('script');
    script.src = `https://www.googletagmanager.com/gtag/js?id=${GA_MEASUREMENT_ID}`;
    script.async = true;
    document.head.appendChild(script);

    // Inizializza gtag
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    window.gtag = gtag;

    gtag('js', new Date());
    gtag('config', GA_MEASUREMENT_ID, {
      anonymize_ip: true, // Anonimizza IP (GDPR requirement)
      cookie_flags: 'SameSite=None;Secure'
    });
  }

  // Funzione per resettare il consenso (da usare in Settings)
  resetConsent() {
    localStorage.removeItem(this.consentKey);
    localStorage.removeItem(`${this.consentKey}_timestamp`);
    this.consentValue = null;
    this.showBanner();
  }
}

// Inizializza al caricamento della pagina
document.addEventListener('DOMContentLoaded', () => {
  window.cookieConsent = new CookieConsent();
});

// Esponi funzione globale per reset da Settings
window.resetCookieConsent = function() {
  if (window.cookieConsent) {
    window.cookieConsent.resetConsent();
  }
};
```

---

## 2. PAGINA PRIVACY SETTINGS

### 2.1 HTML Settings Page

```html
<!-- privacy-settings.html -->
<div class="settings-page">
  <h1>⚙️ Privacy & Cookie Settings</h1>
  
  <section class="settings-section">
    <h2>Cookie Preferences</h2>
    <p>Gestisci quali cookie FlowADHD può utilizzare.</p>
    
    <div class="cookie-toggle">
      <div class="cookie-toggle__item">
        <div class="cookie-toggle__info">
          <strong>Cookie Essenziali</strong>
          <p>Necessari per il funzionamento dell'app (login, sicurezza)</p>
        </div>
        <input type="checkbox" checked disabled>
        <span class="badge">Sempre Attivi</span>
      </div>
      
      <div class="cookie-toggle__item">
        <div class="cookie-toggle__info">
          <strong>Cookie Analytics</strong>
          <p>Ci aiutano a capire come migliorare FlowADHD</p>
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="analytics-toggle">
          <span class="slider"></span>
        </label>
      </div>
    </div>
    
    <button id="reset-cookies" class="btn-secondary">
      Reset Cookie Preferences
    </button>
  </section>
  
  <section class="settings-section">
    <h2>Data Export (GDPR Art. 20)</h2>
    <p>Scarica tutti i tuoi dati in formato JSON.</p>
    <button id="export-data" class="btn-primary">
      📥 Download My Data
    </button>
  </section>
  
  <section class="settings-section danger-zone">
    <h2>⚠️ Delete Account (GDPR Art. 17)</h2>
    <p>Eliminazione permanente di tutti i dati. <strong>Questa azione è irreversibile.</strong></p>
    <button id="delete-account" class="btn-danger">
      🗑️ Delete My Account
    </button>
  </section>
</div>
```

### 2.2 JavaScript per Privacy Settings

```javascript
// privacy-settings.js

// Toggle Analytics
const analyticsToggle = document.getElementById('analytics-toggle');
const consent = localStorage.getItem('flowadhd_cookie_consent');

// Imposta lo stato iniziale
analyticsToggle.checked = (consent === 'all');

analyticsToggle.addEventListener('change', (e) => {
  const newConsent = e.target.checked ? 'all' : 'essential';
  localStorage.setItem('flowadhd_cookie_consent', newConsent);
  
  if (window.cookieConsent) {
    window.cookieConsent.applyConsent(newConsent);
  }
  
  // Mostra notifica
  showToast(e.target.checked 
    ? '✅ Analytics abilitati' 
    : '❌ Analytics disabilitati'
  );
});

// Reset Cookie Preferences
document.getElementById('reset-cookies').addEventListener('click', () => {
  if (confirm('Vuoi resettare le tue preferenze sui cookie?')) {
    window.resetCookieConsent();
    showToast('🍪 Preferenze resettate');
  }
});

// Export Data (GDPR Art. 20)
document.getElementById('export-data').addEventListener('click', async () => {
  try {
    const response = await fetch('/api/user/export', {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${getAuthToken()}`
      }
    });
    
    if (!response.ok) throw new Error('Export failed');
    
    const data = await response.json();
    
    // Download come file JSON
    const blob = new Blob([JSON.stringify(data, null, 2)], { 
      type: 'application/json' 
    });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `flowadhd_data_${new Date().toISOString()}.json`;
    a.click();
    
    showToast('✅ Dati esportati con successo');
  } catch (error) {
    showToast('❌ Errore durante l\'export', 'error');
  }
});

// Delete Account (GDPR Art. 17)
document.getElementById('delete-account').addEventListener('click', () => {
  const confirmation = prompt(
    'Questa azione eliminerà TUTTI i tuoi dati in modo permanente.\n\n' +
    'Digita "DELETE" per confermare:'
  );
  
  if (confirmation === 'DELETE') {
    deleteAccount();
  }
});

async function deleteAccount() {
  try {
    const response = await fetch('/api/user/delete', {
      method: 'DELETE',
      headers: {
        'Authorization': `Bearer ${getAuthToken()}`
      }
    });
    
    if (!response.ok) throw new Error('Delete failed');
    
    // Logout e redirect
    localStorage.clear();
    window.location.href = '/goodbye';
  } catch (error) {
    showToast('❌ Errore durante l\'eliminazione', 'error');
  }
}

// Utility: Toast notifications
function showToast(message, type = 'success') {
  // Implementa la tua logica di notifiche toast
  console.log(`[${type.toUpperCase()}] ${message}`);
}
```

---

## 3. BACKEND API ENDPOINTS (Node.js + Express)

### 3.1 Export User Data (GDPR Art. 20)

```javascript
// routes/user.js

const express = require('express');
const router = express.Router();
const { authenticateToken } = require('../middleware/auth');
const db = require('../database');

// GET /api/user/export
router.get('/export', authenticateToken, async (req, res) => {
  try {
    const userId = req.user.id;
    
    // Raccogli tutti i dati dell'utente
    const userData = await db.query(`
      SELECT 
        email, 
        display_name, 
        created_at, 
        last_login 
      FROM users 
      WHERE id = $1
    `, [userId]);
    
    const tasks = await db.query(`
      SELECT * FROM tasks WHERE user_id = $1
    `, [userId]);
    
    const notes = await db.query(`
      SELECT * FROM brain_dump WHERE user_id = $1
    `, [userId]);
    
    const preferences = await db.query(`
      SELECT * FROM user_preferences WHERE user_id = $1
    `, [userId]);
    
    // Costruisci JSON export
    const exportData = {
      export_date: new Date().toISOString(),
      user_profile: userData.rows[0],
      tasks: tasks.rows,
      brain_dump_notes: notes.rows,
      preferences: preferences.rows[0],
      gdpr_info: {
        right_exercised: 'Art. 20 - Data Portability',
        format: 'JSON',
        completeness: 'Full export of all personal data'
      }
    };
    
    res.json(exportData);
    
    // Log GDPR request
    await logGDPRRequest(userId, 'DATA_EXPORT');
    
  } catch (error) {
    console.error('Export error:', error);
    res.status(500).json({ error: 'Export failed' });
  }
});

module.exports = router;
```

### 3.2 Delete Account (GDPR Art. 17)

```javascript
// DELETE /api/user/delete
router.delete('/delete', authenticateToken, async (req, res) => {
  try {
    const userId = req.user.id;
    
    // Inizia transazione
    await db.query('BEGIN');
    
    // Elimina tutti i dati correlati
    await db.query('DELETE FROM tasks WHERE user_id = $1', [userId]);
    await db.query('DELETE FROM brain_dump WHERE user_id = $1', [userId]);
    await db.query('DELETE FROM user_preferences WHERE user_id = $1', [userId]);
    await db.query('DELETE FROM login_history WHERE user_id = $1', [userId]);
    
    // Elimina l'utente
    await db.query('DELETE FROM users WHERE id = $1', [userId]);
    
    // Commit transazione
    await db.query('COMMIT');
    
    // Log GDPR request
    await logGDPRRequest(userId, 'ACCOUNT_DELETION');
    
    res.json({ 
      message: 'Account deleted successfully',
      deletion_date: new Date().toISOString()
    });
    
  } catch (error) {
    await db.query('ROLLBACK');
    console.error('Delete error:', error);
    res.status(500).json({ error: 'Deletion failed' });
  }
});
```

### 3.3 GDPR Request Logging

```javascript
// utils/gdpr-logger.js

async function logGDPRRequest(userId, requestType) {
  await db.query(`
    INSERT INTO gdpr_requests 
      (user_id, request_type, timestamp, ip_address)
    VALUES ($1, $2, NOW(), $3)
  `, [userId, requestType, req.ip]);
}

module.exports = { logGDPRRequest };
```

**Schema SQL per logging:**

```sql
CREATE TABLE gdpr_requests (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  request_type VARCHAR(50) NOT NULL, -- 'DATA_EXPORT', 'ACCOUNT_DELETION', 'DATA_CORRECTION'
  timestamp TIMESTAMP DEFAULT NOW(),
  ip_address VARCHAR(45),
  notes TEXT
);
```

---

## 4. DATA PROCESSING AGREEMENTS (DPA)

### 4.1 Fornitori che Richiedono DPA

Per essere completamente GDPR-compliant, devi firmare **Data Processing Agreements** con:

| **Fornitore** | **Come Ottenere il DPA** | **Priorità** |
|--------------|-------------------------|-------------|
| **Anthropic (Claude API)** | Contatta business@anthropic.com | 🔴 Alta |
| **Stripe** | Disponibile nel Dashboard Stripe | 🔴 Alta |
| **Railway/Render** | Richiedi tramite supporto | 🟡 Media |
| **Supabase** | DPA disponibile in Settings > Legal | 🟡 Media |
| **Google Analytics** | [Google DPA](https://business.safety.google/adsprocessorterms/) | 🟢 Bassa (se non usi GA) |

### 4.2 Checklist DPA

Per ogni fornitore, verifica che il DPA includa:
- ✅ Clausole Standard Contrattuali (SCC) UE
- ✅ Descrizione dei tipi di dati processati
- ✅ Durata del trattamento
- ✅ Obblighi di sicurezza del fornitore
- ✅ Procedura di notifica in caso di data breach

---

## 5. COMPLIANCE CHECKLIST FINALE

### ✅ Prima del Lancio

- [ ] Cookie banner funzionante con opt-in esplicito
- [ ] Privacy Policy, ToS, Cookie Policy pubblicate su `/privacy`, `/terms`, `/cookies`
- [ ] Link alle policy nel footer di ogni pagina
- [ ] Email `privacy@flowadhd.com` configurata e monitorata
- [ ] Endpoint `/api/user/export` implementato
- [ ] Endpoint `/api/user/delete` implementato
- [ ] DPA firmati con Anthropic e Stripe
- [ ] Encryption end-to-end per Brain Dump data

### ✅ Dopo il Lancio (Monitoraggio Continuo)

- [ ] Revisione annuale delle policy legali
- [ ] Risposta a richieste GDPR entro 30 giorni
- [ ] Audit di sicurezza trimestrale
- [ ] Test di penetrazione annuale
- [ ] Backup crittografati giornalieri
- [ ] Log degli accessi admin (chi ha visto i dati utente)

---

## 6. GANTT — TASK DA COMPLETARE

Basandoti sul file Gantt ricevuto, ecco le task prioritarie:

### SPRINT 1: Legal Foundation (1 settimana)
- [x] ✅ Scrivere Privacy Policy
- [x] ✅ Scrivere Terms of Service
- [x] ✅ Scrivere Cookie Policy
- [ ] Pubblicare le policy su FlowADHD.com
- [ ] Aggiungere link nel footer

### SPRINT 2: Cookie Banner (1 settimana)
- [ ] Implementare HTML/CSS del banner
- [ ] JavaScript per gestione consenso
- [ ] Test su Chrome, Firefox, Safari
- [ ] Test su mobile (iOS/Android)

### SPRINT 3: Backend GDPR (2 settimane)
- [ ] Endpoint `/api/user/export`
- [ ] Endpoint `/api/user/delete`
- [ ] Sistema di logging GDPR
- [ ] Email automatica dopo export/delete

### SPRINT 4: DPA & Security (1 settimana)
- [ ] Firmare DPA con Anthropic
- [ ] Firmare DPA con Stripe
- [ ] Implementare E2E encryption per Brain Dump
- [ ] Audit di sicurezza interno

### SPRINT 5: Testing & Launch (1 settimana)
- [ ] Test completo del flusso GDPR
- [ ] Simulare richieste di export/delete
- [ ] Verificare email di notifica
- [ ] Lancio pubblico ✅

**TOTALE TEMPO STIMATO:** 6 settimane

---

## 7. RISORSE UTILI

### Documentazione GDPR
- [GDPR Official Text (EU)](https://gdpr-info.eu/)
- [Garante Privacy (Italia)](https://www.garanteprivacy.it/)
- [ICO GDPR Guide (UK)](https://ico.org.uk/for-organisations/guide-to-data-protection/guide-to-the-general-data-protection-regulation-gdpr/)

### Cookie Consent Libraries (Alternative)
Se preferisci una libreria preconfezionata:
- [CookieConsent by Orest Bida](https://github.com/orestbida/cookieconsent) (vanilla JS, GDPR-compliant)
- [Klaro!](https://github.com/kiprotect/klaro) (open-source, customizzabile)

### GDPR Generators
- [Privacy Policy Generator](https://www.privacypolicygenerator.info/)
- [TermsFeed](https://www.termsfeed.com/) (generatore ToS/Privacy)

---

## 8. ESEMPIO COMPLETO: index.html

```html
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlowADHD — Deep Focus for ADHD</title>
  
  <!-- CSS -->
  <link rel="stylesheet" href="/styles/main.css">
  <link rel="stylesheet" href="/styles/cookie-banner.css">
  
  <!-- ⚠️ NON caricare Google Analytics qui! -->
  <!-- Verrà caricato solo se l'utente acconsente -->
</head>
<body>
  
  <!-- App principale -->
  <div id="app">
    <!-- ... contenuto FlowADHD ... -->
  </div>
  
  <!-- Cookie Banner -->
  <div id="cookie-banner" class="cookie-banner hidden">
    <div class="cookie-banner__content">
      <h3>🍪 Utilizziamo i cookie</h3>
      <p>
        FlowADHD utilizza cookie essenziali per il funzionamento dell'app 
        e cookie analytics (opzionali) per migliorare l'esperienza utente.
      </p>
      <div class="cookie-banner__actions">
        <button id="cookie-reject" class="btn-secondary">
          Solo Essenziali
        </button>
        <button id="cookie-accept" class="btn-primary">
          Accetta Tutti
        </button>
      </div>
      <a href="/cookie-policy" class="cookie-banner__link">
        Leggi la Cookie Policy
      </a>
    </div>
  </div>
  
  <!-- Footer con link legali -->
  <footer>
    <div class="footer-links">
      <a href="/privacy-policy">Privacy Policy</a>
      <a href="/terms-of-service">Terms of Service</a>
      <a href="/cookie-policy">Cookie Policy</a>
      <button onclick="window.resetCookieConsent()">Reset Cookie Preferences</button>
    </div>
    <p>&copy; 2026 FlowADHD. Made with 💜 for ADHD brains.</p>
  </footer>
  
  <!-- JavaScript -->
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>
```

---

**Fine Guida Implementazione GDPR & Cookie Compliance**

*Questa guida fornisce tutto il necessario per rendere FlowADHD conforme a GDPR, ePrivacy Directive e leggi italiane sulla privacy.*

**Prossimi Passi:**
1. Implementare il cookie banner (1 settimana)
2. Creare gli endpoint backend GDPR (2 settimane)
3. Firmare i DPA con i fornitori (1 settimana)
4. Test completo prima del lancio (1 settimana)

**Stima totale:** 5-6 settimane per compliance completa.
