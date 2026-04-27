<?php
require("connection.php");
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$user_message = $input['message'] ?? '';

if (empty($user_message)) {
    echo json_encode(['error' => 'Messaggio vuoto']);
    exit;
}

// URL AGGIORNATO con uno dei modelli della tua lista (es. 2.0-flash)
$api_url = "https://generativelanguage.googleapis.com/v1beta/models/gemma-3-4b-it:generateContent?key=" . $api_key;

$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => "Sei FocusFlow AI, una protesi cognitiva per utenti con ADHD. 
                Il tuo obiettivo è combattere la cecità temporale e la paralisi decisionale.

                REGOLE DI RISPOSTA (ADHD-FRIENDLY):
                1. Semplifica il carico cognitivo: scrivi poco, vai dritto al punto.
                2. Scomponi i task in micro-step da 5-10 minuti.
                3. Agisci come un compagno di 'body doubling': incoraggiante ma fermo.
                4. FORMATO VISIVO: 
                   - Usa il **Grassetto per i Titoli:** (senza pallini davanti).
                   - Usa il pallino • solo per le liste di azioni sotto i titoli.
                   - Lascia una riga vuota tra i blocchi di testo.

                Messaggio dell'utente da elaborare: " . $user_message]
            ]
        ]
    ],
    "generationConfig" => [
        "temperature" => 0.7,
        "maxOutputTokens" => 1000,
        "topP" => 0.95
    ]
];

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200) {
    echo json_encode(['error' => "Errore $http_code", 'details' => json_decode($response)]);
} else {
    echo $response;
}