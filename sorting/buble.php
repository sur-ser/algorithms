<?php
/**
 * Created by PhpStorm.
 * User: SURO
 * Date: 04.09.14
 * Time: 8:54
 * Алгоритм сортировки пузырьком
 */
include_once('Sorting.php');
$arr = array();
for($i=0;$i<100;$i++)
    $arr[] = rand(1,100);

var_dump($arr);
$start = microtime(true);
var_dump(Sorting::BubbleClassic($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);

$start = microtime(true);
var_dump(Sorting::BubbleOptimizedLength($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);

$start = microtime(true);
var_dump(Sorting::BubbleOptimizedLengthAndCount($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);

$start = microtime(true);
var_dump(Sorting::BubbleOptimizedLengthAndCountAndDirection($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);

$start = microtime(true);
var_dump(Sorting::GnomeClassic($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);

$start = microtime(true);
var_dump(Sorting::GnomeOptimized($arr));
$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);