<?php 
session_start();

if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true){
    header('Location: gra.php');
    exit();
}  
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fast Food Order - Logowanie</title>

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
}

/* BUTTONY */
.btn {
    background: #d63031;
    color: white;
    padding: 10px 15px;
    border-radius: 10px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.btn-orange {
    background: #ff6b00;
}

.btn-green {
    background: #28a745;
}

/* CONTAINER */
.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    flex-direction: column;
}

/* KARTA LOGOWANIA */
.card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    text-align: center;
}

.card h1 {
    margin-bottom: 10px;
    color: #ff6b00;
}

.card p {
    font-size: 14px;
    color: #333;
}

/* INPUTY */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background: #28a745;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #218838;
}

.register {
    display: inline-block;
    margin-bottom: 15px;
    color: #ff6b00;
    font-weight: bold;
    text-decoration: none;
}

.error {
    color: red;
    margin-top: 10px;
}
</style>

</head>
<body>

<div class="topbar">
    <div style="color:white;font-weight:bold;">🍔 Fast Food Order</div>
    <a href="historia.php" class="btn btn-orange">O nas</a>
</div>

<div class="wrapper">

    <div class="card">
        <h1>Witaj!</h1>
        <p>Zaloguj się, aby zamówić swoje ulubione jedzenie</p>

        <a href="rejestracja.php" class="register">Zarejestruj się</a>

        <form action="zaloguj.php" method="post">
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="haslo" placeholder="Hasło">
            <input type="submit" value="Zaloguj się">
        </form>

        <?php 
            if(isset($_SESSION['blad']))  
                echo "<div class='error'>".$_SESSION['blad']."</div>";
        ?>
    </div>

</div>

</body>
</html>