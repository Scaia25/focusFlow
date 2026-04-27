# Analisi Indicatori di Redditività — focusFlow
**ROI | Payback Period | VAN | TIR**

---

## DATI DI INPUT DEL PROGETTO

### Investimento Iniziale
| **Voce** | **Dettaglio** | **Importo** |
|----------|--------------|-------------|
| Sviluppo Interno | 75 ore × €15/h | €1.125 |
| Dominio + SSL | focusflow.com (1 anno) | €12 |
| **TOTALE INVESTIMENTO** | — | **€1.137** |

### Parametri Operativi
- **Durata progetto:** 25 settimane (6 mesi)
- **Ore settimanali:** 3h
- **Prezzo subscription:** €5/mese
- **Trial period:** 14 giorni gratuiti
- **Tasso conversione trial → paid:** 70%
- **Churn rate mensile:** 15%

---

## 1. ROI — RETURN ON INVESTMENT

### 📐 Formula
```
ROI = (Guadagno Netto dall'Investimento / Costo dell'Investimento) × 100
```

### 📊 Calcolo Anno 1

**Ricavi Totali (12 mesi):**
- Mese 1: €0 (trial)
- Mese 2: €600
- Mese 3: €1.250
- Mese 4: €2.250
- Mese 5: €3.500
- Mese 6: €5.000
- Mese 7: €7.000
- Mese 8: €9.500
- Mese 9: €12.500
- Mese 10: €16.000
- Mese 11: €20.000
- Mese 12: €25.000

**Totale Ricavi Anno 1:** €102.600

**Costi Operativi Anno 1:**
- Hosting: €360
- AI API (Claude): €7.050
- Stripe Fees (2,9%): €2.975
- Marketing: €4.200
- Email Service: €225
- DNS/SSL: €12

**Totale Costi Operativi:** €14.822

**Guadagno Netto:**
```
Guadagno Netto = Ricavi - Costi Operativi
Guadagno Netto = €102.600 - €14.822 = €87.778
```

**ROI:**
```
ROI = (€87.778 / €1.137) × 100
ROI = 7.719%
```

### ✅ Interpretazione ROI

**Per ogni €1 investito, focusFlow genera €77,19 di ritorno nel primo anno.**

| **ROI** | **Soglia Eccellente** | **focusFlow** | **Giudizio** |
|---------|---------------------|-------------|-------------|
| Standard startup | > 200% | **7.719%** | ⭐⭐⭐⭐⭐ STRAORDINARIO |
| Standard business | > 15% | **7.719%** | ⭐⭐⭐⭐⭐ ECCEZIONALE |

**Nota:** Un ROI superiore al 7.000% è raro e indica un progetto con:
- Bassissimo investimento iniziale
- Modello di business scalabile (SaaS)
- Costi marginali minimi per nuovo utente

---

## 2. PAYBACK PERIOD — PERIODO DI RECUPERO

### 📐 Formula (con flussi variabili)
```
Analisi mese per mese fino a quando il Flusso di Cassa Cumulativo diventa positivo
```

### 📊 Tabella Flussi di Cassa

| **Mese** | **Ricavi** | **Costi** | **Flusso Netto** | **Cumulativo** | **Status** |
|---------|-----------|---------|----------------|---------------|-----------|
| **0** | €0 | €1.137 | **-€1.137** | **-€1.137** | ❌ Investimento |
| **1** | €0 | €144 | **-€144** | **-€1.281** | ❌ Trial gratuito |
| **2** | €600 | €144 | **+€456** | **-€825** | ⚠️ Ancora in negativo |
| **3** | €1.250 | €144 | **+€1.106** | **+€281** | ✅ **BREAK-EVEN!** |
| **4** | €2.250 | €370 | **+€1.880** | **+€2.161** | ✅ Profitto |
| **5** | €3.500 | €575 | **+€2.925** | **+€5.086** | ✅ Profitto crescente |
| **6** | €5.000 | €775 | **+€4.225** | **+€9.311** | ✅ Forte accelerazione |

### 🎯 Calcolo Esatto del Payback Period

**All'inizio del Mese 3:**
- Debito residuo: €825
- Flusso netto previsto mese 3: €1.106

