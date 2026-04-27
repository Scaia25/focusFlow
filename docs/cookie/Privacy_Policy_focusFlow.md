# Privacy Policy — focusFlow
**Effective Date:** April 10, 2026  
**Last Updated:** April 10, 2026

---

## 1. INTRODUCTION

Welcome to **focusFlow** ("we," "our," or "us"). We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our Progressive Web Application (PWA) and related services (collectively, the "Service").

**By using focusFlow, you agree to the collection and use of information in accordance with this Privacy Policy.**

---

## 2. INFORMATION WE COLLECT

### 2.1 Personal Information You Provide to Us

When you register for an account or use our Service, we may collect the following information:

| **Data Type** | **Purpose** | **Legal Basis (GDPR)** |
|--------------|------------|------------------------|
| **Email Address** | Account creation, authentication, service communications | Contract performance |
| **Display Name** | Personalization of the Service | Contract performance |
| **Profile Photo** (optional) | Visual identification in the app | Consent |
| **Payment Information** | Processing subscription payments (€5/month) | Contract performance |

**Note:** We do NOT directly store payment card details. Payment processing is handled by **Stripe**, a PCI-DSS compliant third-party processor.

### 2.2 Information Automatically Collected

When you use focusFlow, we automatically collect certain information:

| **Data Type** | **Purpose** | **Storage Method** |
|--------------|------------|-------------------|
| **Device Information** | Browser type, OS, device model | Server logs (30 days) |
| **IP Address** | Security, fraud prevention, approximate location | Server logs (30 days) |
| **Usage Data** | Feature usage, session duration, click patterns | PostgreSQL database |
| **Login History** | Security monitoring, suspicious activity detection | Firestore (90 days) |

### 2.3 Brain Dump & Task Data (Sensitive Content)

focusFlow allows you to input thoughts, tasks, and personal notes through the **Brain Dump** feature. This data may include:
- Text notes (typed or voice-transcribed)
- Task descriptions and deadlines
- Personal reminders and memory logs

**⚠️ IMPORTANT:** We treat this data as highly sensitive and apply **end-to-end encryption** for storage.

---

## 3. HOW WE USE YOUR INFORMATION

We use your personal information for the following purposes:

### 3.1 Service Delivery
- Provide core features (Hero Task, Radar Temporale, Brain Dump AI)
- Synchronize your data across devices
- Deliver timer notifications and reminders

### 3.2 AI-Powered Features
- Process Brain Dump inputs to decompose tasks into micro-steps
- Provide conversational support via our AI assistant
- Enable semantic search in your External Memory

