<?php
require('connection.php');
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$messages = $input['messages'] ?? [];

if (empty($messages)) {
    echo json_encode(['error' => 'Messaggio vuoto']);
    exit;
}

// Groq API endpoint
$api_url = "https://api.groq.com/openai/v1/chat/completions";

// Costruisci il sistema di prompt come primo messaggio
$system_prompt = "Sei FocusFlow AI, una protesi cognitiva per utenti con ADHD. 
Il tuo obiettivo è combattere la cecità temporale e la paralisi decisionale.

REGOLE DI RISPOSTA (ADHD-FRIENDLY):
1. Semplifica il carico cognitivo: scrivi poco, vai dritto al punto.
2. Chiedi all'utente se ha dei task da fare o vuole solo parlare.
3. Scomponi i task inseriti dall'utente in micro-step da 5-10 minuti.
4. Agisci come un compagno di 'body doubling': incoraggiante ma fermo.
5. FORMATO VISIVO: 
   - Usa il **Grassetto per i Titoli:** (senza pallini davanti).
   - Usa il pallino • solo per le liste di azioni sotto i titoli.
   - Lascia una riga vuota tra i blocchi di testo.
6. Per attacchi di panico ADHD: 
    - Inizia con 'FERMATI. Respira con me: inspira 4 secondi, trattieni 4, espira 4, trattieni 4.'
    - Usa la tecnica 5-4-3-2-1 per radicamento sensoriale
    - Ricorda all'utente che l'ADHD amplifica le emozioni ma passano in fretta
    - Suggerisci azioni fisiche immediate (acqua fredda sul viso, stretching, cambio stanza)
    - NON dire 'calmati' o 'non preoccuparti'";

// Prepara i messaggi per Groq (formato OpenAI)
$api_messages = [];
$api_messages[] = [
    'role' => 'system',
    'content' => $system_prompt
];

// Aggiungi tutti i messaggi della cronologia
foreach ($messages as $msg) {
    $role = $msg['role'] === 'user' ? 'user' : 'assistant';
    $api_messages[] = [
        'role' => $role,
        'content' => $msg['content']
    ];
}

$data = [
    "model" => "llama-3.3-70b-versatile",  // Modello Groq gratuito e potente
    "messages" => $api_messages,
    "temperature" => 0.7,
    "max_tokens" => 1000,
    "top_p" => 0.95,
    "stream" => false
];

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_code !== 200) {
    echo json_encode(['error' => "Errore $http_code", 'details' => json_decode($response)]);
} else {
    // Converti la risposta Groq nel formato che il frontend si aspetta
    $groq_response = json_decode($response, true);

    if (isset($groq_response['choices'][0]['message']['content'])) {
        $converted = [
            "candidates" => [
                [
                    "content" => [
                        "parts" => [
                            ["text" => $groq_response['choices'][0]['message']['content']]
                        ]
                    ]
                ]
            ]
        ];
        echo json_encode($converted);
    } else {
        echo json_encode(['error' => 'Formato risposta Groq non valido', 'details' => $groq_response]);
    }
}
?>