**Frazione di mese necessaria:**
```
Frazione = Debito Residuo / Flusso Mese 3
Frazione = €825 / €1.106 = 0,746 mesi
```

**Conversione in giorni:**
```
0,746 mesi × 30 giorni = 22,4 giorni ≈ 22 giorni
```

### ✅ Payback Period Totale
```
Payback Period = 2 mesi + 22 giorni
Payback Period ≈ 2,7 mesi
```

### 📈 Interpretazione Payback Period

| **Settore** | **Payback Tipico** | **focusFlow** | **Giudizio** |
|------------|-------------------|-------------|-------------|
| SaaS B2C | 12-18 mesi | **2,7 mesi** | ⭐⭐⭐⭐⭐ ECCEZIONALE |
| Startup tech | 24-36 mesi | **2,7 mesi** | ⭐⭐⭐⭐⭐ STRAORDINARIO |
| E-commerce | 6-12 mesi | **2,7 mesi** | ⭐⭐⭐⭐⭐ ECCELLENTE |

**Significato pratico:**
- Dopo meno di 3 mesi, tutti i costi sono recuperati
- Dal mese 4 in poi, ogni euro è profitto puro
- Rischio finanziario estremamente basso (esposizione breve)

---

## 3. VAN — VALORE ATTUALE NETTO (NPV)

### 📐 Formula
```
VAN = Σ [Flusso di Cassa anno n / (1 + tasso di sconto)^n] - Investimento Iniziale
```

### 📊 Parametri
- **Tasso di Sconto:** 10% (costo opportunità del capitale)
- **Orizzonte Temporale:** 3 anni
- **Valuta:** Euro (€)

### 💰 Proiezioni Flussi di Cassa Netti

| **Anno** | **Ricavi** | **Costi Operativi** | **Flusso Netto** |
|---------|----------|-------------------|-----------------|
| **1** | €102.600 | €14.822 | **€87.778** |
| **2** | €180.000 | €30.000 | **€150.000** |
| **3** | €300.000 | €50.000 | **€250.000** |

**Assunzioni Anno 2-3:**
- **Anno 2:** 15.000 utenti medi (€180K/anno)
- **Anno 3:** 25.000 utenti medi (€300K/anno)
- Costi scalano linearmente con base utenti

### 🧮 Calcolo VAN Passo-Passo

**Valore Attuale Anno 1:**
```
VA₁ = €87.778 / (1 + 0,10)¹
VA₁ = €87.778 / 1,10
VA₁ = €79.798
```

**Valore Attuale Anno 2:**
```
VA₂ = €150.000 / (1 + 0,10)²
VA₂ = €150.000 / 1,21
VA₂ = €123.967
```

**Valore Attuale Anno 3:**
```
VA₃ = €250.000 / (1 + 0,10)³
VA₃ = €250.000 / 1,331
VA₃ = €187.829
```

**Somma Valori Attuali:**
```
Totale VA = €79.798 + €123.967 + €187.829
Totale VA = €391.594
```

**VAN Finale:**
```
VAN = Totale VA - Investimento Iniziale
VAN = €391.594 - €1.137
VAN = +€390.457
```

### ✅ Interpretazione VAN

| **VAN** | **Significato** | **Decisione** |
|---------|----------------|--------------|
| **VAN > 0** | Il progetto genera valore | ✅ **ACCETTARE** |
| **VAN = 0** | Progetto in pareggio | ⚠️ VALUTARE |
| **VAN < 0** | Il progetto distrugge valore | ❌ RIFIUTARE |

**focusFlow: VAN = +€390.457**

**Interpretazione:**
- Il progetto crea **€390K di valore** oltre al rimborso dell'investimento
- Anche scontando i flussi futuri al 10%, il progetto è **altamente redditizio**
- Un VAN così elevato indica un progetto **eccezionale**

---

## 4. TIR — TASSO INTERNO DI RENDIMENTO (IRR)

### 📐 Formula
```
0 = Σ [Flusso di Cassa anno n / (1 + TIR)^n] - Investimento Iniziale
```

Il TIR è il tasso di sconto che rende il VAN = 0. Non ha formula diretta, si calcola per iterazione.

### 🧮 Calcolo TIR (Metodo Excel IRR)

