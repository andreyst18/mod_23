<?php

    //Определение возрастно-полового состава

    function getGenderDescription($arg) {
        $men = array_filter($arg, function($person) {
            return getGenderFromName($person['fullname']) === 1;
        });
        $woman = array_filter($arg, function($person) {
            return getGenderFromName($person['fullname']) === -1;
        });
        $undefined = array_filter($arg, function($person) {
            return getGenderFromName($person['fullname']) === 0;
        });
        $menPercent =  round(count($men) / count($arg) * 100, 1);
        $womanPercent =  round(count($woman) / count($arg) * 100, 1);
        $undefinedPercent =  round(count($undefined) / count($arg) * 100, 1);
        
        return <<<RESULT
        \n
        Гендерный состав аудитории:
        ---------------------------
        Мужчины - $menPercent%
        Женщины - $womanPercent%
        Не удалось определить - $undefinedPercent%        
        RESULT;
    }