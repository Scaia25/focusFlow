<?php
require('connection.php');
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$messages = $input['messages'] ?? [];  // Ora riceve un array di messaggi

if (empty($messages)) {
    echo json_encode(['error' => 'Messaggio vuoto']);
    exit;
}

$api_url = "https://generativelanguage.googleapis.com/v1beta/models/gemma-3-4b-it:generateContent?key=" . $api_key;

// Costruisci il sistema di prompt come primo messaggio
$system_prompt = "Sei FocusFlow AI, una protesi cognitiva per utenti con ADHD. 
Il tuo obiettivo è combattere la cecità temporale e la paralisi decisionale.

REGOLE DI RISPOSTA (ADHD-FRIENDLY):
1. Semplifica il carico cognitivo: scrivi poco, vai dritto al punto.
2. Chiedi all'utente se deve ha dei task da fare o vuole solo parlare
3. Scomponi i task inseriti dall'utente in micro-step da 5-10 minuti.
4. Agisci come un compagno di 'body doubling': incoraggiante ma fermo.
5. FORMATO VISIVO: 
   - Usa il **Grassetto per i Titoli:** (senza pallini davanti).
   - Usa il pallino • solo per le liste di azioni sotto i titoli.
   - Lascia una riga vuota tra i blocchi di testo.";

// Prepara i contenuti per l'API
$contents = [];
$contents[] = [
    "parts" => [["text" => $system_prompt . "\n\nInizia la conversazione con l'utente."]]
];

// Aggiungi tutti i messaggi della cronologia
foreach ($messages as $msg) {
    $role = $msg['role'] === 'user' ? 'user' : 'model';
    $contents[] = [
        "role" => $role,
        "parts" => [["text" => $msg['content']]]
    ];
}

$data = [
    "contents" => $contents,
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

if ($http_code !== 200) {
    echo json_encode(['error' => "Errore $http_code", 'details' => json_decode($response)]);
} else {
    echo $response;
}