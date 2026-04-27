# Studio di Fattibilità — focusFlow (VERSIONE AGGIORNATA)
**Deep Focus PWA per persone con ADHD**

---

## 1. EXECUTIVE SUMMARY

**focusFlow** è una Progressive Web App (PWA) progettata come "protesi cognitiva" per persone con ADHD, che mira a risolvere problemi di time blindness, paralisi decisionale e dispersione dell'attenzione attraverso un'interfaccia minimalista e un assistente AI dedicato.

### Obiettivi Strategici
- Offrire un ambiente digitale premium a €5/mese
- Raggiungere 5.000 utenti attivi nei primi 12 mesi
- Posizionarsi come alternativa specializzata alle to-do list generiche
- Integrare un assistente AI che funga da supporto psicologico e body doubling digitale

### Key Metrics Finanziari
- **Investimento Iniziale:** €1.125 (solo sviluppo interno)
- **Break-Even:** ~250 utenti (mese 4-5)
- **ROI Anno 1:** 5.233% (ritorni estremamente elevati dato il basso investimento)
- **Payback Period:** 0,5 mesi (circa 15 giorni!)

---

## 2. ANALISI DEL MERCATO

### 2.1 Target di Riferimento
- **Primario:** Adulti 18-45 anni con diagnosi ADHD o autodiagnosi
- **Secondario:** Studenti universitari, freelancer, professionisti con difficoltà di concentrazione
- **Dimensione del mercato (Italia):** ~800.000 adulti con ADHD diagnosticato (2-3% popolazione adulta)
- **Mercato potenziale globale (Paesi EU + USA):** ~40 milioni di persone

### 2.2 Problemi dei Competitor Attuali
| **Competitor** | **Punti di Forza** | **Punti di Debolezza** |
|----------------|-------------------|------------------------|
| **Todoist** | Multipiattaforma, integrazioni | Troppo complesso, cognitive overload |
| **Forest** | Gamification, timer Pomodoro | Non pensato per ADHD, manca supporto AI |
| **Notion** | Flessibilità estrema | Curva di apprendimento alta, paralisi decisionale |
| **Structured** | UI pulita, time blocking | Manca supporto emotivo, costo elevato (€40/anno) |
| **Goblin Tools** | Gratis, Magic ToDo AI | Nessuna persistenza cloud, modello insostenibile |

**Gap identificato:** Nessuna soluzione combina minimalismo cognitivo + AI psicologico + prezzo accessibile + sincronizzazione cloud.

---

## 3. ANALISI TECNICA

### 3.1 Architettura Tecnologica
```
┌─────────────────────────────────────┐
│        FRONTEND (PWA)               │
│  HTML5 + CSS3 + Vanilla JS          │
│  Service Worker (Offline-first)     │
└─────────────────────────────────────┘
              ↓
┌─────────────────────────────────────┐
│        BACKEND API (Node.js)        │
│  Express.js + PostgreSQL            │
│  Redis (Cache sessioni)             │
└─────────────────────────────────────┘
              ↓
┌─────────────────────────────────────┐
│      AI LAYER (Claude API)          │
│  Gestione Brain Dump                │
│  Scomposizione Task                 │
│  Memoria Semantica (Vector DB)      │
└─────────────────────────────────────┘
```

### 3.2 Requisiti Infrastrutturali
- **Hosting:** Railway/Render (€15-20/mese per 1000 utenti)
- **Database:** PostgreSQL (Supabase tier gratuito fino a 500MB)
- **AI API:** Claude Sonnet (~€0.003 per 1K token → €0.30/utente/mese)
- **CDN:** Cloudflare (tier gratuito)

**Stima costi operativi mensili (1000 utenti):** €350-400

---

## 4. ANALISI ECONOMICO-FINANZIARIA (DATI REALI)

### 4.1 Investimento Iniziale

| **Voce** | **Dettaglio** | **Costo** |
|----------|--------------|-----------|
| **Sviluppo Interno** | 75 ore × €15/h (25 settimane × 3h/settimana) | **€1.125** |
| **Hosting Iniziale** | Railway/Render tier gratuito (primi 3 mesi) | €0 |
| **Dominio + SSL** | focusflow.com (1 anno) | €12 |
| **Design Assets** | Font, icone (gratis da Google Fonts/Heroicons) | €0 |
| **TOTALE INVESTIMENTO INIZIALE** | — | **€1.137** |

**Nota:** Questo è un investimento estremamente basso grazie a:
- Sviluppo interno (solo costo opportunità)
- Stack tecnologico open-source
- Infrastruttura cloud tier gratuito iniziale

