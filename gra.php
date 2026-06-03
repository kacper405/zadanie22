<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

require_once "connect.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add']))
{
    $food = $_POST['food'];
    $user = $_SESSION['user'];

    $_SESSION['cart'][] = $food;

    $prices = [
        "Cheeseburger" => 18,
        "Frytki" => 10,
        "Cola" => 7,
        "Burger BBQ" => 22,
        "Burger Chicken" => 21,
        "Burger Veggie" => 19,

        "Margherita" => 25,
        "Pepperoni" => 30,
        "Hawajska" => 29,
        "4 Sery" => 32,
        "Capricciosa" => 33,
        "Diavola" => 34,

        "Kebab w bułce" => 20,
        "Kebab w tortilli" => 22,
        "Frytki z kebabem" => 25,
        "Kebab BBQ" => 24,
        "Mega Kebab" => 27,
        "Falafel" => 18,

        "Kurczak crispy" => 19,
        "Nuggetsy" => 15,
        "Stripsy" => 17,
        "Hot Wings" => 20,
        "Bucket Mix" => 35,
        "Chicken Burger XL" => 23,

        "Sushi mix" => 35,
        "Ramen" => 28,
        "Tempura" => 32,
        "Sashimi" => 38,
        "Udon" => 27,
        "California Roll" => 33,

        "Hot dog klasyczny" => 12,
        "Hot dog XXL" => 16,
        "Hot dog z serem" => 14,
        "Cheese Dog" => 15,
        "Bacon Dog" => 17,
        "Chili Dog" => 18
    ];

    $price = $prices[$food];

    $polaczenie = new mysqli($host, $db_username, $db_password, $db_name);

    $stmt = $polaczenie->prepare(
        "INSERT INTO orders(username, food, price)
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("ssi", $user, $food, $price);
    $stmt->execute();

    $stmt->close();
    $polaczenie->close();
}

$cartCount = count($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fast Food Order</title>

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

/* Płynna animacja tła */
@keyframes smoothGradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}


.topbar{
    background:#ff6b00;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logout{
    color:white;
    text-decoration:none;
    font-weight:bold;
    font-size:20px;
    background:#d63031;
    padding:10px 15px;
    border-radius:10px;
}

.cart{
    background:white;
    color:#ff6b00;
    padding:10px 15px;
    border-radius:10px;
    font-weight:bold;
}

.userinfo{
    padding:20px;
}

.container{
    display:flex;
    justify-content:center;
    gap:30px;
    margin:30px;
}

.restaurant{
    width:400px;
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

.restaurant h2{
    margin:0;
    padding:15px;
    text-align:center;
    background:#ff6b00;
    color:white;
}

.menu-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px;
    border-bottom:1px solid #ddd;
}

button{
    background:#28a745;
    color:white;
    border:none;
    padding:8px 12px;
    border-radius:8px;
    cursor:pointer;
}
.restaurant {
    width: 400px;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    max-height: 420px;
}

/* scroll w menu */
.menu-list {
    overflow-y: auto;
    max-height: 340px;
}

/* opcjonalnie ładny scrollbar */
.menu-list::-webkit-scrollbar {
    width: 6px;
}

.menu-list::-webkit-scrollbar-thumb {
    background: #ff6b00;
    border-radius: 10px;
}
</style>

</head>
<body>

<div class="topbar">
    <a href="logout.php" class="logout">WYLOGUJ SIĘ</a>

    <div class="cart">
    <a href="koszyk.php" style="text-decoration:none; color:#ff6b00;">
        🛒 Koszyk: <?php echo $cartCount; ?>
    </a>
</div>
</div>

<div class="userinfo">
<?php

echo "<h2>Witaj ".$_SESSION['user']."!</h2>";


?>
</div>

<div class="container">

<!-- 🍔 BURGER HOUSE -->
<div class="restaurant">
    <h2>🍔 Burger House</h2>

    <div class="menu-list">

        <div class="menu-item">Cheeseburger - 18 zł
            <form method="post">
                <input type="hidden" name="food" value="Cheeseburger">
                <button type="submit" name="add">Dodaj</button>
            </form>
        </div>

        <div class="menu-item">Frytki - 10 zł
            <form method="post">
                <input type="hidden" name="food" value="Frytki">
                <button type="submit" name="add">Dodaj</button>
            </form>
        </div>

        <div class="menu-item">Cola - 7 zł
            <form method="post">
                <input type="hidden" name="food" value="Cola">
                <button type="submit" name="add">Dodaj</button>
            </form>
        </div>

        <div class="menu-item">Burger BBQ - 22 zł
            <form method="post"><input type="hidden" name="food" value="Burger BBQ"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Burger Chicken - 21 zł
            <form method="post"><input type="hidden" name="food" value="Burger Chicken"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Burger Veggie - 19 zł
            <form method="post"><input type="hidden" name="food" value="Burger Veggie"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

<!-- 🍕 PIZZA KING -->
<div class="restaurant">
    <h2>🍕 Pizza King</h2>

    <div class="menu-list">

        <div class="menu-item">Margherita - 25 zł
            <form method="post"><input type="hidden" name="food" value="Margherita"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Pepperoni - 30 zł
            <form method="post"><input type="hidden" name="food" value="Pepperoni"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Hawajska - 29 zł
            <form method="post"><input type="hidden" name="food" value="Hawajska"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">4 Sery - 32 zł
            <form method="post"><input type="hidden" name="food" value="4 Sery"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Capricciosa - 33 zł
            <form method="post"><input type="hidden" name="food" value="Capricciosa"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Diavola - 34 zł
            <form method="post"><input type="hidden" name="food" value="Diavola"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

<!-- 🌯 KEBAB -->
<div class="restaurant">
    <h2>🌯 Kebab Express</h2>

    <div class="menu-list">

        <div class="menu-item">Kebab w bułce - 20 zł
            <form method="post"><input type="hidden" name="food" value="Kebab w bułce"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Kebab w tortilli - 22 zł
            <form method="post"><input type="hidden" name="food" value="Kebab w tortilli"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Frytki z kebabem - 25 zł
            <form method="post"><input type="hidden" name="food" value="Frytki z kebabem"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Kebab BBQ - 24 zł
            <form method="post"><input type="hidden" name="food" value="Kebab BBQ"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Mega Kebab - 27 zł
            <form method="post"><input type="hidden" name="food" value="Mega Kebab"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Falafel - 18 zł
            <form method="post"><input type="hidden" name="food" value="Falafel"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

<!-- 🍗 CHICKEN -->
<div class="restaurant">
    <h2>🍗 Chicken Spot</h2>

    <div class="menu-list">

        <div class="menu-item">Kurczak crispy - 19 zł
            <form method="post"><input type="hidden" name="food" value="Kurczak crispy"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Nuggetsy - 15 zł
            <form method="post"><input type="hidden" name="food" value="Nuggetsy"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Stripsy - 17 zł
            <form method="post"><input type="hidden" name="food" value="Stripsy"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Hot Wings - 20 zł
            <form method="post"><input type="hidden" name="food" value="Hot Wings"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Bucket Mix - 35 zł
            <form method="post"><input type="hidden" name="food" value="Bucket Mix"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Chicken Burger XL - 23 zł
            <form method="post"><input type="hidden" name="food" value="Chicken Burger XL"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

<!-- 🍣 SUSHI -->
<div class="restaurant">
    <h2>🍣 Sushi Bar</h2>

    <div class="menu-list">

        <div class="menu-item">Sushi mix - 35 zł
            <form method="post"><input type="hidden" name="food" value="Sushi mix"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Ramen - 28 zł
            <form method="post"><input type="hidden" name="food" value="Ramen"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Tempura - 32 zł
            <form method="post"><input type="hidden" name="food" value="Tempura"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Sashimi - 38 zł
            <form method="post"><input type="hidden" name="food" value="Sashimi"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Udon - 27 zł
            <form method="post"><input type="hidden" name="food" value="Udon"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">California Roll - 33 zł
            <form method="post"><input type="hidden" name="food" value="California Roll"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

<!-- 🌭 HOT DOG -->
<div class="restaurant">
    <h2>🌭 Hot Dog Zone</h2>

    <div class="menu-list">

        <div class="menu-item">Hot dog klasyczny - 12 zł
            <form method="post"><input type="hidden" name="food" value="Hot dog klasyczny"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Hot dog XXL - 16 zł
            <form method="post"><input type="hidden" name="food" value="Hot dog XXL"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Hot dog z serem - 14 zł
            <form method="post"><input type="hidden" name="food" value="Hot dog z serem"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Cheese Dog - 15 zł
            <form method="post"><input type="hidden" name="food" value="Cheese Dog"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Bacon Dog - 17 zł
            <form method="post"><input type="hidden" name="food" value="Bacon Dog"><button name="add">Dodaj</button></form>
        </div>

        <div class="menu-item">Chili Dog - 18 zł
            <form method="post"><input type="hidden" name="food" value="Chili Dog"><button name="add">Dodaj</button></form>
        </div>

    </div>
</div>

</div>

</body>
</html>