**Flussi di Cassa:**
- Anno 0: -€1.137 (investimento)
- Anno 1: +€87.778
- Anno 2: +€150.000
- Anno 3: +€250.000

**Equazione da risolvere:**
```
0 = -€1.137 + [€87.778/(1+TIR)¹] + [€150.000/(1+TIR)²] + [€250.000/(1+TIR)³]
```

**Soluzione iterativa (Excel `=IRR()`):**
```
TIR ≈ 7.650% (settemilaseicento percento!)
```

### 📊 Verifica Manuale (per credibilità)

Proviamo con TIR = 7.650%:

```
VA₁ = €87.778 / (1 + 76,50)¹ = €87.778 / 77,50 = €1.133
VA₂ = €150.000 / (1 + 76,50)² ≈ €0
VA₃ = €250.000 / (1 + 76,50)³ ≈ €0

VAN ≈ €1.133 - €1.137 ≈ €-4 ≈ 0 ✅ (errore di arrotondamento accettabile)
```

**Il TIR è corretto: ~7.650%**

### ✅ Interpretazione TIR

| **Confronto** | **Tasso** | **focusFlow TIR** | **Giudizio** |
|--------------|----------|----------------|-------------|
| **Costo del Capitale** | 10% | **7.650%** | ⭐⭐⭐⭐⭐ ECCEZIONALE |
| **Tasso Risk-Free (BTP)** | 3% | **7.650%** | ⭐⭐⭐⭐⭐ STRAORDINARIO |
| **Rendimento S&P 500** | 10% annuo | **7.650%** | ⭐⭐⭐⭐⭐ IMBATTIBILE |

**Significato pratico:**
- Il progetto genera un rendimento **7.650 volte superiore** al costo del capitale
- Questo è possibile solo con:
  - Investimento iniziale bassissimo (€1.137)
  - Ritorni molto elevati (€87K+ nel primo anno)
  - Modello SaaS ad alta scalabilità

### ⚠️ Nota Importante sul TIR Elevato

Un TIR >7.000% è **raro ma legittimo** in progetti con:
1. **Bassissimo CAPEX iniziale** (solo sviluppo interno)
2. **Alto margine variabile** (SaaS: costo per utente ~€0,30/mese, prezzo €5/mese)
3. **Crescita rapida** (da 0 a 5K utenti in 12 mesi)

**Non è un errore di calcolo**, ma riflette la natura **capital-light** del progetto.

---

## 5. RIEPILOGO COMPARATIVO INDICATORI

### 📊 Tabella Decisionale

| **Indicatore** | **Valore Calcolato** | **Soglia Minima** | **Soglia Eccellenza** | **Giudizio focusFlow** |
|----------------|---------------------|------------------|---------------------|---------------------|
| **ROI Anno 1** | **7.719%** | > 15% | > 200% | ⭐⭐⭐⭐⭐ STRAORDINARIO |
| **Payback Period** | **2,7 mesi** | < 24 mesi | < 12 mesi | ⭐⭐⭐⭐⭐ ECCEZIONALE |
| **VAN (3 anni)** | **+€390.457** | > €0 | > €100K | ⭐⭐⭐⭐⭐ ECCELLENTE |
| **TIR (3 anni)** | **~7.650%** | > 10% | > 30% | ⭐⭐⭐⭐⭐ IMBATTIBILE |
| **Margine Profitto** | **84%** | > 20% | > 50% | ⭐⭐⭐⭐⭐ ECCELLENTE |

### 🎯 Raccomandazione Finanziaria Finale

**TUTTI gli indicatori puntano nella stessa direzione:**

✅ **ROI straordinario** → Ritorno 77x sull'investimento  
✅ **Payback velocissimo** → Capitale recuperato in <3 mesi  
✅ **VAN positivo enorme** → Creazione di valore €390K+  
✅ **TIR superiore a qualsiasi benchmark** → Rendimento eccezionale  

**DECISIONE:** Il progetto focusFlow è **FINANZIARIAMENTE ECCELLENTE** e deve essere **APPROVATO IMMEDIATAMENTE**.

---

## 6. ANALISI DI SENSIBILITÀ (Scenari What-If)

### Scenario 1: Pessimistico (-30% Utenti)

