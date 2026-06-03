<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: koszyk.php");
    exit();
}

/* 💳 OBSŁUGA PRZYCISKU ZAPŁAĆ */
if (isset($_GET['pay'])) {
    echo "<script>
        alert('To jest strona testowa — nie można dokonać płatności.');
        window.location.href = 'koszyk.php';
    </script>";
    exit();
}

$cart = $_SESSION['cart'];
$cartCount = count($cart);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Koszyk</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#0f172a,#2563eb);
    color:white;
}

.container{
    max-width:800px;
    margin:50px auto;
    background:rgba(255,255,255,0.1);
    padding:20px;
    border-radius:15px;
    backdrop-filter:blur(10px);
}

.item{
    padding:10px;
    border-bottom:1px solid rgba(255,255,255,0.2);
}

.buttons{
    margin-top:20px;
    display:flex;
    gap:10px;
}

a.button{
    display:inline-block;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.pay{
    background:#28a745;
    color:white;
}

.back{
    background:#ff6b00;
    color:white;
}

.clear{
    background:#d63031;
    color:white;
}
</style>

</head>
<body>

<div class="container">

<h1>🛒 Twój koszyk (<?php echo $cartCount; ?>)</h1>

<?php if($cartCount == 0): ?>
    <p>Koszyk jest pusty 😢</p>
<?php else: ?>
    <?php foreach($cart as $index => $item): ?>
        <div class="item">
            <?php echo ($index+1).". ".$item; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="buttons">

    <!-- 💳 ZAPŁAĆ -->
    <a class="button pay" href="koszyk.php?pay=1">💳 Zapłać</a>

    <!-- POWRÓT -->
    <a class="button back" href="gra.php">🍔 ZAMAWIAJ DALEJ</a>

    <!-- CZYSZCZENIE -->
    <a class="button clear" href="koszyk.php?clear=1">🗑 Wyczyść koszyk</a>

</div>

</div>

</body>
</html>