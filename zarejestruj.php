<?php
session_start();
                    
// Sprawdź, czy żądanie przyszło metodą POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: rejestracja.php');
    exit();
}

// Pobierz dane z formularza
$nickname = isset($_POST['nickname']) ? trim($_POST['nickname']) : '';
$haslo1 = isset($_POST['haslo1']) ? $_POST['haslo1'] : '';
$haslo2 = isset($_POST['haslo2']) ? $_POST['haslo2'] : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$regulamin = isset($_POST['regulamin']);

// Walidacja: wszystkie pola wymagane oraz akceptacja regulaminu
if ($nickname === '' || $haslo1 === '' || $haslo2 === '' || $email === '' || !$regulamin) {
    $_SESSION['blad'] = 'Wypełnij wszystkie pola i zaakceptuj regulamin.';
    header('Location: rejestracja.php');
    exit();
}

// Sprawdź, czy hasła są takie same
if ($haslo1 !== $haslo2) {
    $_SESSION['blad'] = 'Hasła nie są identyczne.';
    header('Location: rejestracja.php');
    exit();
}

// Jeśli wszystko ok — tutaj można dodać zapis do bazy danych
// Hasło jest używane w postaci oryginalnej, bez szyfrowania.

// Przykładowy sukces (demo)
$_SESSION['success'] = 'Rejestracja zakończona powodzeniem!';
header('Location: index.php');
exit();
