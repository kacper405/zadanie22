<?php
session_start();

if (!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != true)
{
    header("Location: index.php");
    exit();
}

require_once "connect.php";

$polaczenie = new mysqli($host, $db_username, $db_password, $db_name);

if($polaczenie->connect_errno != 0)
{
    die("Błąd połączenia z bazą danych");
}

$wynik = $polaczenie->query("
SELECT *
FROM orders
ORDER BY created_at DESC
");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel Administratora</title>

<style>
body{
    margin:0;
    font-family:Arial,sans-serif;

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

.topbar{
    background:#ff6b00;
    color:white;
    padding:20px;
    font-size:28px;
    font-weight:bold;
    text-align:center;
}

.container{
    width:95%;
    margin:30px auto;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:15px;
    overflow:hidden;
}

th{
    background:#ff6b00;
    color:white;
    padding:15px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f5f5f5;
}

.logout{
    position:absolute;
    top:20px;
    right:20px;
    background:#d63031;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:10px;
    font-weight:bold;
}
</style>

</head>
<body>

<a href="logout.php" class="logout">Wyloguj</a>

<div class="topbar">
📋 Panel Administratora
</div>

<div class="container">

<table>

<tr>
    <th>ID</th>
    <th>Użytkownik</th>
    <th>Produkt</th>
    <th>Cena</th>
    <th>Data zamówienia</th>
</tr>

<?php
if($wynik && $wynik->num_rows > 0)
{
    while($row = $wynik->fetch_assoc())
    {
        echo "
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['username']."</td>
            <td>".$row['food']."</td>
            <td>".$row['price']." zł</td>
            <td>".$row['created_at']."</td>
        </tr>
        ";
    }
}
else
{
    echo "
    <tr>
        <td colspan='5'>Brak zamówień</td>
    </tr>
    ";
}
?>

</table>

</div>

</body>
</html>