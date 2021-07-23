<?php

    //Функция определения пола по ФИО

    function getGenderFromName($arg) {
        $person = getPartsFromFullname($arg);
        $result = 0;
        //Проверка на женский пол
        if (mb_substr($person['patronomyc'], -3) === 'вна') {
            $result -= 1;
        }
        if (mb_substr($person['name'], -1) === 'а') {
            $result -= 1;
        }
        if (mb_substr($person['surname'], -2) === 'ва') {
            $result -= 1;
        }
        //Проверка на мужской пол
        if (mb_substr($person['patronomyc'], -2) === 'ич') {
            $result += 1;
        }
        if (mb_substr($person['name'], -1) === 'й' || mb_substr($person['name'], -1) === 'н') {
            $result += 1;
        }
        if (mb_substr($person['surname'], -1) === 'в') {
            $result += 1;
        }
        return $result;
    }