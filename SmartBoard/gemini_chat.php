<?php
header('Content-Type: application/json');

// Načítanie otázky
$input = json_decode(file_get_contents('php://input'), true);
$question = isset($input['question']) ? trim($input['question']) : '';

if (!$question) {
    echo json_encode(['answer' => 'Prosím, zadajte otázku.']);
    exit();
}

// Kontext stránky (text)
$pageContext = <<<TEXT

Logo

    Úvod
    Čo ponúkame
    Spolupráca
    Prečo Smart Board
    Vízia
    Projekty
    Zamestnanec
    AI Chat

Smart Board – programovanie a vývoj projektov s Arduino

Smart Board je moderná technologická firma zameraná na vývoj a realizáciu projektov postavených na platforme Arduino. Prinášame inteligentné riešenia pre domácnosti, školy, startupy aj priemyselné prevádzky. Našim cieľom je prepájať inovácie s praktickým využitím a premieňať nápady na funkčné zariadenia.
Projekty
Projekt číslo 1 – Inteligentné riadenie LED osvetlenia pomocou Arduino

Tento projekt bol zameraný na návrh a implementáciu inteligentného systému riadenia LED osvetlenia s využitím mikrokontroléra Arduino.

Projekt bol úspešne otestovaný a odovzdaný v súlade s internými pravidlami.
Čo ponúkame

    Vývoj prototypov – od prvotného návrhu až po plne funkčný model
    Automatizácia a smart riešenia – inteligentné riadenie osvetlenia, kúrenia, zavlažovania či bezpečnostných systémov
    IoT projekty – prepojenie zariadení do siete a vzdialené ovládanie
    Programovanie a optimalizácia kódu – efektívne a spoľahlivé riešenia
    Vzdelávacie projekty a workshopy – praktická výučba práce s Arduino technológiou
    Vlastný hardvér – navrhujeme a vyrábame špeciálne hardvérové moduly, ktoré dopĺňajú naše Arduino projekty a umožňujú riešenia na mieru

Spolupracujeme s lídrami trhu
Naše projekty realizujeme pre najväčšie firmy sveta. Podieľame sa na vývoji inovatívnych riešení pre globálne spoločnosti, kde je dôraz na kvalitu, spoľahlivosť a technologickú precíznosť absolútnou prioritou.

Smart Board je partnerom pre firmy, ktoré hľadajú profesionálny prístup, diskrétnosť a technickú dokonalosť pri vývoji hardvérových a IoT riešení.
Prečo Smart Board?

    Individuálny prístup ku každému projektu
    Moderné technológie a overené postupy
    Skúsenosti s realizáciou projektov pre globálne spoločnosti
    Vlastný hardvér prispôsobený projektovým potrebám
    Rýchla realizácia a technická podpora
    Riešenia od konceptu až po finálny produkt

Naša vízia
Veríme, že technológie majú zjednodušovať život. Vďaka platforme Arduino a vlastnému hardvéru dokážeme vytvárať flexibilné, cenovo dostupné a škálovateľné riešenia, ktoré rastú spolu s vašimi potrebami – od startupov až po nadnárodné korporácie.

© 2026 Smart Board – Arduino programming and development

TEXT;

// Tvoj Google Gemini API kľúč
$apiKey = 'AIzaSyDowmCzt418z8B7sHIAapITZjZAzf4Sfug';

// Endpoint pre generovanie textu
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . urlencode($apiKey);

// Priprav prompt
$fullPrompt = "Na základe textu stránky Smart Board odpovedz na otázku:\n\n" .
              "Text stránky:\n" . $pageContext . "\n\n" .
              "Otázka: " . $question . "\n\n" .
              "Odpoveď:";

// JSON body pre API
$postData = [
    "contents" => [
        [
            "parts" => [
                ["text" => $fullPrompt]
            ]
        ]
    ]
];

// cURL volanie
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['answer' => 'Chyba pri volaní Gemini API: '.curl_error($ch)]);
    curl_close($ch);
    exit();
}

curl_close($ch);

// Parsovanie odpovede
$json = json_decode($response, true);

// Získanie textu odpovede
$answer = '';
if (isset($json['candidates'][0]['content']['parts'][0]['text'])) {
    $answer = trim($json['candidates'][0]['content']['parts'][0]['text']);
} elseif (isset($json['error']['message'])) {
    $answer = "Gemini API chyba: " . $json['error']['message'];
} else {
    $answer = 'Žiadna odpoveď od Gemini.';
}

echo json_encode(['answer' => $answer]);