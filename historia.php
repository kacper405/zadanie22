<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fast Food Order - O nas</title>

<style>
body {
    margin: 0;
    min-height: 100vh;
    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 30%,
        #2563eb 60%,
        #60a5fa 100%
    );

    background-size: 300% 300%;
    animation: smoothGradient 14s ease infinite;
}

@keyframes smoothGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* TOPBAR */
.topbar {
    background: #ff6b00;
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.topbar a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

.btn {
    background: #ff6b00;
    padding: 10px 15px;
    border-radius: 10px;
    font-weight: bold;
    color: white;
    text-decoration: none;
}

/* CONTAINER */
.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
}

/* KARTA */
.card {
    background: white;
    width: 800px;
    max-width: 95%;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 15px rgba(0,0,0,0.25);
}

.card h1 {
    text-align: center;
    color: #ff6b00;
    margin-bottom: 20px;
}

.card p {
    line-height: 1.6;
    color: #333;
    font-size: 15px;
}
</style>

</head>

<body>

<div class="topbar">
    <div style="color:white;font-weight:bold;">🍔 Fast Food Order</div>
    <a href="index.php" class="btn">Strona główna</a>
</div>

<div class="wrapper">
    <div class="card">
        <h1>O nas</h1>

        <p>Witaj w Fast Food Order! Jesteśmy zespołem pasjonatów kulinarii, który ma za zadanie dostarczyć Ci najlepszego jedzenia w możliwym czasie.</p>

        <p>Historia firmy Fast Food Order
        <br><br>
        Firma Fast Food Order została założona w 2017 roku przez trójkę przyjaciół z pasją do technologii i gastronomii — Michała Nowaka, Julię Krawiec oraz Damiana Wójcika. Wszystko zaczęło się w małym garażu w Poznaniu, gdzie wspólnie pracowali nad pomysłem stworzenia nowoczesnego systemu zamawiania jedzenia online dla lokalnych restauracji.
        <br><br>
        Na początku ich celem było ułatwienie klientom składania zamówień bez konieczności dzwonienia do restauracji. Pierwsza wersja aplikacji była bardzo prosta — pozwalała jedynie przeglądać menu i zamawiać jedzenie z kilku pobliskich lokali. Mimo skromnych początków projekt szybko zdobył popularność wśród studentów i mieszkańców miasta.
        <br><br>
        W 2018 roku Fast Food Order podpisało pierwsze większe umowy z sieciami burgerowni i pizzerii. Firma zaczęła dynamicznie się rozwijać, zatrudniając programistów, grafików oraz specjalistów od marketingu. W tym samym czasie powstała nowoczesna aplikacja mobilna, dzięki której zamawianie jedzenia stało się jeszcze szybsze i wygodniejsze.
        <br><br>
        Największy przełom nastąpił podczas pandemii w 2020 roku. Wiele restauracji zostało zmuszonych do przejścia na sprzedaż online, a Fast Food Order zaoferowało im tani i łatwy system dostaw oraz zarządzania zamówieniami. Liczba użytkowników wzrosła wtedy ponad pięciokrotnie.
        <br><br>
        Obecnie Fast Food Order działa w wielu krajach Europy i współpracuje z tysiącami restauracji. Firma znana jest z szybkiej dostawy, nowoczesnego designu aplikacji oraz wsparcia dla lokalnych biznesów gastronomicznych. Ich hasło reklamowe brzmi:
        <br><br>
        „Zamawiaj szybciej. Jedz lepiej.”
        <br><br>
        Mimo sukcesu właściciele firmy nadal pamiętają o swoich początkach i regularnie wspierają małe rodzinne restauracje oraz młode startupy technologiczne.</p>

    </div>
</div>

</body>
</html>