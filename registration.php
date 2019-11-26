<?php

require_once("mysql.php");
$name = htmlspecialchars($_POST['name']);
$login = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
$allUserNames = $pdo->query("SELECT `login` FROM `form`")->fetchAll(PDO::FETCH_COLUMN);
$allEmails = $pdo->query("SELECT `email` FROM `form`")->fetchAll(PDO::FETCH_COLUMN);
if (in_array($login, $allUserNames)) {
    echo "Такой пользователь уже существует, введите другое username!";
} elseif (in_array($email, $allEmails)) {
    echo "Этот email уже зарегестрирован!";
} else {
    $pdo->query("INSERT INTO `form` (`name`,  `login`, `email`, `password`) VALUES ('{$name}', '{$login}', '{$email}', '{$password}')");
    echo 'Спасибо, регистрация прошла успешно)';
}
