<?php

session_start();

if (!isset($_SESSION['udanarejestracja']))
{
    header('Location: index.php');
    exit();
}
else
{
    unset($_SESSION['udanarejestracja']);
}

// Usuwanie zmiennych formularza
unset($_SESSION['fr_nick']);
unset($_SESSION['fr_email']);
unset($_SESSION['fr_haslo1']);
unset($_SESSION['fr_haslo2']);
unset($_SESSION['fr_regulamin']);

// Usuwanie błędów
unset($_SESSION['e_nick']);
unset($_SESSION['e_email']);
unset($_SESSION['e_haslo']);
unset($_SESSION['e_regulamin']);
unset($_SESSION['e_bot']);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rejestracja zakończona</title>

<style>

body{
    margin:0;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 30%,
        #2563eb 60%,
        #60a5fa 100%
    );

    background-size:300% 300%;
    animation:smoothGradient 14s ease infinite;
}

@keyframes smoothGradient{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.container{
    width:500px;
    max-width:90%;
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.25);
}

h1{
    color:#ff6b00;
    margin-bottom:20px;
}

p{
    font-size:18px;
    color:#333;
    line-height:1.6;
}

.login-btn{
    display:inline-block;
    margin-top:25px;
    padding:14px 25px;
    background:#ff6b00;
    color:white;
    text-decoration:none;
    font-weight:bold;
    border-radius:12px;
    transition:0.3s;
}

.login-btn:hover{
    background:#e55d00;
    transform:translateY(-2px);
}

.success-icon{
    font-size:60px;
    margin-bottom:15px;
}

</style>
</head>

<body>

<div class="container">

    <div class="success-icon">✅</div>

    <h1>Rejestracja zakończona!</h1>

    <p>
        Dziękujemy za założenie konta w serwisie
        <strong>Fast Food Order</strong>.
    </p>

    <p>
        Twoje konto zostało utworzone poprawnie.
        Możesz teraz zalogować się i rozpocząć składanie zamówień.
    </p>

    <a href="index.php" class="login-btn">
        Zaloguj się
    </a>

</div>

</body>
</html>