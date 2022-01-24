<?php

function task1GetUsersJSON($num): string
{
    $responce = '';

    $users = [];

    for ($i = 0; $i < $num; $i++) {
        $users[] = [
            "id" => $i + 1,
            "name" => ["Лупа", "Пупа", "медведь", "Шляпа", "Иоганн Себастьян Бах"][rand(0, 4)],
            "age" => rand(18, 45),
        ];
    }

    return json_encode($users);
}

function task1CountUsersByNameFromJSON($json)
{
    $users = json_decode($json);

    return array_reduce($users, function ($carry, $user) {
        $carry[$user->name] += 1;
        return $carry;
    });
}

function task1GetAverageAgeFromJSON($json) : float
{
    $users = json_decode($json);

    $averageAge = array_reduce($users, function ($carry, $user) {
            return $carry + $user->age;
        }, 0) / count($users); // Должен признать на JavaScript'е этот подход выглядит лучше.

    return $averageAge;
}