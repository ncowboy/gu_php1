<?php
session_start();
$registerForm = $_POST['sign-up-form'];
$login = $registerForm['login'] ?? '';
$name = $registerForm['name'] ?? '';
$password = $registerForm['password'] ?? '';
$email = $registerForm['email'] ?? '';
$email_repeat = $registerForm['email-repeat'] ?? '';


if ($registerForm && isset($registerForm['submit']) && signUpFormValidate($login, $name, $password, $email,
    $email_repeat)
  && addUser([
    'login' => $login,
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ]))
{
 header('Location: /login');
}

function signUpFormValidate($_login, $_name, $_pass, $_email, $_email_repeat)
{
  if (empty($_login) || empty($_name) || empty($_pass) || empty($_email) || empty($_email_repeat)) {
    $_SESSION['errors'][] = 'Обязательное поле не заполнено';
  }
  if ($_email !== $_email_repeat) {
    $_SESSION['errors'][] = 'Email не совпадают';
  }
  return empty($_SESSION['errors']);
}

session_write_close();