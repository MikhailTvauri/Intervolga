<?php

    //Вставить $a в индексный (простой) массив целых чисел после всех элементов, в которых есть цифра 2.

    $a = 1;
    $nums = [];

    for($i = 0; $i<50; $i++)
    {
        $nums[] = mt_rand(1,100);
    }

    echo "<pre>";
    print_r($nums);
    echo "</pre>";

    //Проверяем каждый элемент массива на наличие цифры 2. Если условие истинно, то вставляем после него $a

    $arraylengt = count($nums);

    for($i = 0; $i < $arraylengt; $i++)
    {

        if(preg_match('/[2]/', $nums[$i]))
        {

            //Чтобы при замене не удалялись элементы с таким же индексом, смещаем все элементы на индекс выше

            for($count = count($nums); $count != $i;)
            {
                $nums[$count] = $nums[$count-1];
                $count = $count-1;
            }
            $nums[$i+1] = $a;
            $arraylengt++;
        }
    }

    echo "<pre>";
    print_r($nums);
    echo "</pre>";

?>