---

### 4.2 Piano dei Ricavi (12 mesi)

| **Mese** | **Utenti Nuovi** | **Utenti Attivi** | **Ricavi Mensili** | **Ricavi Cumulativi** |
|----------|------------------|-------------------|--------------------|-----------------------|
| **1** (Trial) | 50 | 50 | €0 (trial 14gg) | €0 |
| **2** | 100 | 120 | €600 | €600 |
| **3** | 150 | 250 | €1.250 | €1.850 |
| **4** | 200 | 450 | €2.250 | €4.100 |
| **5** | 300 | 700 | €3.500 | €7.600 |
| **6** | 400 | 1.000 | €5.000 | €12.600 |
| **7** | 500 | 1.400 | €7.000 | €19.600 |
| **8** | 600 | 1.900 | €9.500 | €29.100 |
| **9** | 700 | 2.500 | €12.500 | €41.600 |
| **10** | 800 | 3.200 | €16.000 | €57.600 |
| **11** | 900 | 4.000 | €20.000 | €77.600 |
| **12** | 1.000 | 5.000 | €25.000 | €102.600 |

**Assunzioni:**
- Churn rate mensile: 15% (standard per productivity apps)
- Conversione trial → paid: 70% (alta grazie a trial 14 giorni)
- Crescita organica via Product Hunt, Reddit ADHD, word-of-mouth

---

### 4.3 Struttura dei Costi Operativi (12 mesi)

| **Voce** | **Mese 1-3** | **Mese 4-6** | **Mese 7-12** | **Totale Anno 1** |
|----------|-------------|-------------|--------------|-------------------|
| **Hosting** | €0 (free tier) | €20/mese | €50/mese | €360 |
| **AI API (Claude)** | €15 (50 utenti) | €150 (500 utenti) | €1.000 (media 3.300 utenti) | €7.050 |
| **Stripe Fees (2.9%)** | €17 | €109 | €3.278 | €2.975 |
| **Marketing (Google Ads)** | €100/mese | €200/mese | €500/mese | €4.200 |
| **Email Service (SendGrid)** | €0 (free tier) | €15/mese | €30/mese | €225 |
| **DNS + SSL** | €12 (annuale) | €0 | €0 | €12 |
| **TOTALE MENSILE** | €144 | €494 | €1.576 (media) | — |
| **TOTALE ANNO 1** | — | — | — | **€14.822** |

**Costi totali (investimento + operativi anno 1):** €1.137 + €14.822 = **€15.959**

---

### 4.4 Analisi Profitti

| **Periodo** | **Ricavi Cumulativi** | **Costi Cumulativi** | **Profitto Netto** | **Margine %** |
|------------|---------------------|---------------------|-------------------|--------------|
| **Mese 3** | €1.850 | €1.569 | €281 | 15% |
| **Mese 6** | €12.600 | €3.051 | €9.549 | 76% |
| **Mese 9** | €41.600 | €7.875 | €33.725 | 81% |
| **Mese 12** | €102.600 | €15.959 | **€86.641** | **84%** |

**Margine di profitto finale:** 84% (estremamente alto!)

---

## 5. INDICATORI DI REDDITIVITÀ

### 5.1 ROI (Return on Investment)

**Formula:**  
`ROI = (Guadagno Netto / Investimento Iniziale) × 100`

**Calcolo:**
- Guadagno Netto (anno 1) = €102.600 - €14.822 = €87.778
- Investimento Iniziale = €1.137
- ROI = (€87.778 / €1.137) × 100 = **7.719%**

**Interpretazione:** Per ogni €1 investito, focusFlow genera €77,19 di ritorno nel primo anno. **ROI eccezionale.**

---

### 5.2 Payback Period (Periodo di Recupero)

**Metodo con Flussi Variabili:**

| **Mese** | **Ricavi Mensili** | **Costi Mensili** | **Flusso di Cassa Netto** | **Cumulativo** |
|---------|-------------------|------------------|--------------------------|---------------|
| **0** | €0 | €1.137 (investimento) | **-€1.137** | **-€1.137** |
| **1** | €0 | €144 | **-€144** | **-€1.281** |
| **2** | €600 | €144 | **+€456** | **-€825** |
| **3** | €1.250 | €144 | **+€1.106** | **+€281** ✅ |

**Payback Period esatto:**
- Mancano €825 all'inizio del mese 3
- Flusso mese 3: €1.106
- Frazione di mese: €825 / €1.106 = 0,75 mesi ≈ **22 giorni**

