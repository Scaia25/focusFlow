# Studio di Fattibilità — FlowADHD
**Deep Focus PWA per persone con ADHD**

---

## 1. EXECUTIVE SUMMARY

**FlowADHD** è una Progressive Web App (PWA) progettata come "protesi cognitiva" per persone con ADHD, che mira a risolvere problemi di time blindness, paralisi decisionale e dispersione dell'attenzione attraverso un'interfaccia minimalista e un assistente AI dedicato.

### Obiettivi Strategici
- Offrire un ambiente digitale premium a €5/mese
- Raggiungere 5.000 utenti attivi nei primi 12 mesi
- Posizionarsi come alternativa specializzata alle to-do list generiche
- Integrare un assistente AI che funga da supporto psicologico e body doubling digitale

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

**Gap identificato:** Nessuna soluzione combina minimalismo cognitivo + AI psicologico + prezzo accessibile.

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

## 4. ANALISI ECONOMICO-FINANZIARIA

### 4.1 Piano dei Ricavi (12 mesi)
| **Mese** | **Utenti Attivi** | **Ricavi Mensili** | **Ricavi Cumulativi** |
|----------|-------------------|--------------------|-----------------------|
| 1-3      | 100               | €500               | €1.500                |
| 4-6      | 500               | €2.500             | €9.000                |
| 7-9      | 2.000             | €10.000            | €39.000               |
| 10-12    | 5.000             | €25.000            | €114.000              |

### 4.2 Struttura dei Costi (Anno 1)
| **Voce** | **Costo Unitario** | **Totale Annuo** |
|----------|-------------------|------------------|
| Sviluppo iniziale (6 mesi) | €30/h × 400h | €12.000 |
| Hosting + Infrastruttura | €400/mese | €4.800 |
| AI API (costo variabile) | €0.30/utente/mese | €10.800 |
| Marketing (Google Ads + Social) | €500/mese | €6.000 |
| Gateway pagamenti (Stripe 2.9%) | 2.9% ricavi | €3.306 |
| **TOTALE COSTI** | — | **€36.906** |

### 4.3 Break-Even Analysis
- **Punto di pareggio:** 1.200 utenti paganti (mese 7-8)
- **ROI atteso (fine anno 1):** +€77.094 (114.000 - 36.906)
- **Margine di profitto (mese 12):** 68% (€25.000 ricavi - €8.000 costi)

---

## 5. ANALISI DEI RISCHI

| **Rischio** | **Probabilità** | **Impatto** | **Mitigazione** |
|-------------|----------------|-------------|-----------------|
| Bassa adozione iniziale | Media | Alto | Trial gratuito 14 giorni + referral program |
| Aumento costi AI | Media | Medio | Cache intelligente + limiti soft usage |
| Competitor con AI integrata | Alta | Alto | Differenziazione su UX ADHD-specific |
| Problemi privacy dati utente | Bassa | Critico | GDPR compliance + encryption end-to-end |
| Burnout sviluppatore singolo | Media | Alto | Roadmap realistica, no feature creep |

---

## 6. STRATEGIA DI GO-TO-MARKET

### 6.1 Fase 1: Beta Privata (Mesi 1-2)
- Reclutamento 50 beta tester da community ADHD (Reddit, Discord)
- Raccolta feedback intensiva tramite interviste individuali
- Iterazione rapida su UX e funzionalità core

### 6.2 Fase 2: Lancio Pubblico (Mese 3)
- Product Hunt launch
- Partnership con creator ADHD su TikTok/YouTube
- SEO content marketing (blog + guide)

### 6.3 Fase 3: Crescita (Mesi 4-12)
- Google Ads su keyword long-tail ("ADHD task management", "focus app for ADHD")
- Programma referral (1 mese gratis per ogni amico invitato)
- Integrazione con Notion/Todoist per facilitare migrazione

---

## 7. ROADMAP DI SVILUPPO

### MVP (Mesi 1-3)
- ✅ Dashboard con Radar Temporale
- ✅ Hero Task + Timer Visuale
- ✅ Brain Dump con AI (solo scomposizione task)
- ✅ Sincronizzazione cloud base
- ✅ Sistema di autenticazione + pagamenti Stripe

### V1.1 (Mesi 4-6)
- 🔲 Memoria Esterna semantica (ricerca Q&A)
- 🔲 Widget iOS (Quick Add Task)
- 🔲 Statistiche settimanali (tempo in focus, task completati)

### V2.0 (Mesi 7-12)
- 🔲 Modalità Body Doubling (co-working virtuale)
- 🔲 Integrazione calendario (Google/Outlook)
- 🔲 Export dati + API per sviluppatori

---

## 8. CONCLUSIONI E RACCOMANDAZIONI

### ✅ Fattibilità Tecnica: **ALTA**
Le tecnologie scelte (PWA + Claude API + PostgreSQL) sono mature e ben documentate. Il rischio tecnico è basso.

### ✅ Fattibilità Economica: **MEDIA-ALTA**
Con un investimento iniziale di ~€12.000 e un break-even raggiungibile in 7-8 mesi, il progetto è sostenibile anche per un team ridotto.

### ✅ Fattibilità di Mercato: **ALTA**
Il target ADHD è sottovalutato dai competitor generalisti. La combinazione AI + UX specializzata crea un moat difendibile.

### ⚠️ Raccomandazioni Critiche
1. **Validare l'MVP con utenti reali prima del lancio completo** (evitare di costruire funzionalità non richieste)
2. **Monitorare i costi AI da subito** (implementare caching aggressivo)
3. **Focus su retention > acquisizione** (il churn rate nelle app di produttività è ~30% mensile)
4. **Considerare modello freemium** (versione base gratuita + AI premium a €5/mese)

---

**Decisione finale:** Il progetto è **FATTIBILE** e presenta un forte potenziale di mercato. Si raccomanda di procedere con lo sviluppo dell'MVP seguendo un approccio Lean (build-measure-learn) con cicli di validazione ogni 2 settimane.

---

*Documento redatto il: 10 Aprile 2026*  
*Versione: 1.0*  
*Autore: Team FlowADHD*
