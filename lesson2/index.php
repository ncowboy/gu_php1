<h3>Задание 1 </h3>
<?php
/*
 * 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт,
который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.
 */

$a = mt_rand(-3000, 3000);
$b = mt_rand(-3000, 3000);
echo "a равно {$a}, b равно {$b}<br>";
if ($a >= 0 && $b >= 0) {
  echo($a - $b);
} else if ($a < 0 && $b < 0) {
  echo($a * $b);
} else {
  echo($a + $b);
}
?>

<h3>Задание 2 </h3>
<?php

/*
 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
 */

$a = mt_rand(0, 15);
echo "a равно {$a}<br>";
switch ($a) {
  case '0':
    echo '0<br>';
    $a++;
  case '1':
    echo '1<br>';
    $a++;
  case '2':
    echo '2<br>';
    $a++;
  case '3':
    echo '3<br>';
    $a++;
  case '4':
    echo '4<br>';
    $a++;
  case '5':
    echo '5<br>';
    $a++;
  case '6':
    echo '6<br>';
    $a++;
  case '7':
    echo '7<br>';
    $a++;
  case '8':
    echo '8<br>';
    $a++;
  case '9':
    echo '9<br>';
    $a++;
  case '10':
    echo '10<br>';
    $a++;
  case '11':
    echo '11<br>';
    $a++;
  case '12':
    echo '12<br>';
    $a++;
  case '13':
    echo '13<br>';
    $a++;
  case '14':
    echo '14<br>';
    $a++;
  case '15':
    echo '15<br>';
    $a++;
}
?>
<h3>Задание 3 </h3>
<?php

/*
 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
*/
function sum($a, $b)
{
  return $a + $b;
}

function subtr($a, $b)
{
  return $a - $b;
}

function mult($a, $b)
{
  return $a * $b;
}

function div($a, $b)
{
  return $b !== 0 ? $a / $b : 'делить на ноль нельзя';
}

echo sum(5, 10) . '<br>';
echo subtr(5, 10) . '<br>';
echo mult(5, 10) . '<br>';
echo div(5, 10) . '<br>';

?>
<h3>Задание 4</h3>
<?php
/*
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения
аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из
арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */

function mathOperation($arg1, $arg2, $operation)
{
  switch ($operation) {
    case 'sum':
      echo sum($arg1, $arg2) . '<br>';
      break;
    case 'subtr':
      echo subtr($arg1, $arg2) . '<br>';
      break;
    case 'mult':
      echo mult($arg1, $arg2) . '<br>';
      break;
    case 'div':
      echo div($arg1, $arg2) . '<br>';
      break;
  }
}
mathOperation(5, 10, 'sum');
mathOperation(5, 10, 'subtr');
mathOperation(5, 10, 'mult');
mathOperation(5, 10, 'div');
?>

<h3>Задание 6</h3>
<?php
/*
6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
*/

function power($val, $pow)
{
  if ($pow !== 1) {
    return $val * power($val, $pow - 1);
  }
}
echo pow(6, 8);
?>

<h3>Задание 7</h3>
<?php
/*
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
*/

function getCorrectTime()
{
  $hours = (int)date('H');
  $mins = (int)date('i');

  function addHourString($hourVal)
  {
    if ($hourVal === 1 || $hourVal === 21) {
      return ' час';
    } else if ($hourVal >= 2 && $hourVal <= 4 || $hourVal >= 22 && $hourVal <= 24) {
      return ' часа';
    } else {
      return ' часов';
    }
  }

  function addMinString($minVal)
  {
    if ($minVal % 10 === 1 && $minVal !== 11) {
      return ' минута';
    } else if (($minVal < 12 || $minVal > 14) && $minVal % 10 >= 2 && $minVal % 10 <= 4) {
      return ' минуты';
    } else {
      return ' минут';
    }
  }
  return $hours . addHourString($hours) . ' ' . $mins . addMinString($mins);
}

echo getCorrectTime();
?>