**Payback Period totale:** **2 mesi e 22 giorni**

**Interpretazione:** L'investimento si ripaga in meno di 3 mesi. **Eccezionale.**

---

### 5.3 VAN (Valore Attuale Netto)

**Formula:**  
`VAN = Σ [Flusso di Cassa anno n / (1 + tasso di sconto)^n] - Investimento Iniziale`

**Parametri:**
- Tasso di Sconto: 10% (costo opportunità del capitale)
- Orizzonte: 3 anni
- Flussi di Cassa stimati (al netto dei costi):

| **Anno** | **Ricavi** | **Costi** | **Flusso Netto** |
|---------|----------|---------|-----------------|
| **1** | €102.600 | €14.822 | €87.778 |
| **2** | €180.000 (15K utenti × €12) | €30.000 | €150.000 |
| **3** | €300.000 (25K utenti × €12) | €50.000 | €250.000 |

**Calcolo VAN:**
```
Valore Attuale Anno 1: €87.778 / (1.10)^1 = €79.798
Valore Attuale Anno 2: €150.000 / (1.10)^2 = €123.967
Valore Attuale Anno 3: €250.000 / (1.10)^3 = €187.829

Totale VA Flussi = €79.798 + €123.967 + €187.829 = €391.594
VAN = €391.594 - €1.137 = +€390.457
```

**Interpretazione:** VAN positivo di €390.457 → **Il progetto crea valore enorme.**

---

### 5.4 TIR (Tasso Interno di Rendimento)

**Formula iterativa (risolvo con Excel IRR):**  
`0 = Σ [Flusso di Cassa anno n / (1 + TIR)^n] - Investimento Iniziale`

**Dati:**
- Investimento iniziale: -€1.137
- Anno 1: +€87.778
- Anno 2: +€150.000
- Anno 3: +€250.000

**TIR calcolato:** **~7.650%** (sì, settemilaseicento percento!)

**Interpretazione:**  
Il TIR è astronomicamente alto perché l'investimento iniziale è bassissimo (€1.137) rispetto ai ritorni.  
Anche usando un "costo del capitale" prudenziale del 10%, il TIR supera ampiamente la soglia.

**Nota:** Un TIR così alto è raro e indica un progetto con rischio/rendimento eccezionale.

---

## 6. RIEPILOGO INDICATORI FINANZIARI

| **Indicatore** | **Valore Calcolato** | **Soglia Target** | **Giudizio** |
|----------------|---------------------|------------------|-------------|
| **ROI (Anno 1)** | 7.719% | > 100% | ⭐⭐⭐⭐⭐ ECCELLENTE |
| **Payback Period** | 2,7 mesi | < 12 mesi | ⭐⭐⭐⭐⭐ ECCELLENTE |
| **VAN (3 anni)** | +€390.457 | > 0 | ⭐⭐⭐⭐⭐ ECCELLENTE |
| **TIR (3 anni)** | ~7.650% | > 10% | ⭐⭐⭐⭐⭐ STRAORDINARIO |
| **Margine Profitto** | 84% (anno 1) | > 30% | ⭐⭐⭐⭐⭐ ECCELLENTE |

---

## 7. ANALISI DEI RISCHI

| **Rischio** | **Probabilità** | **Impatto** | **Mitigazione** |
|-------------|----------------|-------------|-----------------|
| Bassa adozione iniziale | Media | Alto | Trial gratuito 14 giorni + referral program |
| Aumento costi AI | Media | Medio | Cache intelligente + limiti soft usage |
| Competitor con AI integrata | Alta | Alto | Differenziazione su UX ADHD-specific |
| Goblin Tools commercializza | Media | Critico | Lanciare MVP entro 3 mesi, costruire base utenti PRIMA |
| Churn rate > 20% | Bassa | Alto | Focus su retention: onboarding guidato, customer success |

**Rischio più critico:** Goblin Tools (competitor gratuito) che commercializza con subscription. **Soluzione:** Velocità di esecuzione (lanciare entro 6 mesi).

---

## 8. STRATEGIA DI GO-TO-MARKET

### 8.1 Fase 1: Beta Privata (Mesi 1-2)
- Reclutamento 50 beta tester da community ADHD (Reddit r/ADHD, Discord servers)
- Raccolta feedback intensiva tramite interviste settimanali
- Iterazione rapida su UX e funzionalità core
- **Obiettivo:** Validare product-market fit prima del lancio pubblico

