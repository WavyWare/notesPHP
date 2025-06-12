<?php
require_once __DIR__ . "/../connect.php"; 
session_start();

if (isset($_SESSION['id'])) {
    header("Location: ./../dashboard");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ./../register.php");
    exit;
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$repeatPassword = $_POST['repeatpassword'];

if (strlen($name) <= 3) {
    $_SESSION['error'] = 'Nazwa użytkownika musi mieć więcej niż 3 znaki.';
    header('Location: ./../register.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Nieprawidłowy format adresu e-mail.';
    header('Location: ./../register.php');
    exit;
}

if ($password !== $repeatPassword) {
    $_SESSION['error'] = 'Hasła nie są identyczne.';
    header('Location: ./../register.php');
    exit;
}

$points = 0;
if (strlen($password) > 8) $points++;
if (strlen($password) > 14) $points++;
if (preg_match("/[A-Z]/", $password)) $points++;
if (preg_match("/[0-9]/", $password)) $points++;
if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) $points++;

if ($points < 4) {
    $_SESSION['error'] = 'Hasło jest za słabe. Musi spełniać co najmniej 4 z 5 warunków.';
    header('Location: ./../register.php');
    exit;
}

$sql_check = "SELECT id FROM User WHERE email = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "s", $email);
mysqli_stmt_execute($stmt_check);
$result = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = 'Ten adres e-mail jest już zajęty.';
    header('Location: ./../register.php');
    exit;
}
mysqli_stmt_close($stmt_check);

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql_insert = "INSERT INTO User (email, name, password) VALUES (?, ?, ?)";
$stmt_insert = mysqli_prepare($conn, $sql_insert);
mysqli_stmt_bind_param($stmt_insert, "sss", $email, $name, $hash);

if (mysqli_stmt_execute($stmt_insert)) {
    $_SESSION['id'] = mysqli_insert_id($conn);
    $_SESSION['name'] = $name;
    header('Location: ./../dashboard');
    exit;
} else {
    $_SESSION['error'] = 'Wystąpił błąd podczas rejestracji. Spróbuj ponownie.';
    header('Location: ./../register.php');
    exit;
}

mysqli_stmt_close($stmt_insert);
mysqli_close($conn);
?>
