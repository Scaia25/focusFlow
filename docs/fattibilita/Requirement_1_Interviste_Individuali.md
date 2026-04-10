# REQUIREMENT 1: Interviste Individuali
**Progetto:** FlowADHD — Deep Focus PWA  
**Data:** 10 Aprile 2026  
**Metodologia:** Interviste semi-strutturate con utenti target

---

## 1. OBIETTIVI DELL'INDAGINE

Le interviste individuali sono state condotte per:
- ✅ Identificare i **pain points** reali delle persone con ADHD nella gestione quotidiana dei task
- ✅ Validare le funzionalità proposte (Radar Temporale, Hero Task, Brain Dump AI)
- ✅ Scoprire requisiti impliciti non evidenti dalla sola analisi teorica
- ✅ Comprendere il linguaggio e le metafore mentali usate dagli utenti ADHD

---

## 2. CAMPIONE INTERVISTATO

| **ID** | **Età** | **Occupazione** | **Diagnosi ADHD** | **Tool Attuali** |
|--------|---------|----------------|-------------------|------------------|
| U01 | 28 | Developer freelance | Sì (2019) | Todoist, Forest, carta/penna |
| U02 | 34 | Graphic Designer | Sì (2021) | Notion, Google Calendar |
| U03 | 22 | Studentessa Università | No (sospetta) | Apple Reminders, post-it fisici |
| U04 | 41 | Project Manager | Sì (2015) | Asana, Trello, Excel |
| U05 | 26 | Content Creator | Sì (2022) | Structured, Notion, Brain.fm |

**Totale interviste:** 5 (durata media: 45 minuti ciascuna)

---

## 3. STRUTTURA DELL'INTERVISTA

### Domande di Apertura (Non strutturate)
1. Raccontami una giornata tipica dal risveglio alla sera. Come decidi cosa fare?
2. Quali sono le attività che svolgi regolarmente e come le gestisci?
3. Cosa non funziona nel tuo sistema attuale di organizzazione?

### Domande Esplorative (Semi-strutturate)
4. Hai mai vissuto la sensazione di "non sapere quanto tempo sia passato"? Quando accade più spesso?
5. Come ti comporti quando hai molte cose da fare ma non riesci a iniziare nessuna?
6. Hai mai usato un'app di to-do list? Perché hai smesso (se l'hai fatto)?
7. Ti è mai capitato di dimenticare dove hai messo un oggetto importante? Come lo hai ritrovato?

### Domande Specifiche su FlowADHD (Strutturate)
8. [Mostro mockup Radar Temporale] Questa visualizzazione del tempo ti sembra utile? Perché?
9. [Mostro Hero Task] Preferisci vedere UN solo compito alla volta o una lista completa?
10. [Spiego Brain Dump AI] Ti fideresti di un'AI per organizzare i tuoi pensieri caotici?

---

## 4. SINTESI DEI RISULTATI

### 4.1 Pattern Comuni Identificati

#### 🔴 **PAIN POINT #1: Time Blindness Cronica**
> *"Inizio a lavorare pensando siano le 10, guardo l'orologio e sono le 15. Ho saltato il pranzo."* — U01

**Frequenza:** 5/5 intervistati riportano perdita di cognizione del tempo  
**Causa principale:** Iperfocus su attività piacevoli + mancanza di ancore temporali esterne  
**Implicazioni per FlowADHD:** Il Radar Temporale deve essere SEMPRE visibile, non nascondibile

---

#### 🔴 **PAIN POINT #2: Paralisi da Scelta (Decision Paralysis)**
> *"Ho 47 task in Todoist. Li guardo, mi sento sopraffatta, chiudo l'app e scorro TikTok per 2 ore."* — U03

**Frequenza:** 4/5 intervistati abbandonano to-do list troppo lunghe  
**Causa principale:** Cognitive overload + mancanza di priorità chiara  
**Implicazioni per FlowADHD:** Hero Task (1 solo compito visibile) è CRITICO, non opzionale

---

#### 🔴 **PAIN POINT #3: Oblio degli Oggetti Fisici**
> *"Ogni mattina è una caccia al tesoro: chiavi, occhiali, caricatore del telefono... sempre posti diversi."* — U04

**Frequenza:** 3/5 intervistati cercano attivamente una soluzione digitale  
**Richiesta spontanea:** Sistema di "ricerca semantica" tipo *"Dove ho lasciato le chiavi martedì?"*  
**Implicazioni per FlowADHD:** Memoria Esterna non è un "nice-to-have", è una killer feature

---

### 4.2 Validazione delle Funzionalità Proposte

| **Funzionalità** | **Reazione Positiva** | **Reazione Neutrale** | **Reazione Negativa** | **Note** |
|------------------|----------------------|----------------------|----------------------|----------|
| Radar Temporale Spaziale | 5/5 | 0/5 | 0/5 | *"Finalmente qualcuno capisce!"* |
| Hero Task (1 solo compito) | 4/5 | 1/5 | 0/5 | U02 preferisce vedere 3 task, non 1 |
| Timer Visuale | 5/5 | 0/5 | 0/5 | *"Ma deve essere GRANDE e colorato"* |
| Brain Dump AI | 3/5 | 1/5 | 1/5 | U04 scettico: *"L'AI capirà davvero?"* |
| Memoria Esterna | 5/5 | 0/5 | 0/5 | *"Questo me lo compro subito"* |

---

### 4.3 Requisiti Impliciti Scoperti

#### ✨ **REQUISITO IMPLICITO #1: Suoni Non Invasivi**
> *"Le notifiche normali mi danno ansia. Vorrei un suono tipo campana tibetana, non il 'ding' di iPhone."* — U05

