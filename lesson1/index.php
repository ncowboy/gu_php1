<?php
/*
1. Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно.
2. Выполнить примеры из методички и разобраться, как это работает.
3. Объяснить, как работает данный код:
<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?
    var_dump((int)'012345');     // Почему 12345?
    var_dump((float)123.0 === (int)123.0); // Почему false?
    var_dump((int)0 === (int)'hello, world'); // Почему true?
?>
4. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных
в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.
5. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось
b = 1, a = 2. Дополнительные переменные использовать нельзя.
 */

$h1 = 'Домашнее задание к уроку 1';
$title = 'PHP Уровень 1';
$date = date('Y');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title><?= $title; ?></title>
</head>
<body>
<h1><?= $h1; ?></h1>
<h2>Задание 3</h2>
<?php
//Объяснить, как работает данный код:
$a = 5;
$b = '05';
var_dump($a == $b); // Почему true? - Здесь сравнение по значению, но не по типу. При этом значение $b приводится к числу
var_dump((int)'012345'); // Почему 12345? - Строка приводится к числу. Впереди идущий ноль отбрасывается.
var_dump((float)123.0 === (int)123.0); // Почему false? - Сравнение не только по значению, но и по типу. А типы разные
var_dump((int)0 === (int)'hello, world'); // Почему true? При приведении строки к числу интерпретатор смотрит на первый символ.
// Если он не распознается как число - возвращает 0.
?>
<h2>Задание 5</h2>
<?php
$a = 5;
$b = 8;

$a += $b;
$b -= $a;
$b = -$b;
$a -= $b;
echo "a={$a}<br>";
echo "b={$b}<br>";
?>
<footer>
  <div><?= $date; ?></div>
</footer>
</body>
</html>