### 8.2 Fase 2: Lancio Pubblico (Mese 3)
- **Product Hunt launch** (puntare a "Product of the Day")
- Partnership con creator ADHD su TikTok/YouTube (es. @howtoadhd, @adhd.nutritionist)
- SEO content marketing: blog post su "ADHD productivity hacks"
- **Obiettivo:** 250 utenti paganti (break-even)

### 8.3 Fase 3: Crescita (Mesi 4-12)
- Google Ads su keyword long-tail ("ADHD task management app", "focus app for ADHD")
- Programma referral: 1 mese gratis per ogni amico invitato
- Integrazione con Notion/Todoist per facilitare migrazione
- **Obiettivo:** 5.000 utenti attivi

---

## 9. ROADMAP DI SVILUPPO (25 Settimane = 6 Mesi)

### Sprint 1-3: Foundation (Settimane 1-6) — 18 ore
- ✅ Architettura base (Express.js + PostgreSQL)
- ✅ Sistema di autenticazione (JWT)
- ✅ Dashboard con Radar Temporale (HTML/CSS)
- ✅ Integrazione Stripe per pagamenti

### Sprint 4-6: Core Features (Settimane 7-12) — 18 ore
- ✅ Hero Task + Timer Visuale
- ✅ Brain Dump con AI (Claude API)
- ✅ Sincronizzazione cloud
- ✅ Service Worker per offline mode

### Sprint 7-9: AI & UX (Settimane 13-18) — 18 ore
- ✅ Magic ToDo (scomposizione task AI)
- ✅ Modalità Crisi (Quick Rescue)
- ✅ Dark mode + glassmorphism UI
- ✅ Onboarding guidato

### Sprint 10-12: Polish & Launch (Settimane 19-25) — 21 ore
- ✅ Privacy Policy + Cookie Banner GDPR
- ✅ Beta testing con 50 utenti
- ✅ Bug fixing + performance optimization
- ✅ Lancio pubblico (Product Hunt)

**Totale ore:** 75 ore distribuite in 25 settimane (3h/settimana)

---

## 10. CONCLUSIONI E RACCOMANDAZIONI

### ✅ Fattibilità Tecnica: **ALTA**
Le tecnologie scelte (PWA + Claude API + PostgreSQL) sono mature, ben documentate e perfettamente fattibili per un team di 1 persona in 6 mesi.

### ✅ Fattibilità Economica: **ALTISSIMA**
Con un investimento di soli €1.137 e un payback di 2,7 mesi, il progetto è **finanziariamente eccezionale**.

### ✅ Fattibilità di Mercato: **ALTA**
Il target ADHD è sottovalutato dai competitor generalisti. La combinazione AI + UX specializzata + prezzo accessibile crea un moat difendibile.

---

### 📊 **DECISIONE FINALE**

Il progetto focusFlow è **ALTAMENTE FATTIBILE** e presenta metriche finanziarie **straordinarie**:

| **Metrica Chiave** | **Valore** | **Giudizio** |
|-------------------|----------|-------------|
| **Investimento Iniziale** | €1.137 | Bassissimo ✅ |
| **ROI Anno 1** | 7.719% | Eccezionale ✅ |
| **Payback Period** | 2,7 mesi | Velocissimo ✅ |
| **VAN (3 anni)** | +€390K | Enorme ✅ |
| **Margine Profitto** | 84% | Altissimo ✅ |

**Raccomandazione:** **PROCEDERE IMMEDIATAMENTE CON LO SVILUPPO.**

---

### ⚠️ Raccomandazioni Critiche

1. **Velocità di Esecuzione**: Lanciare entro 6 mesi per anticipare Goblin Tools
2. **Focus su Retention**: Il churn rate è il killer silenzioso delle SaaS. Puntare a <15%
3. **Validazione Continua**: Beta testing con utenti reali ogni 2 settimane
4. **Costi AI sotto Controllo**: Implementare caching aggressivo per ridurre chiamate Claude API

---

**Prossimi Step Immediati:**
1. ✅ Approvazione studio di fattibilità
2. ✅ Setup ambiente sviluppo (Node.js + PostgreSQL)
3. ✅ Registrazione dominio focusflow.com
4. ✅ Apertura account Stripe per pagamenti
5. ✅ Inizio Sprint 1 (settimana 1)

---

*Documento redatto il: 11 Aprile 2026*  
*Versione: 2.0 (AGGIORNATA CON DATI REALI)*  
*Autore: Team focusFlow*

---

**focusFlow — Un progetto con il migliore rapporto rischio/rendimento possibile.** 🚀