**Implementazione:** Sistema audio personalizzabile con preset "ADHD-friendly" (suoni naturali, frequenze basse)

---

#### ✨ **REQUISITO IMPLICITO #2: "Modalità Panico"**
> *"Quando sto per perdere una deadline, entro in panico totale. Vorrei un bottone tipo 'AIUTO' che mi dica esattamente cosa fare nei prossimi 15 minuti."* — U02

**Implementazione:** Shortcut rapido che attiva l'AI in modalità "Crisis Manager" con micro-task da 5 minuti

---

#### ✨ **REQUISITO IMPLICITO #3: Dark Mode di Default**
> *"La luce bianca mi distrugge gli occhi dopo le 18. Dark mode DEVE essere l'impostazione base."* — U01

**Implementazione:** Tema scuro come default + switch rapido senza menu nascosti

---

## 5. REQUISITI FUNZIONALI DERIVATI

In base alle interviste, i seguenti requisiti sono stati aggiunti/modificati:

### ✅ **RF01: Radar Temporale Persistente**
- **Descrizione:** Il Radar Temporale deve essere visibile in ogni schermata dell'app
- **Priorità:** ALTA (criticità utente: 5/5)
- **User Story:** *"Come utente ADHD, voglio vedere sempre quanto tempo è passato nella giornata per evitare di perdere la cognizione del tempo"*

### ✅ **RF02: Hero Task con Variante "Top 3"**
- **Descrizione:** Modalità Hero Task (1 solo compito) + modalità "Focus 3" (max 3 task)
- **Priorità:** MEDIA (1 utente su 5 preferisce vedere più task)
- **User Story:** *"Come utente, voglio poter scegliere se vedere 1 o 3 task per adattare l'app al mio livello di ansia"*

### ✅ **RF03: Modalità Crisi (Quick Rescue)**
- **Descrizione:** Bottone "SOS" che attiva l'AI per creare un piano d'emergenza da 15 minuti
- **Priorità:** ALTA (requisito implicito critico)
- **User Story:** *"Come utente in preda al panico, voglio un piano d'azione immediato senza dover pensare"*

### ✅ **RF04: Memoria Esterna Semantica**
- **Descrizione:** Database di note vocali/testuali ricercabile con linguaggio naturale
- **Priorità:** ALTA (killer feature identificata)
- **User Story:** *"Come utente smemorato, voglio poter chiedere 'Dove ho messo X?' e ricevere una risposta basata sulle mie note passate"*

### ✅ **RF05: Audio Personalizzabile ADHD-Friendly**
- **Descrizione:** Libreria di suoni non invasivi (natura, ASMR, frequenze basse)
- **Priorità:** MEDIA
- **User Story:** *"Come utente sensibile ai suoni, voglio notifiche che non mi causino ansia"*

---

## 6. REQUISITI NON FUNZIONALI DERIVATI

### 🔒 **RNF01: Privacy dei Dati**
> *"Non voglio che i miei pensieri caotici finiscano in mano a terzi."* — U04

- Encryption end-to-end per Brain Dump
- Opzione di eliminazione totale dati utente (GDPR compliance)

### ⚡ **RNF02: Performance Sub-Secondo**
> *"Se l'app ci mette 3 secondi a caricare, ho già cambiato schermata."* — U01

- Tempo di caricamento iniziale < 1 secondo
- Transizioni UI < 200ms

### 📱 **RNF03: Offline-First**
> *"Quando sono in treno senza rete, l'app deve funzionare lo stesso."* — U03

- Service Worker per funzionamento offline completo
- Sincronizzazione automatica quando torna la connessione

---

## 7. VERBATIM (Citazioni Chiave)

### Sull'Importanza del Minimalismo
> *"Notion è bellissimo ma mi fa venire l'ansia. Troppi bottoni, troppi menu, troppa libertà. Io ho bisogno che qualcuno mi dica: 'FAI QUESTO'. Punto."* — U02

### Sulla Fiducia nell'AI
> *"Se l'AI riesce a capire il mio casino mentale meglio di me, pagherò volentieri. Ma deve essere BRAVA, non una ChatGPT generica."* — U05

### Sul Prezzo
> *"€5/mese sono onesti. Pago €12/mese per Spotify che uso 1 ora al giorno. Se questa app mi salva 3 ore al giorno, sono €5 ben spesi."* — U01

---

## 8. CONCLUSIONI E PROSSIMI PASSI

### ✅ Validazioni Confermate
- Il concept di FlowADHD risponde a bisogni REALI e non soddisfatti
- Gli utenti sono disposti a pagare per una soluzione ADHD-specifica
- Il Radar Temporale e la Memoria Esterna sono percepiti come innovativi

### ⚠️ Aree di Rischio Identificate
- L'AI deve essere eccellente, altrimenti gli utenti abbandonano (aspettative alte)
- Serve un sistema di onboarding guidato (gli utenti ADHD odiano leggere manuali)
- La personalizzazione deve essere "progressiva" (troppe opzioni iniziali = paralisi)

### 🚀 Azioni Immediate
1. ✅ Aggiungere RF03 (Modalità Crisi) alla roadmap MVP
2. ✅ Prioritizzare RF04 (Memoria Esterna) per V1.1 invece che V2.0
3. ✅ Creare wireframe di onboarding con tutorial interattivo (no testo statico)
4. ✅ Testare prototipi audio con 3 utenti prima di implementare libreria completa

---

*Interviste condotte da: Team FlowADHD*  
*Periodo: Marzo 2026*  
*Prossima revisione: Dopo lancio beta (Maggio 2026)*