**AI Processing:** Your Brain Dump data is sent to **Anthropic's Claude API** for processing. Anthropic processes this data solely to provide the Service and does NOT use it for training their models. [See Anthropic's Data Policy](https://www.anthropic.com/legal/privacy)

### 3.3 Service Improvement
- Analyze aggregated, anonymized usage patterns to improve UX
- Monitor app performance and fix bugs
- Conduct A/B testing of new features

### 3.4 Communications
- Send transactional emails (password reset, billing confirmations)
- Deliver important service updates or security alerts
- (Optional) Send product updates and tips (you can opt-out anytime)

### 3.5 Legal Compliance & Safety
- Comply with legal obligations (tax, GDPR requests)
- Protect against fraud, abuse, and security threats
- Enforce our Terms of Service

---

## 4. DATA SHARING AND DISCLOSURE

### 4.1 Third-Party Service Providers

We share your information with trusted third-party providers who assist us in operating the Service:

| **Provider** | **Purpose** | **Data Shared** | **Location** | **Privacy Policy** |
|-------------|------------|----------------|------------|-------------------|
| **Anthropic (Claude API)** | AI task decomposition, Brain Dump processing | Task text, user prompts | USA | [Anthropic Privacy](https://www.anthropic.com/legal/privacy) |
| **Stripe** | Payment processing | Email, billing details | USA/EU | [Stripe Privacy](https://stripe.com/privacy) |
| **Railway/Render** | Hosting infrastructure | All user data (encrypted at rest) | EU/USA | [Railway Privacy](https://railway.app/privacy) |
| **Supabase** | Database management | User profile, tasks, activity logs | EU | [Supabase Privacy](https://supabase.com/privacy) |
| **Cloudflare** | CDN, DDoS protection | IP addresses, browser info | Global | [Cloudflare Privacy](https://www.cloudflare.com/privacypolicy/) |

**⚠️ These providers are GDPR-compliant and have signed Data Processing Agreements (DPAs) with us.**

### 4.2 We Do NOT Sell Your Data

We **NEVER** sell, rent, or trade your personal information to third parties for marketing purposes.

### 4.3 Legal Requirements

We may disclose your information if required by law or in response to:
- Valid legal process (subpoena, court order)
- Requests from government authorities
- Protection of our legal rights or safety of users

---

## 5. DATA RETENTION

| **Data Type** | **Retention Period** | **Reason** |
|--------------|---------------------|-----------|
| **Account Data** | Until account deletion + 30 days | Service delivery, legal compliance |
| **Task/Brain Dump Data** | Until account deletion | User-generated content |
| **Login History** | 90 days | Security monitoring |
| **Server Logs** | 30 days | Debugging, security analysis |
| **Payment Records** | 7 years | Tax compliance (EU/IT law) |

**After account deletion:** We permanently delete all personal data within 30 days, except where retention is legally required (e.g., financial records for tax purposes).

---

## 6. YOUR RIGHTS UNDER GDPR

As a user in the European Union (or similar jurisdiction), you have the following rights:

### ✅ **Right to Access (Art. 15 GDPR)**
You can request a copy of all personal data we hold about you.

### ✅ **Right to Rectification (Art. 16 GDPR)**
You can update or correct inaccurate information in your account settings.

### ✅ **Right to Erasure ("Right to be Forgotten") (Art. 17 GDPR)**
You can delete your account and request permanent deletion of all data.

### ✅ **Right to Data Portability (Art. 20 GDPR)**
You can download your data in JSON format (tasks, notes, activity logs).

### ✅ **Right to Restrict Processing (Art. 18 GDPR)**
You can request that we temporarily stop processing your data.

### ✅ **Right to Object (Art. 21 GDPR)**
You can object to data processing based on legitimate interests.

### ✅ **Right to Withdraw Consent (Art. 7(3) GDPR)**
You can withdraw consent for optional features (e.g., analytics) at any time.

### 📧 **How to Exercise Your Rights**
Send a request to: **privacy@focusflow.com**  
We will respond within **30 days** as required by GDPR.

---

## 7. DATA SECURITY

We implement industry-standard security measures to protect your data:

### 🔒 Encryption
- **In Transit:** All data is encrypted using TLS 1.3 (HTTPS)
- **At Rest:** Database encryption using AES-256
- **Brain Dump Data:** End-to-end encryption (E2EE) using user-specific keys

### 🛡️ Access Controls
- Role-based access control (RBAC) for internal team members
- Multi-factor authentication (MFA) for admin accounts
- Regular security audits and penetration testing

### ⚠️ No Security is Perfect
While we take extensive precautions, no system is 100% secure. If you become aware of a security breach, please contact us immediately at **security@focusflow.com**.

---

## 8. COOKIES AND TRACKING

### 8.1 Types of Cookies We Use

| **Cookie Type** | **Purpose** | **Duration** | **Consent Required?** |
|----------------|------------|-------------|---------------------|
| **Essential Cookies** | Session management, authentication | Session | ❌ No (strictly necessary) |
| **Preference Cookies** | Remember settings (theme, language) | 1 year | ❌ No (functionality) |
| **Analytics Cookies** | Measure app usage, improve UX | 1 year | ✅ Yes (opt-in) |

### 8.2 Analytics (Optional)
We use **Google Analytics 4** (only if you consent) to understand how users interact with focusFlow. You can opt-out anytime in **Settings > Privacy**.

**No Analytics Cookies are set until you explicitly consent.**

### 8.3 Managing Cookies
- **Browser Controls:** You can block cookies in your browser settings
- **focusFlow Settings:** Toggle analytics on/off in the app
- **Consent Withdrawal:** Click "Reset Cookie Preferences" in the footer

For more details, see our **[Cookie Policy](#)**.

---

## 9. CHILDREN'S PRIVACY

focusFlow is **NOT intended for users under 16 years old**.

We do not knowingly collect data from children. If we discover that a user is under 16, we will delete their account immediately. If you are a parent/guardian and believe your child has created an account, contact us at **privacy@focusflow.com**.

---

## 10. INTERNATIONAL DATA TRANSFERS

focusFlow is based in the **European Union (Italy)**. However, some service providers (e.g., Anthropic, Stripe) are based in the USA.

### 🇪🇺 GDPR Compliance for USA Transfers
- We use **Standard Contractual Clauses (SCCs)** approved by the EU Commission
- Providers are certified under the **EU-US Data Privacy Framework** (where applicable)
- Data is encrypted both in transit and at rest

If you are located in the EU, your data may be transferred to the USA, but it remains protected under GDPR standards.

---

## 11. CHANGES TO THIS PRIVACY POLICY

We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last Updated" date.

**Material Changes:** If we make significant changes (e.g., new data uses), we will notify you via:
- Email to your registered address
- In-app notification banner

**Your continued use of focusFlow after changes constitutes acceptance of the updated policy.**

---

## 12. CONTACT US

If you have questions, concerns, or wish to exercise your GDPR rights, contact us:

📧 **Email:** privacy@focusflow.com  
📍 **Mailing Address:**  
focusFlow  
Via Example, 123  
25100 Brescia (BS)  
Italy

🇪🇺 **Data Protection Officer (DPO):**  
For GDPR-specific inquiries, email: dpo@focusflow.com

🛡️ **Supervisory Authority:**  
You have the right to lodge a complaint with the Italian Data Protection Authority (Garante per la protezione dei dati personali):  
[www.garanteprivacy.it](https://www.garanteprivacy.it)

---

## 13. ADDITIONAL INFORMATION FOR EU USERS

### Legal Basis for Processing (GDPR Art. 6)
- **Contract Performance:** Processing necessary to provide the Service (account, tasks, AI features)
- **Legitimate Interests:** Security monitoring, fraud prevention, service improvement
- **Consent:** Analytics, marketing communications (you can withdraw anytime)
- **Legal Obligation:** Tax compliance, response to legal requests

### Automated Decision-Making
We do NOT use your data for automated decision-making or profiling (GDPR Art. 22).

---

*This Privacy Policy is compliant with GDPR (Regulation EU 2016/679) and Italian Legislative Decree 196/2003 (Privacy Code).*

---

**focusFlow — Created with care for those who see the world differently.** 🌊
