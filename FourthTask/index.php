<?php

    /*
    Напишите SQL-запрос для создания таблицы спортсменов (подберите типы подходящие данных):
    ФИО
    e-mail
    телефон (только российские номера мобильных)
    дата рождения
    возраст,
    дата и время создания записи
    номер паспорта,
    среднее место на соревнованиях
    биография
    видеопрезентация
    И выберите из БД топ 5 ФИО спортсменов, больше остальных посетивших соревнований (одним SQL-запросом и без вложенных SELECT’ов)
    */

    //Функция запроса к БД
    function querydb($connect, $query)
    {
        $finalquery = $connect->prepare($query);
        $finalquery->execute();
        return $finalquery->fetchAll();
    }

    //Функция создания таблицы
    function createdb($connect, $query)
    {
        $finalquery = $connect->prepare($query);
        $finalquery->execute();
    }

    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'sportsmens';
    $db_user = 'root';
    $db_pass = '';
    $charset = 'utf8';
    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    try 
    {
        $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $option);
    }
    catch (PDOException $i) 
    {
        die("Ошибка подключения к базе данных");
    }     

    //Запрос на создание таблицы спортсменов.
    //К перечисленным в задании данным, я добавил id_sportsmen, чтобы его можно было использовать как primary key.

    $createdb = "CREATE TABLE `sportsmenss` 
    (`id_sportsmen` INT NOT NULL AUTO_INCREMENT ,
    `FCs` VARCHAR(45) NOT NULL ,
    `email` VARCHAR(30) NOT NULL ,
    `phone_num` VARCHAR(12) NOT NULL CONSTRAINT phone_num_checks CHECK (`phone_num` REGEXP '[+7][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]') ,
    `datebirth` DATE NOT NULL ,
    `age` TINYINT(50) NOT NULL ,
    `create_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `passport_num` SMALLINT(50) NOT NULL ,
    `mid_result` TINYINT(50) NOT NULL ,
    `bio` VARCHAR(50) NOT NULL ,
    `video_pres` VARCHAR(50) NOT NULL ,
    UNIQUE (`email`), UNIQUE (`phone_num`), UNIQUE (`passport_num`), PRIMARY KEY (`id_sportsmen`)) ENGINE = InnoDB;";


    //Запрос на выборку спортсменов, которые чаще всего встречаются на соревнованиях.
    //Так как в любом соревновании у спортсмена есть хоть какой-то результат, то и выборка будет по частоте этого спортсмена в таблице результатов.

    $oftenSportsmens = "SELECT `FCs` FROM `results`, `sportsmens` WHERE `results`.`res_id_sportsmen` = `sportsmens`.`id_sportsmen` GROUP BY `ref_id_sportsmen` ORDER BY count(*) DESC LIMIT 5;";

?>