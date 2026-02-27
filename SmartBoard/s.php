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

Logo

    Doposiaľ odovzdané projekty
    Vzorové zadania
    Aktuálne zadanie
    Kanály
    Otázky a nejasnosti
    Úlohy práce
    Pracovný postup
    Konečný priečinok
    Plánovanie schôdzok
    Absencia
    Problémy a chyby
    AI Chat ✨

VITAJ SPÄŤ, Šimon
Projektový manažér (Project Manager)
Rýchle odkazy

    📄 Microsoft World
    💬 Messenger
    👥 Microsoft Teams

Vitaj na zamestnaneckej stránke

Máš tu prístup k všetkým interným informáciám a projektom.

Nestrať svoje heslo! Prístup k tejto stránke máš iba ty a majiteľ firmy.
Doposiaľ odovzdané projekty
Projekt číslo 1 – Inteligentné riadenie LED osvetlenia pomocou Arduino

Tento projekt bol zameraný na návrh a implementáciu inteligentného systému riadenia LED osvetlenia s využitím mikrokontroléra Arduino.

Projekt obsahuje kompletný zdrojový kód, technickú dokumentáciu, schému zapojenia, grafické znázornenie zapojenia a video ukážku funkčnosti.

Obsah projektu:
Stiahnuť kód (.ino)
Stiahnuť technickú schému (.png)
Stiahnuť grafické zapojenie (.png)
Stiahnuť video ukážku (.mp4)

Projekt bol úspešne otestovaný a odovzdaný v súlade s internými pravidlami.
Vzorové zadania

Tu máš k dispozícii šablónu zadania, ktorú používame pre nové projekty. Podľa tejto šablóny budeš vytvárať všetky zadania:
📄 Stiahnuť šablónu zadania (.docx)

Pre lepšiu predstavu si môžeš pozrieť príklad zadania:
📝 Stiahnuť príklad zadania (.docx)
Zadanie
Informácia k novému zadaniu:

Zadanie bude poslané až po zaškoľovacej schôdzi, ktorá sa uskutoční v piatok 27.2. 2026.
Kanály v Microsoft Teams
Spätná väzba ↔️
Tento kanál slúži na navrhovanie vylepšení pre firmu Smart Board a zdieľanie podnetov na zlepšenie fungovania.
Projekt 💻 – zadanie
Tento kanál slúži na zverejňovanie oficiálneho zadania, požiadaviek a termínov projektu.
Komunikácia medzi členmi tímu 🤙
Tento kanál slúži na bežnú pracovnú komunikáciu a koordináciu počas vývoja projektu.
Odovzdanie konečného projektu 📁
Tento kanál slúži na odovzdanie finálnej verzie projektu so všetkými požadovanými súbormi.
Neprítomnosť 📅
Tento kanál slúži na evidenciu plánovaných neprítomností členov tímu.
Otázky a nejasnosti

Pri akýchkoľvek otázkach alebo nejasnostiach sa používa nasledujúci postup:

    Napísať do skupiny Smart Board na Messenger.
    Alebo do hlavnej sekcie Smart Board v Microsoft Teams.
    V urgentných prípadoch telefonicky alebo SMS.


Pri každej otázke je povinné označiť konkrétnu osobu alebo všetkých účastníkov pomocou @meno alebo @vsetci.

Rýchle odkazy:
Skupina Messenger
Microsoft Teams
Úlohy práce
• Plánuj a organizuj celý projekt, vytváraj harmonogram a určuj priority

• Vedenie a plánovanie pravidelných schôdzok tímu

• Priraďuj úlohy členom tímu a sleduj ich plnenie

• Kontroluj priebeh projektu, aby všetko išlo podľa plánu a špecifikácií

• Koordinuj komunikáciu medzi členmi tímu

• Dokumentuj priebeh projektu, zapisuj rozhodnutia a sleduj zmeny

• Motivuj tím a podporuj riešenie problémov

• Identifikuj riziká projektu a navrhuj riešenia na ich minimalizáciu

• Sleduj dodržiavanie rozpočtu a efektívne využívanie zdrojov

• Priprav projekt na finálne odovzdanie a zhodnoť výsledky

Postup práce na projekte

    Prebehla úvodná schôdzka a rozdelili sa úlohy.
    Hardvérový vývojár navrhol obvod v prostredí Tkinter.
    Softvérový vývojár naprogramoval kód v prostredí Arduino IDE.
    Hardvérový vývojár vytvoril reálne zapojenie a grafickú schému obvodu.
    Softvérový vývojár otestoval kód v prostredí Tkinter.
    Bol odovzdaný finálny priečinok s projektom.

Konečný priečinok

Konečný priečinok projektu mustí obsahovať:

    Schému zapojenia obvodu.
    Zdrojový kód pre Arduino v prostredí Arduino IDE.
    Grafickú schému obvodu.
    Video ukážku funkčného projektu.


Ukážka, ako by mal vyzerať konečný priečinok:

Projekt č.[čislo projektu]
 ├─ Projekt č.[čislo projektu] - Schéma zapojenia.PNG
 ├─ Projekt č.[čislo projektu] - Kód.INO
 ├─ Projekt č.[čislo projektu] - Schéma graficky.PNG
 └─ Projekt č.[čislo projektu] - Video Ukážka.MP4
        


Dôležité doplnky:

Priečinok sa odovzdáva vždy vo formáte ZIP.

Priečinok odovzdáva softvérový vývojár po skontrolovaní a overení funkčnosti všetkých častí.
Plánovanie schôdzok

Schôdzka tímu sa koná vždy po odovzdaní projektu.

Na tejto schôdzke sa dohodneme aj o novom projekte a ďalších úlohách.

Schôdzku zadáva projektový manažér.

Ak niekto chce naplánovať vlastnú schôdzku, musí o tom informovať projektového manažéra cez skupinu Messenger s názvom „Smart Board“ a napísať správu vo formáte:

    „Môžem naplánovať schôdzku o [téma schôdzky] dňa [čas a dátum]?“ 


Projektový manažér následne potvrdí alebo upraví termín schôdzky.
Absencia

Ak zamestnanec nezadá požadované podklady alebo nevykoná zadanú úlohu po dobu 2 dní, musí sa na 3. deň automaticky očakávať jeho vyjadrenie. Ak sa do tejto doby neozve a neinformuje tím, považuje sa to za porušenie pracovnej disciplíny a vedie k automatickému ukončeniu jeho pozície vo firme.

Všetky neprítomnosti, neaktívnosť alebo oneskorenia v práci je povinné oznámiť do komunity v Microsoft Teams s názvom „Neprítomnosť“.
Upozornenie o komunikácii a termínoch

Napríklad takáto situácia: Dohodli sme sa, že projekt bude odoslaný do 17:00. Ak zamestnanec projekt neodošle a neinformuje tím o dôvode do 2 dní, na 3. deň je automaticky vylúčený z pozície.
Problémy a chyby

Pri akýchkoľvek problémoch so stránkou, platformou Microsoft Teams alebo s čímkoľvek ohľadom projektu, ako aj pri nájdení akýchkoľvek chýb, ma prosím okamžite kontaktujte emailom:

📧 E-mail: janitormaros@gmail.com
© 2026 Smart Board. Všetky práva vyhradené.

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