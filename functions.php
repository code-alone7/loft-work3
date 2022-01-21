<?php

function task1GetUsersJSON($num) : string | false
{
    $responce = '';

    $users = [];

    for($i = 0; $i < $num; $i++) {
        $users[] = [
            "id" => $i+1,
            "name" => ["Лупа", "Пупа", "медведь", "Шляпа", "Иоганн Себастьян Бах"][rand(0, 4)],
            "age" => rand(18, 45),
        ];
    }

    return json_encode($users);
}

function task1CountUsersByNameFromJSON($json) : array
{
    $users = json_decode($json);

    return array_reduce($users, function ($carry, $user){
        $carry[$user->name] = ($carry[$user->name] || 0) + 1;
    }, []);
}

function task1GetAverageAgeFromJSON($json)
{
    $users = json_decode($json);

    $averageAge = array_reduce($users, function ($carry, $user){
        $carry += $user->Age;
    }, 0) / count($users); // Должен признать на JavaScript'е этот подход выглядит лучше.

    return $averageAge;
}