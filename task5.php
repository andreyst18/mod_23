<?php

    //Идеальный подбор пары
    function getPerfectPartner($surname, $name, $patronomyc, $persons) {
        $surname =  ucfirst(strtolower($surname));
        $name = ucfirst(strtolower($name));
        $patronomyc = ucfirst(strtolower($patronomyc));
        
        $person = getFullnameFromParts($surname, $name, $patronomyc);
        $personGender = getGenderFromName($person);
        
        $numberOfPersonToCheck = rand(0, count($persons) - 1);
        $personToCheck = $persons[$numberOfPersonToCheck]['fullname'];
        
        while (getGenderFromName($personToCheck) === 0 || getGenderFromName($personToCheck) === $personGender) {
            $numberOfPersonToCheck = rand(0, count($persons) - 1);
            $personToCheck = $persons[$numberOfPersonToCheck]['fullname'];
        }
        
        $person = getShortName($person);
        $personToCheck = getShortName($personToCheck);
        $percentForResult = round(random_float(50, 100), 2);
        
        return <<<RESULT
        $person + $personToCheck = 
        <br>♡ Идеально на $percentForResult% ♡
        RESULT;
    }

    //Генерация случайного числа
    function random_float ($min,$max) {
        return ($min+lcg_value()*(abs($max-$min)));
     }