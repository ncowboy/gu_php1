<?php
session_start();
unset($_SESSION['errors']);
$loginForm = $_POST['sign-in-form'];
$logout = $_POST['logout'];

if ($loginForm && isset($loginForm['submit'])) {
    $login = htmlspecialchars(strip_tags($loginForm['login']));
    $pass = htmlspecialchars(strip_tags($loginForm['password']));
    if (empty($login) || empty($pass)) {
        $_SESSION['errors'][] = 'Поле не может быть пустым';
    }
    $user = getUser($login);
    if ($user) {
        if (password_verify($pass, $user['password'])) {
            $_SESSION['isAuth'] = true;
            $_SESSION['user_name'] = $user['login'];
            header('location: /');
        } else {
            $_SESSION['errors'][] = 'Неверный пароль';
        }
    } else {
        $_SESSION['errors'][] = 'Пользователь не существует';
    }
}
session_write_close();

if (isset($logout['submit'])) {
    session_start();
    session_destroy();
    header('Location: /');
}