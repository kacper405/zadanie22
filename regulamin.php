<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fast Food Order - Regulamin</title>

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
    color: white;
    font-weight: bold;
}

.btn {
    background: #d63031;
    padding: 10px 15px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-weight: bold;
}

/* WRAPPER */
.wrapper {
    display: flex;
    justify-content: center;
    padding: 40px;
}

/* KARTA */
.card {
    background: white;
    width: 900px;
    max-width: 95%;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 15px rgba(0,0,0,0.25);
}

.card h1 {
    text-align: center;
    color: #ff6b00;
    margin-bottom: 10px;
}

.card h2 {
    color: #1e3a8a;
    margin-top: 25px;
}

.card p, .card li {
    color: #333;
    line-height: 1.6;
}

ol, ul {
    margin-left: 20px;
}
</style>

</head>

<body>

<div class="topbar">
    <div>🍔 Fast Food Order</div>
    <a href="index.php" class="btn">Strona główna</a>
</div>

<div class="wrapper">

<div class="card">

    <h1>Regulamin korzystania z „Fast Food Order”</h1>

    <p><strong>Data wejścia w życie:</strong> 1 stycznia 2026 r.</p>

    <h2>§1. Postanowienia ogólne</h2>
    <ol>
        <li>Niniejszy Regulamin określa zasady korzystania z serwisu internetowego „Fast Food Order”, umożliwiającego składanie zamówień na produkty gastronomiczne oferowane przez współpracujące restauracje.</li>
        <li>Korzystanie z serwisu oznacza akceptację postanowień niniejszego Regulaminu.</li>
        <li>Serwis ma charakter fikcyjny i został stworzony wyłącznie na potrzeby przykładu.</li>
    </ol>

    <h2>§2. Definicje</h2>
    <ol>
        <li><strong>Serwis</strong> – platforma internetowa „Fast Food Order”.</li>
        <li><strong>Użytkownik</strong> – osoba korzystająca z Serwisu.</li>
        <li><strong>Konto</strong> – indywidualny profil Użytkownika utworzony w Serwisie.</li>
        <li><strong>Restauracja</strong> – podmiot oferujący produkty za pośrednictwem Serwisu.</li>
        <li><strong>Zamówienie</strong> – dyspozycja zakupu produktów złożona przez Użytkownika.</li>
    </ol>

    <h2>§3. Rejestracja i konto użytkownika</h2>
    <ol>
        <li>Założenie konta jest dobrowolne.</li>
        <li>Użytkownik zobowiązuje się podawać prawdziwe i aktualne dane.</li>
        <li>Użytkownik ponosi odpowiedzialność za zachowanie poufności danych logowania.</li>
        <li>Zabrania się udostępniania konta osobom trzecim.</li>
    </ol>

    <h2>§4. Składanie zamówień</h2>
    <ol>
        <li>Zamówienia można składać przez 24 godziny na dobę, z zastrzeżeniem dostępności restauracji.</li>
        <li>Przed złożeniem zamówienia Użytkownik otrzymuje informacje o:
            <ul>
                <li>produktach,</li>
                <li>cenach,</li>
                <li>kosztach dostawy,</li>
                <li>przewidywanym czasie realizacji.</li>
            </ul>
        </li>
        <li>Złożenie zamówienia następuje po kliknięciu przycisku „Zamawiam i płacę”.</li>
    </ol>

    <h2>§5. Płatności</h2>
    <ol>
        <li>Serwis może umożliwiać płatności:
            <ul>
                <li>kartą płatniczą,</li>
                <li>przelewem online,</li>
                <li>płatnością przy odbiorze.</li>
            </ul>
        </li>
        <li>Wszystkie ceny wyrażone są w złotych polskich (PLN).</li>
    </ol>

    <h2>§6. Dostawa</h2>
    <ol>
        <li>Dostawa realizowana jest pod adres wskazany przez Użytkownika.</li>
        <li>Czas dostawy ma charakter orientacyjny.</li>
    </ol>

    <h2>§7. Reklamacje</h2>
    <ol>
        <li>Reklamacje można zgłaszać w terminie 7 dni od dostawy.</li>
        <li>Rozpatrywane są w ciągu 14 dni roboczych.</li>
    </ol>

    <h2>§8. Zasady korzystania</h2>
    <ol>
        <li>Użytkownik zobowiązuje się do korzystania zgodnie z prawem.</li>
        <li>Zabrania się działań szkodliwych dla systemu.</li>
    </ol>

    <h2>§9. Ochrona danych</h2>
    <ol>
        <li>Dane są przetwarzane wyłącznie w celu realizacji zamówień.</li>
    </ol>

    <h2>§10–12</h2>
    <p>Pełne zasady odpowiedzialności, zmian regulaminu oraz postanowień końcowych pozostają zgodne z oryginałem.</p>

</div>

</div>

</body>
</html>