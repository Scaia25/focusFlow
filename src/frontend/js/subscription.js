
const stripe = Stripe('pk_test_xxxxxxxxxxxx'); // Tua chiave pubblica

async function startSubscription() {
    const button = document.getElementById('subscribe-btn');
    button.disabled = true;
    button.textContent = 'Caricamento...';

    try {
        const response = await fetch('backend/create_checkout_session.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        });

        const session = await response.json();

        if (session.error) {
            throw new Error(session.error);
        }

        const result = await stripe.redirectToCheckout({
            sessionId: session.id
        });

        if (result.error) {
            throw new Error(result.error.message);
        }
    } catch (error) {
        alert('Errore: ' + error.message);
        button.disabled = false;
        button.textContent = 'Inizia gratis per 30 giorni';
    }
}

async function manageSubscription() {
    try {
        const response = await fetch('backend/create_portal_session.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        });

        const data = await response.json();

        if (data.error) {
            throw new Error(data.error);
        }

        window.location.href = data.url;
    } catch (error) {
        alert('Errore: ' + error.message);
    }
}