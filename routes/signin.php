<?php
require_once "./../connect.php";
session_start();

if (isset($_SESSION['id'])) {
    header("Location: ./../dashboard");
}

$email = $_POST['email'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if(!isset($_POST["submit"]) || $submit == null) {
    header("Location: http://localhost/php/");
    exit;
}

$submit = null;
$q = mysqli_query($conn, "SELECT id, name, password FROM `User` WHERE email='". trim($email) ."';");

if(!$q || mysqli_num_rows($q) != 1) {
    header("Location: ./../def");
    exit;
}

$result = mysqli_fetch_assoc($q);

if (!password_verify($password, $result["password"])) {
    header("Location: ./../");
    exit;
}

$_SESSION['user_id'] = $result['id'];
$_SESSION['username'] = $result['name'];