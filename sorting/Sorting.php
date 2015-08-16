<?php
/**
 * Created by PhpStorm.
 * User: SURO
 * Date: 04.09.14
 * Time: 8:56
 * Класс сортировок элементов
 */

class Sorting {



    /**
     * Классический алгоритм сортировки пузырьком
     * Не эффективен для массивов имеющих больше чем 10 элементов
     * @param array $arr сортируемый массив
     *
     * @return array отсортированный массив
     */
    public static function BubbleClassic(array $arr){

        $count = count($arr);

        for($i=1;$i<=$count-1;$i++){
            for($j=1;$j<=$count-1;$j++){
                if($arr[$j] < $arr[$j-1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                }
            }
        }

        return $arr;
    }

    /**
     * Модифицированный алгоритм сортировки пузырьком
     * убраны не нужные подсчёты пузырьков
     * связанные с гарантированной максимальной величины
     * последнего элемента для каждой итерации
     * Оптимизированна длина пузырька
     *  * * * * *
     *  * * * * #
     *  * * * # #
     *  * * # # #
     *  * # # # #
     * @param array $arr сортируемый массив
     *
     * @return array отсортированный массив
     */
    public static function BubbleOptimizedLength(array $arr){

        $count = count($arr);

        for($i=1;$i<=$count-1;$i++){
            for($j=1;$j<=$count-$i;$j++){
                if($arr[$j] < $arr[$j-1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                }
            }
        }

        return $arr;
    }

    /**
     * Модифицированный алгоритм сортировки пузырьком
     * убраны не нужные подсчёты пузырьков
     * связанные с гарантированной максимальной величины
     * последнего элемента для каждой итерации
     * Убраны ненужные проходы по пузырькам
     * в случае окончания сортировки на полпути
     * Оптимизированна длина пузырька
     * Оптимизированно кол-во пузырьков
     *  * * * * *
     *  * * * * #
     *  * * * # #
     *  * * # # #
     *  * # # # #
     * @param array $arr сортируемый массив
     *
     * @return array отсортированный массив
     */
    public static function BubbleOptimizedLengthAndCount(array $arr){

        $count = count($arr);
        $stop = true;
        for($i=1;$i<=$count-1;$i++){
            $stop = true;
            for($j=1;$j<=$count-$i;$j++){
                if($arr[$j] < $arr[$j-1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                    $stop = false;
                }
            }
            if($stop) break;
        }

        return $arr;
    }

    /**
     * Модифицированный алгоритм сортировки пузырьком
     * убраны не нужные подсчёты пузырьков
     * связанные с гарантированной максимальной величины
     * последнего элемента для каждой итерации
     * Убраны ненужные проходы по пузырькам
     * в случае окончания сортировки на полпути
     * Добавленна разносторонняя сортировка (справо налево слева на право)
     * Оптимизированна длина пузырька
     * Оптимизированно кол-во пузырьков
     *  * * * * *
     *  * * * * #
     *  * * * # #
     *  * * # # #
     *  * # # # #
     * @param array $arr сортируемый массив
     *
     * @return array отсортированный массив
     */
    public static function BubbleOptimizedLengthAndCountAndDirection(array $arr){

        $count = count($arr);
        $stop = true;
        for($i=1;$i<=$count-1;$i++){
            $stop = true;
            for($j=1;$j<=$count-$i;$j++){
                if($arr[$j] < $arr[$j-1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                    $stop = false;
                }
            }
            if($stop) break;
            $stop = true;
            for($j=$count-$i;$j>=1;$j--){
                if($arr[$j] < $arr[$j-1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                    $stop = false;
                }
            }
            if($stop) break;

        }

        return $arr;
    }

/** ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

    /**
     * Гномья сортировка выстраивает любой массив попорядку
     * сравнивая только две близлижайшие ячейки и перемещаясь
     * по массиву только на один шаг.
     * @param $arr
     * @return mixed
     */
    public static function GnomeClassic($arr){
        $i = 0;
        $count = count($arr);
        while($i < $count){
            if($i == 0 OR $arr[$i-1] <= $arr[$i]){
                $i++;
            }
            else{
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i-1];
                $arr[$i-1] = $tmp;
                $i--;
            }
           // if ($i > 3) break;
        }
        return $arr;
    }

    /**
     * Оптимизированная Гномья сортировка выстраивает любой массив попорядку
     * сравнивая только две близлижайшие ячейки и перемещаясь
     * по массиву только на один шаг.
     * Убранны лишние проверки на уже проверенных элементах
     * @param $arr
     * @return mixed
     */
    public static function GnomeOptimized($arr){
        $i = $j = 0;
        $count = count($arr);
        while($i < $count){
            if($i == 0 OR $arr[$i-1] <= $arr[$i]){
                if($j > $i){
                    $i = $j;
                }
                $i++;
            }
            else{
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i-1];
                $arr[$i-1] = $tmp;
                if($i > $j){
                    $j = $i;
                }
                $i--;
            }
            // if ($i > 3) break;
        }
        return $arr;
    }
}