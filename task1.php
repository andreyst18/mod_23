<?php
    //Разбиение и объединение ФИО

    function getFullnameFromParts($surname, $name, $patronomyc) {
        return $surname . ' ' . $name . ' ' . $patronomyc;        
    }

    function getPartsFromFullname($arg) {
        $keys = ['surname', 'name', 'patronomyc'];
        return array_combine($keys, explode(' ', $arg));
    }





