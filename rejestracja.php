<?php
session_start();

if (isset($_POST['email']))
{
    $wszystko_OK = true;

    $nick = $_POST['nick'];

    if ((strlen($nick) < 3) || (strlen($nick) > 20))
    {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($nick) == false)
    {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email))
    {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
    }

    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20))
    {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($haslo1 != $haslo2)
    {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
    }

    if (!isset($_POST['regulamin']))
    {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
    }

    $_SESSION['fr_nick'] = $nick;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try
    {
        $polaczenie = new mysqli($host, $db_username, $db_password, $db_name);

        if ($polaczenie->connect_errno != 0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
            if (!$rezultat) throw new Exception($polaczenie->error);

            if ($rezultat->num_rows > 0)
            {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
            }

            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
            if (!$rezultat) throw new Exception($polaczenie->error);

            if ($rezultat->num_rows > 0)
            {
                $wszystko_OK = false;
                $_SESSION['e_nick'] = "Istnieje już gracz o takim nicku! Wybierz inny.";
            }

            if ($wszystko_OK == true)
            {
                if ($polaczenie->query("
                INSERT INTO uzytkownicy (user, pass, email)
                    VALUES ('$nick', '$haslo1', '$email')
"                           ))                {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: witamy.php');
                    exit();
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }
            }

            $polaczenie->close();
        }
    }
    catch(Exception $e)
    {
        echo '<div style="color:red;text-align:center;">Błąd serwera! Spróbuj później.</div>';
        echo '<div style="color:red;text-align:center;">Dev info: '.$e.'</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fast Food Order - Rejestracja</title>

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
}

/* LAYOUT */
.wrapper {
    display: flex;
    justify-content: center;
    padding: 40px;
}

/* KARTA */
.card {
    background: white;
    width: 400px;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 0 15px rgba(0,0,0,0.25);
}

.card h1 {
    text-align: center;
    color: #ff6b00;
    margin-bottom: 20px;
}

/* INPUTY */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
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

/* ERROR */
.error {
    color: red;
    font-size: 13px;
    margin-bottom: 5px;
}

/* LINK */
a {
    color: #ff6b00;
    text-decoration: none;
    font-weight: bold;
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
    <h1>Rejestracja</h1>

    <form method="post">

        Nickname:
        <input type="text" name="nick" value="<?php
            if (isset($_SESSION['fr_nick'])) { echo $_SESSION['fr_nick']; unset($_SESSION['fr_nick']); }
        ?>">

        <?php if(isset($_SESSION['e_nick'])) { echo "<div class='error'>".$_SESSION['e_nick']."</div>"; unset($_SESSION['e_nick']); } ?>

        E-mail:
        <input type="text" name="email" value="<?php
            if (isset($_SESSION['fr_email'])) { echo $_SESSION['fr_email']; unset($_SESSION['fr_email']); }
        ?>">

        <?php if(isset($_SESSION['e_email'])) { echo "<div class='error'>".$_SESSION['e_email']."</div>"; unset($_SESSION['e_email']); } ?>

        Hasło:
        <input type="password" name="haslo1" value="<?php
            if (isset($_SESSION['fr_haslo1'])) { echo $_SESSION['fr_haslo1']; unset($_SESSION['fr_haslo1']); }
        ?>">

        <?php if(isset($_SESSION['e_haslo'])) { echo "<div class='error'>".$_SESSION['e_haslo']."</div>"; unset($_SESSION['e_haslo']); } ?>

        Powtórz hasło:
        <input type="password" name="haslo2" value="<?php
            if (isset($_SESSION['fr_haslo2'])) { echo $_SESSION['fr_haslo2']; unset($_SESSION['fr_haslo2']); }
        ?>">

        <label>
            <input type="checkbox" name="regulamin" <?php
                if (isset($_SESSION['fr_regulamin'])) { echo "checked"; unset($_SESSION['fr_regulamin']); }
            ?>>
            Akceptuję regulamin
        </label>

        <?php if(isset($_SESSION['e_regulamin'])) { echo "<div class='error'>".$_SESSION['e_regulamin']."</div>"; unset($_SESSION['e_regulamin']); } ?>

        <br><br>

        <a href="regulamin.php" target="_blank">Przeczytaj regulamin</a>

        <br><br>

        <input type="submit" value="Zarejestruj się">

    </form>
</div>

</div>

</body>
</html>