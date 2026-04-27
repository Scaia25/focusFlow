# Changelog

Tutte le modifiche degne di nota a questo progetto saranno documentate in questo file.

Il formato si basa su [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
e questo progetto aderisce a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.0] - 2024-05-20
### Aggiunto
- **FocusFlow AI Assistant**: Integrazione ufficiale con le API di Google Generative AI (Gemma/Gemini).
- Sistema di prompt engineering specifico per ADHD (scomposizione in micro-task e linguaggio "body doubling").
- Parser JavaScript per la formattazione dinamica del Markdown nelle chat.
- Effetto "typing" e caricamento visuale per le risposte dell'assistente.

### Modificato
- Migliorata la `chat.php` per supportare lo scroll automatico e il ridimensionamento delle aree di testo.

---

## [1.1.0] - 2024-05-05
### Aggiunto
- **Dashboard Dinamica**: Implementazione del calcolo delle ore lavorative/scolastiche per la visualizzazione del progresso giornaliero.
- **Sistema Diario**: Nuova vista `diary.php` per visualizzare cronologicamente note e attività passate.
- Filtri rapidi "Task" e "Note" nel diario per ridurre il sovraccarico visivo.
- Funzionalità di eliminazione account in `settings.php` con conferma di sicurezza.

### Corretto
- Fix del bug nel calcolo della durata del turno (gestione decimali per il radar temporale).
- Validazione lato server per la registrazione: controllo email duplicate.

---

## [1.0.1] - 2024-04-28
### Modificato
- Refactoring del sistema di sessioni per garantire la persistenza dei dati utente su tutte le pagine.
- Aggiornato il design della navigazione inferiore (Bottom Nav) per una migliore accessibilità su dispositivi mobili.
- Migliorato il sistema di hashing delle password per una maggiore sicurezza.

---

## [1.0.0] - 2024-04-15
### Aggiunto
- **Core Engine**: Prima versione stabile di FocusFlow.
- Sistema di autenticazione completo (`login.php`, `signup.php`, `logout.php`).
- Gestione profilo utente e impostazioni di base (orario di lavoro e tipo di utente).
- Integrazione database MySQL per la gestione di task e note.
- Layout base ispirato al font *Plus Jakarta Sans*.

---

## [0.1.0] - 2024-03-30
### Aggiunto
- Struttura iniziale del progetto e configurazione del database (`connection.php`).
- Setup delle funzioni helper per la traduzione delle date.
- Prototipo della UI per la dashboard.

---

[1.2.0]: https://github.com/tuo-username/focusflow/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/tuo-username/focusflow/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/tuo-username/focusflow/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/tuo-username/focusflow/releases/tag/v1.0.0
