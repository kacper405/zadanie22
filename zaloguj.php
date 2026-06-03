<link rel="stylesheet" href="testy.css?v=1">

<?php 
session_start();

if(!isset($_POST['login']) || !isset($_POST['haslo']))
{
    header('Location: index.php');
    exit();
}

require_once "connect.php";

$polonczenie = @new mysqli($host, $db_username, $db_password, $db_name);

if($polonczenie->connect_errno != 0)
{
    echo "Error: ".$polonczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    $sql = sprintf(
        "SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($polonczenie, $login),
        mysqli_real_escape_string($polonczenie, $haslo)
    );

    if($rezultat = $polonczenie->query($sql))
    {
        $ilu_userow = $rezultat->num_rows;

        if($ilu_userow > 0)
        {
            $_SESSION['zalogowany'] = true;

            $wiersz = $rezultat->fetch_assoc();

            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['user'] = $wiersz['user'];
            $_SESSION['email'] = $wiersz['email'];
            

            // ADMIN
            if ($wiersz['user'] == 'ccc')
            {
                $_SESSION['admin'] = true;
            }
            else
            {
                $_SESSION['admin'] = false;
            }

            unset($_SESSION['blad']);

            $rezultat->free_result();

            header('Location: gra.php');
            exit();
        }
        else
        {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: index.php');
            exit();
        }
    }

    $polonczenie->close();
}
?>