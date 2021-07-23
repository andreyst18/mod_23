<?php
    //Сокращение ФИО
    
    function getShortName($arg) {
        $person = getPartsFromFullname($arg);
        return $person['name'] . ' ' .  mb_substr( $person['surname'], 0, 1) . '.';       
    }