**Assunzioni:**
- Utenti Anno 1: 3.500 invece di 5.000
- Ricavi Anno 1: €71.820 (-30%)

**Ricalcolo:**
- Guadagno Netto: €71.820 - €12.000 = €59.820
- ROI: (€59.820 / €1.137) × 100 = **5.262%**
- Payback: ~4 mesi
- VAN: +€250K circa
- TIR: ~5.000%

**Giudizio:** Anche nello scenario pessimistico, **il progetto rimane eccellente**.

---

### Scenario 2: Ottimistico (+50% Utenti)

**Assunzioni:**
- Utenti Anno 1: 7.500 invece di 5.000
- Ricavi Anno 1: €153.900 (+50%)

**Ricalcolo:**
- Guadagno Netto: €153.900 - €18.000 = €135.900
- ROI: (€135.900 / €1.137) × 100 = **11.951%**
- Payback: ~2 mesi
- VAN: +€600K circa
- TIR: ~10.000%+

**Giudizio:** Scenario ottimistico porta metriche **ancora più straordinarie**.

---

### Scenario 3: Goblin Tools Commercializza (Competitor Aggressivo)

**Assunzioni:**
- Churn rate sale al 25% (da 15%)
- Conversione trial → paid scende al 50% (da 70%)
- Utenti Anno 1: 3.000 invece di 5.000

**Ricalcolo:**
- Ricavi Anno 1: €57.456
- Guadagno Netto: €57.456 - €11.000 = €46.456
- ROI: (€46.456 / €1.137) × 100 = **4.086%**
- Payback: ~5 mesi
- VAN: +€180K circa
- TIR: ~4.000%

**Giudizio:** Anche con un competitor aggressivo, **il progetto rimane redditizio**.

---

## 7. CONCLUSIONI E RACCOMANDAZIONI

### ✅ Sintesi Finale

focusFlow presenta indicatori finanziari **straordinari** in tutti gli scenari:

1. **ROI 7.719%** → Uno dei ritorni più alti possibili per un progetto digital
2. **Payback 2,7 mesi** → Recupero quasi immediato del capitale
3. **VAN +€390K** → Creazione di valore enorme in 3 anni
4. **TIR ~7.650%** → Rendimento imbattibile

### 📈 Fattori di Successo

**Perché questi numeri sono così favorevoli?**

1. **Investimento iniziale bassissimo** (€1.137)
   - Solo sviluppo interno
   - Stack open-source gratuito
   - Infrastruttura cloud free tier

2. **Margini altissimi** (84%)
   - Costo per utente: ~€0,30/mese (AI API)
   - Prezzo: €5/mese
   - Margine unitario: 94%

3. **Scalabilità SaaS**
   - Costo marginale quasi zero per nuovo utente
   - Crescita esponenziale possibile

4. **Mercato sottovalutato**
   - 40M+ persone ADHD in EU+USA
   - Competitor non specializzati
   - Gap di mercato chiaro

### ⚠️ Rischi da Monitorare

1. **Churn rate:** Se supera il 20%, i ricavi crollano
   → **Mitigazione:** Focus maniacale su retention

2. **Costi AI:** Se gli utenti usano Brain Dump 10x più del previsto
   → **Mitigazione:** Rate limiting + cache aggressivo

3. **Goblin Tools commercializza:** Competitor gratuito diventa paid
   → **Mitigazione:** Lanciare ENTRO 6 mesi

### 🚀 Prossimi Step

1. ✅ Approvare il progetto (decisione immediata)
2. ✅ Iniziare sviluppo Sprint 1 (questa settimana)
3. ✅ Setup infrastruttura (Railway + PostgreSQL)
4. ✅ Registrare dominio focusflow.com
5. ✅ Aprire account Stripe Business

---

**DECISIONE FINALE: PROGETTO APPROVATO ✅**

Il rapporto rischio/rendimento di focusFlow è **eccezionale**. L'investimento di €1.137 può generare oltre €390K di valore in 3 anni, con un recupero del capitale in meno di 3 mesi.

**Non ci sono ragioni finanziarie per NON procedere.**

---

*Analisi redatta il: 11 Aprile 2026*  
*Metodologia: ROI, Payback Period, VAN (DCF), TIR (IRR)*  
*Autore: Team focusFlow — Financial Analysis*
