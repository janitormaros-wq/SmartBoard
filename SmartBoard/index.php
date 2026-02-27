<?php
session_start();

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Spracovanie prihlasenia
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeePassword'])) {
    $password = $_POST['employeePassword'];

    if ($password === "5dT;6EV7") {
        $_SESSION['employeeLoggedIn'] = true;
        header("Location: zamestnanciM.php");
        exit();
    } elseif ($password === "G8e78+-)") {
        $_SESSION['employeeLoggedIn'] = true;
        header("Location: zamestnanciS.php");
        exit();
    } elseif ($password === "j96L\+D4") {
        $_SESSION['employeeLoggedIn'] = true;
        header("Location: zamestnanciMA.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Nesprávne heslo!";
        header("Location: index.php");
        exit();
    }
}

// Zobrazenie flash chybového hlásenia
$error = '';
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

// Zabráni cachovaniu stránky
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smart Board</title>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Source Sans Pro',sans-serif;scroll-behavior:smooth;}
body{background:#f0f4ff;color:#0a1f44;line-height:1.7;}

/* HEADER */
header{
position:fixed;width:100%;top:0;z-index:1000;
background:rgba(255,255,255,0.95);
backdrop-filter:blur(10px);
box-shadow:0 8px 25px rgba(0,0,0,0.08);
transition:0.3s;
}
.navbar{max-width:1200px;margin:auto;display:flex;justify-content:space-between;align-items:center;padding:15px 25px;}
.navbar img{height:55px;cursor:pointer;transition:0.3s;}
.navbar img:hover{transform:scale(1.05);}
.navbar ul{list-style:none;display:flex;gap:30px;}
.navbar ul li{font-weight:600;cursor:pointer;position:relative;transition:0.3s;}
.navbar ul li::after{
content:'';position:absolute;bottom:-5px;left:0;width:0;height:2px;
background:#1b4bff;transition:0.3s;
}
.navbar ul li:hover::after{width:100%;}

/* HERO */
.hero{
min-height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;
padding:0 20px;
background:linear-gradient(135deg,#ffffff,#add8e6);
color:#00008b;
overflow:hidden;
}
.hero h1{
font-size:3rem;margin-bottom:20px;
background: linear-gradient(90deg,#1b4bff,#00008b);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
animation:fadeDown 1s ease;
}
.hero p{
max-width:900px;font-size:1.2rem;opacity:0.95;
animation:fadeUp 1.2s ease;
margin-bottom:30px;
}

/* SECTION */
.section{
max-width:1100px;margin:100px auto;padding:70px 30px;
background:white;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,0.05);
opacity:0;transform:translateY(40px);
transition:all 0.8s ease;
}
.section.visible{opacity:1;transform:translateY(0);}
.section h2{text-align:center;font-size:2.4rem;margin-bottom:30px;color:#1b4bff;animation:fadeDown 1s ease;}
.card{margin-top:20px;transition:0.3s;cursor:pointer;}
.card:hover{transform:scale(1.03);box-shadow:0 25px 60px rgba(0,0,0,0.12);}
.card h3{color:#0000ff;margin-bottom:10px;}
.card p{margin-bottom:12px;}
.card ul{list-style:none;}
.card ul li{margin:15px 0;padding-left:30px;position:relative;}
.card ul li::before{content:"✔";position:absolute;left:0;color:#0000ff;font-weight:bold;}

/* FOOTER 
footer{text-align:center;padding:50px;background:#0a1f44;color:white;margin-top:60px;}

/* BUTTON */
button{
background:#1b4bff;color:white;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;transition:0.3s;}
button:hover{background:#00008b;transform:translateY(-3px);}

/* MODAL */
.modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.6);justify-content:center;align-items:center;z-index:2000;animation:fadeIn 0.4s ease;}
.modal-content{background:white;padding:40px;border-radius:15px;width:90%;max-width:480px;animation:slideUp 0.4s ease;position:relative;}
.close{position:absolute;right:20px;top:15px;font-size:28px;cursor:pointer;color:#00008b;}
.close:hover{color:#1b4bff;}
input{width:100%;padding:15px;margin-bottom:20px;border-radius:10px;border:1px solid #1b4bff;font-size:1rem;transition:0.3s;}
input:focus{border-color:#00008b;box-shadow:0 0 15px rgba(27,75,255,0.3);}
.error-message{color:red;text-align:center;margin-top:10px;font-weight:600;}

/* FOOTER - hviezdna noc s 40 hviezdami, postupne sa rozsvietia */
footer {
  position: relative;
  text-align: center;
  padding: 60px 20px;
  background: linear-gradient(to top, #0a1f44 0%, #000010 100%);
  color: #ffffff;
  font-weight: 500;
  overflow: hidden;
  border-top: 2px solid #1b4bff;
}

/* Hviezdy */
.stars span {
  position: absolute;
  display: block;
  width: 3px;
  height: 3px;
  background: white;
  border-radius: 50%;
  opacity: 0; /* začnú neviditeľné */
  animation: shine 1s forwards;
}

/* Rozmiestnenie hviezd a delay */
.stars span:nth-child(1)  { top: 5%; left: 10%; animation-delay: 0s; }
.stars span:nth-child(2)  { top: 15%; left: 20%; animation-delay: 0.3s; }
.stars span:nth-child(3)  { top: 25%; left: 35%; animation-delay: 0.6s; }
.stars span:nth-child(4)  { top: 10%; left: 50%; animation-delay: 0.9s; }
.stars span:nth-child(5)  { top: 40%; left: 60%; animation-delay: 1.2s; }
.stars span:nth-child(6)  { top: 55%; left: 15%; animation-delay: 1.5s; }
.stars span:nth-child(7)  { top: 65%; left: 40%; animation-delay: 1.8s; }
.stars span:nth-child(8)  { top: 75%; left: 70%; animation-delay: 2.1s; }
.stars span:nth-child(9)  { top: 85%; left: 50%; animation-delay: 2.4s; }
.stars span:nth-child(10) { top: 30%; left: 80%; animation-delay: 2.7s; }
.stars span:nth-child(11) { top: 50%; left: 90%; animation-delay: 3s; }
.stars span:nth-child(12) { top: 60%; left: 65%; animation-delay: 3.3s; }
.stars span:nth-child(13) { top: 70%; left: 25%; animation-delay: 3.6s; }
.stars span:nth-child(14) { top: 20%; left: 75%; animation-delay: 3.9s; }
.stars span:nth-child(15) { top: 45%; left: 30%; animation-delay: 4.2s; }
.stars span:nth-child(16) { top: 80%; left: 15%; animation-delay: 4.5s; }
.stars span:nth-child(17) { top: 90%; left: 40%; animation-delay: 4.8s; }
.stars span:nth-child(18) { top: 5%; left: 80%; animation-delay: 5.1s; }
.stars span:nth-child(19) { top: 25%; left: 10%; animation-delay: 5.4s; }
.stars span:nth-child(20) { top: 35%; left: 55%; animation-delay: 5.7s; }

/* Nové hviezdy: 21-40 */
.stars span:nth-child(21) { top: 15%; left: 5%;  animation-delay: 6s; }
.stars span:nth-child(22) { top: 30%; left: 25%; animation-delay: 6.3s; }
.stars span:nth-child(23) { top: 50%; left: 10%; animation-delay: 6.6s; }
.stars span:nth-child(24) { top: 60%; left: 80%; animation-delay: 6.9s; }
.stars span:nth-child(25) { top: 70%; left: 55%; animation-delay: 7.2s; }
.stars span:nth-child(26) { top: 20%; left: 50%; animation-delay: 7.5s; }
.stars span:nth-child(27) { top: 40%; left: 85%; animation-delay: 7.8s; }
.stars span:nth-child(28) { top: 10%; left: 65%; animation-delay: 8.1s; }
.stars span:nth-child(29) { top: 35%; left: 20%; animation-delay: 8.4s; }
.stars span:nth-child(30) { top: 55%; left: 35%; animation-delay: 8.7s; }
.stars span:nth-child(31) { top: 25%; left: 60%; animation-delay: 9s; }
.stars span:nth-child(32) { top: 65%; left: 75%; animation-delay: 9.3s; }
.stars span:nth-child(33) { top: 85%; left: 20%; animation-delay: 9.6s; }
.stars span:nth-child(34) { top: 75%; left: 45%; animation-delay: 9.9s; }
.stars span:nth-child(35) { top: 50%; left: 25%; animation-delay: 10.2s; }
.stars span:nth-child(36) { top: 60%; left: 5%; animation-delay: 10.5s; }
.stars span:nth-child(37) { top: 15%; left: 90%; animation-delay: 10.8s; }
.stars span:nth-child(38) { top: 35%; left: 70%; animation-delay: 11.1s; }
.stars span:nth-child(39) { top: 80%; left: 60%; animation-delay: 11.4s; }
.stars span:nth-child(40) { top: 90%; left: 85%; animation-delay: 11.7s; }

/* Animácia rozsvietenia hviezdy */
@keyframes shine {
  to { opacity: 1; }
}

/* Footer text nad hviezdami */
footer p {
  position: relative;
  z-index: 2;
  font-size: 1rem;
  color: #f0f0ff;
}
/* LOGIN MODAL SPECIFIC */
.employee-card{display:flex;flex-direction:column;align-items:center;}
.employee-card h2{margin-bottom:20px;font-size:1.8rem;}
.employee-card button{width:100%;padding:14px;font-size:1.1rem;}

/* CHAT */
.chat-card{background:#f9f9ff;max-width:480px;width:90%;padding:20px 25px;border-radius:15px;box-shadow:0 20px 50px rgba(0,0,0,0.3);display:flex;flex-direction:column;height:500px;}
.chat-card h2{text-align:center;color:#0000ff;margin-bottom:15px;font-size:1.5rem;}
.chat-box{flex:1;overflow-y:auto;padding:10px;border:1px solid #0000ff;border-radius:10px;background:#fff;margin-bottom:15px;display:flex;flex-direction:column;}
.chat-box p{max-width:80%;margin:8px 0;padding:10px 15px;border-radius:15px;word-wrap:break-word;animation:messageAppear 0.3s ease;}
.chat-box .user{background:#0000ff;color:#fff;align-self:flex-end;}
.chat-box .bot{background:#e0f0ff;color:#00008b;align-self:flex-start;}
.typing{font-style:italic;opacity:0.7;animation:blink 1s infinite;}
.chat-input-container{display:flex;gap:10px;}
.chat-input-container input{flex:1;padding:12px 15px;border-radius:12px;border:1px solid #0000ff;font-size:1rem;}
.chat-input-container button{padding:12px 20px;border:none;border-radius:12px;background:#1b4bff;color:#fff;font-weight:600;cursor:pointer;transition:0.3s;}
.chat-input-container button:hover{background:#00008b;}

/* ANIMATIONS */
@keyframes fadeDown{from{opacity:0;transform:translateY(-30px);}to{opacity:1;transform:translateY(0);}}
@keyframes fadeUp{from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);}}
@keyframes slideUp{from{transform:translateY(40px);opacity:0;}to{transform:translateY(0);opacity:1;}}
@keyframes fadeIn{from{opacity:0;}to{opacity:1;}}
@keyframes messageAppear{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
@keyframes blink{0%{opacity:0.3;}50%{opacity:1;}100%{opacity:0.3;}}

@media(max-width:768px){
.hero h1{font-size:2rem;}
.hero p{font-size:1rem;}
.navbar ul{flex-direction:column;gap:15px;}
}
</style>
</head>
<body>

<header>
<div class="navbar">
<img src="Smart Board.png" onclick="scrollToSection('hero')">
<ul>
<li onclick="scrollToSection('hero')">Úvod</li>
<li onclick="scrollToSection('projekty')">Projekty</li>
<li onclick="scrollToSection('co-ponukame')">Čo ponúkame</li>
<li onclick="scrollToSection('spolupraca')">Spolupráca</li>
<li onclick="scrollToSection('preco')">Prečo Smart Board</li>
<li onclick="scrollToSection('vizia')">Vízia</li>
<li onclick="openLoginModal()">Zamestnanec</li>
<li onclick="openChatModal()">AI Chat</li>
</ul>
</div>
</header>

<section class="hero" id="hero">
<h1>Smart Board – programovanie a vývoj projektov s Arduino</h1>
<p>Smart Board je moderná technologická firma zameraná na vývoj a realizáciu projektov postavených na platforme Arduino. Prinášame inteligentné riešenia pre domácnosti, školy, startupy aj priemyselné prevádzky. Našim cieľom je prepájať inovácie s praktickým využitím a premieňať nápady na funkčné zariadenia.</p>
</section>

<section class="section" id="projekty">
<h2>Projekty</h2>
<div class="card">
<h3>Projekt číslo 1 – Inteligentné riadenie LED osvetlenia pomocou Arduino</h3>
<p>Tento projekt bol zameraný na návrh a implementáciu inteligentného systému riadenia LED osvetlenia s využitím mikrokontroléra Arduino.</p>
<p>Projekt bol úspešne otestovaný a odovzdaný v súlade s internými pravidlami.</p>
</div>
</section>

<section class="section" id="co-ponukame">
<h2>Čo ponúkame</h2>
<div class="card">
<ul>
<li>Vývoj prototypov – od prvotného návrhu až po plne funkčný model</li>
<li>Automatizácia a smart riešenia – inteligentné riadenie osvetlenia, kúrenia, zavlažovania či bezpečnostných systémov</li>
<li>IoT projekty – prepojenie zariadení do siete a vzdialené ovládanie</li>
<li>Programovanie a optimalizácia kódu – efektívne a spoľahlivé riešenia</li>
<li>Vzdelávacie projekty a workshopy – praktická výučba práce s Arduino technológiou</li>
<li>Vlastný hardvér – navrhujeme a vyrábame špeciálne hardvérové moduly, ktoré dopĺňajú naše Arduino projekty a umožňujú riešenia na mieru</li>
</ul>
</div>
</section>

<section class="section" id="spolupraca">
<h2>Spolupracujeme s lídrami trhu</h2>
<div class="card">
Naše projekty realizujeme pre najväčšie firmy sveta. Podieľame sa na vývoji inovatívnych riešení pre globálne spoločnosti, kde je dôraz na kvalitu, spoľahlivosť a technologickú precíznosť absolútnou prioritou.<br><br>
Smart Board je partnerom pre firmy, ktoré hľadajú profesionálny prístup, diskrétnosť a technickú dokonalosť pri vývoji hardvérových a IoT riešení.
</div>
</section>

<section class="section" id="preco">
<h2>Prečo Smart Board?</h2>
<div class="card">
<ul>
<li>Individuálny prístup ku každému projektu</li>
<li>Moderné technológie a overené postupy</li>
<li>Skúsenosti s realizáciou projektov pre globálne spoločnosti</li>
<li>Vlastný hardvér prispôsobený projektovým potrebám</li>
<li>Rýchla realizácia a technická podpora</li>
<li>Riešenia od konceptu až po finálny produkt</li>
</ul>
</div>
</section>

<section class="section" id="vizia">
<h2>Naša vízia</h2>
<div class="card">
Veríme, že technológie majú zjednodušovať život. Vďaka platforme Arduino a vlastnému hardvéru dokážeme vytvárať flexibilné, cenovo dostupné a škálovateľné riešenia, ktoré rastú spolu s vašimi potrebami – od startupov až po nadnárodné korporácie.
</div>
</section>
<footer>
  <div class="stars">
    <!-- 40 span elementov -->
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>
  <p>© 2026 Smart Board – Arduino programming and development</p>
</footer>

<!-- LOGIN MODAL -->
<div id="loginModal" class="modal">
<div class="modal-content employee-card">
<span class="close" onclick="closeLoginModal()">&times;</span>
<h2>Prihlásenie zamestnanca</h2>
<form method="POST">
<input type="password" name="employeePassword" placeholder="Zadajte heslo" required autofocus>
<button type="submit">Prihlásiť</button>
</form>
<?php if($error!=''): ?>
<p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>
</div>
</div>

<!-- CHAT MODAL -->
<div id="chatModal" class="modal">
<div class="modal-content chat-card">
<span class="close" onclick="closeChatModal()">&times;</span>
<h2>Smart Board AI Chat</h2>
<div id="chatBox" class="chat-box"></div>
<div class="chat-input-container">
<input type="text" id="userMessage" placeholder="Napíšte svoju otázku..." autocomplete="off">
<button onclick="sendMessage()">Odoslať</button>
</div>
</div>
</div>

<script>
function scrollToSection(id){document.getElementById(id).scrollIntoView({behavior:'smooth'});}
function openLoginModal(){document.getElementById('loginModal').style.display='flex';}
function closeLoginModal(){document.getElementById('loginModal').style.display='none';}
function openChatModal(){document.getElementById('chatModal').style.display='flex';document.getElementById('userMessage').focus();}
function closeChatModal(){document.getElementById('chatModal').style.display='none';}

window.onclick=function(e){
const login=document.getElementById('loginModal');
const chat=document.getElementById('chatModal');
if(e.target===login)login.style.display='none';
if(e.target===chat)chat.style.display='none';
}

window.onload=function(){
<?php if($error!=''): ?>openLoginModal();<?php endif; ?>
const sections=document.querySelectorAll('.section');
const observer=new IntersectionObserver(entries=>{
entries.forEach(entry=>{
if(entry.isIntersecting){entry.target.classList.add('visible');}
});
},{threshold:0.2});
sections.forEach(section=>observer.observe(section));
};

document.getElementById("userMessage").addEventListener("keydown",function(e){
if(e.key==="Enter"){e.preventDefault();sendMessage();}
});

async function sendMessage(){
const input=document.getElementById('userMessage');
const message=input.value.trim();
if(!message)return;

const chatBox=document.getElementById('chatBox');

const userMsg=document.createElement('p');
userMsg.className='user';
userMsg.textContent=message;
chatBox.appendChild(userMsg);
chatBox.scrollTop=chatBox.scrollHeight;
input.value='';

const botMsg=document.createElement('p');
botMsg.className='bot typing';
botMsg.textContent='AI premýšľa...';
chatBox.appendChild(botMsg);

try{
const response=await fetch('gemini_chat.php',{
method:'POST',
headers:{'Content-Type':'application/json'},
body:JSON.stringify({question:message})
});
const data=await response.json();
botMsg.classList.remove("typing");
botMsg.textContent=data.answer;
chatBox.scrollTop=chatBox.scrollHeight;
}catch(err){
botMsg.textContent="Chyba pri komunikácii s AI.";
}
}
</script>
</body>
</html>