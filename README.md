<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smart Board | Advanced Future Systems</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
    scroll-behavior:smooth;
}

body{
    background:#060a14;
    color:#e6f0ff;
    overflow-x:hidden;
}

body::before{
    content:"";
    position:fixed;
    inset:0;
    background:
        radial-gradient(circle at 80% 20%, rgba(0,120,255,0.25), transparent 40%),
        radial-gradient(circle at 10% 90%, rgba(0,60,180,0.3), transparent 40%);
    filter:blur(140px);
    z-index:-1;
}

nav{
    position:fixed;
    top:0;
    width:100%;
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(5,10,20,0.7);
    backdrop-filter:blur(20px);
    z-index:1000;
}

nav img{
    height:75px;
    cursor:pointer;
    mix-blend-mode:screen;
    opacity:0.9;
    transition:0.4s;
}

nav img:hover{
    transform:scale(1.05);
    opacity:1;
}

nav ul{
    list-style:none;
    display:flex;
    gap:40px;
}

nav ul li{
    cursor:pointer;
    font-weight:300;
    letter-spacing:1px;
    transition:0.3s;
    opacity:0.8;
}

nav ul li:hover{
    opacity:1;
    color:#4da6ff;
}

.hero{
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding:20px;
}

.hero h1{
    font-size:4rem;
    font-weight:300;
    letter-spacing:4px;
    background:linear-gradient(90deg,#4da6ff,#80d4ff);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero p{
    margin-top:25px;
    font-size:1.3rem;
    max-width:700px;
    opacity:0.85;
}

.section{
    padding:140px 20px 100px;
    max-width:1100px;
    margin:auto;
}

.section h2{
    text-align:center;
    margin-bottom:60px;
    font-weight:300;
    font-size:2.3rem;
    letter-spacing:2px;
    color:#4da6ff;
}

.card{
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(77,166,255,0.3);
    border-radius:20px;
    padding:35px;
    margin-bottom:35px;
    backdrop-filter:blur(15px);
    transition:0.5s;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 30px 80px rgba(0,120,255,0.4);
}

.card strong{
    font-size:1.2rem;
    color:#80d4ff;
}

footer{
    text-align:center;
    padding:40px;
    background:#02050b;
    font-size:0.9rem;
    letter-spacing:1px;
    opacity:0.6;
}

@media(max-width:700px){
    nav{padding:20px;}
    nav img{height:60px;}
    .hero h1{font-size:2.5rem;}
}
</style>
</head>

<body>

<nav>
    <!-- Dajte správnu relatívnu cestu k obrázku v repozitári -->
    <img src="Smart%20Board.png" alt="Smart Board Logo" onclick="scrollToTop()">
    <ul>
        <li onclick="scrollToSection('projekty')">Projekt</li>
        <li onclick="scrollToSection('kanaly')">Kanály</li>
        <li onclick="scrollToSection('komunikacia')">Komunikácia</li>
        <li onclick="scrollToSection('tim')">Tím</li>
    </ul>
</nav>

<section class="hero" id="top">
    <h1>SMART BOARD</h1>
    <p>Precízne navrhnuté Arduino systémy. Technologická elegancia budúcnosti.</p>
</section>

<section id="projekty" class="section">
    <h2>Projekt číslo 1</h2>
    <div class="card">
        <strong>Projekt číslo 1.</strong><br><br>
        Odovzdávam zadanie: Projekt číslo 1.<br><br>
        Názov súboru na odovzdanie:<br>
        <strong>Projekt č.1.zip</strong><br><br>
        ZIP súbor musí obsahovať:<br>
        – kompletný Arduino kód,<br>
        – dokumentáciu projektu,<br>
        – popis zapojenia,<br>
        – všetky potrebné súbory k funkčnosti systému.
    </div>
</section>

<section id="kanaly" class="section">
    <h2>Kanály v Microsoft Teams</h2>
    <div class="card">
        <strong>Otázky ❓</strong><br>
        Slúži na otázky medzi členmi tímu.<br>
        Ak sa pýtate konkrétneho člena, označte ho pomocou @meno.<br>
        Ak je správa pre celý tím, použite @všetci.
    </div>
    <div class="card">
        <strong>Projekt 💻</strong><br>
        Do tohto kanála sa posiela zadanie projektu a všetky oficiálne informácie k nemu.
    </div>
    <div class="card">
        <strong>Komunikácia medzi členmi tímu</strong><br>
        Tento kanál sa používa na bežnú komunikáciu medzi členmi tímu, diskusiu o úlohách, problémoch a návrhoch riešení.
    </div>
    <div class="card">
        <strong>Odovzdanie konečného projektu</strong><br>
        Do tohto kanála sa posiela konečný priečinok projektu vo formáte ZIP, ktorý obsahuje všetky súbory, dokumentáciu a kód.
    </div>
    <div class="card">
        <strong>Dovolenky</strong><br>
        Tu sa zapisujú plánované dovolenky členov tímu, aby mal každý prehľad o neprítomnostiach.
    </div>
</section>

<section id="komunikacia" class="section">
    <h2>Tímová komunikácia – podľa naliehavosti</h2>
    <div class="card">
        Menej súrne otázky: Microsoft Teams
    </div>
    <div class="card">
        Viac súrne otázky: Messenger
    </div>
    <div class="card">
        Súrne a urgentné záležitosti: SMS alebo telefón
    </div>
    <div class="card">
        Ďakujem, že to budeme dodržiavať.
    </div>
</section>

<section id="tim" class="section">
    <h2>Tím – 3 pozície</h2>
    <div class="card">
        <strong>1. Projektový manažér (Project Manager)</strong><br><br>
        plánuje celý projekt (čo sa bude robiť a kedy),<br>
        rozdeľuje úlohy medzi členov,<br>
        kontroluje, či projekt ide podľa plánu,<br>
        komunikuje so zadávateľom,<br>
        rieši problémy v tíme.
    </div>
    <div class="card">
        <strong>2. Hardvérový vývojár (Hardware Developer)</strong><br><br>
        zapája elektronické súčiastky (senzory, motory, LED, atď.),<br>
        navrhuje zapojenie obvodu,<br>
        testuje, či hardvér funguje správne,<br>
        rieši chyby v zapojení.
    </div>
    <div class="card">
        <strong>3. Softvérový vývojár (Software Developer / Programátor)</strong><br><br>
        píše Arduino kód,<br>
        testuje program,<br>
        upravuje kód podľa požiadaviek,<br>
        optimalizuje fungovanie projektu.
    </div>
</section>

<footer>
    &copy; 2026 Smart Board | Advanced Future Arduino Systems
</footer>

<script>
function scrollToSection(id){
    document.getElementById(id).scrollIntoView({behavior:"smooth"});
}
function scrollToTop(){
    document.getElementById("top").scrollIntoView({behavior:"smooth"});
}
</script>

</body>
</html>
