<?php

function task1($num)
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

    file_put_contents('users.json', json_encode($users));

    //---------------------------------------

    $json = file_get_contents('users.json');
    $receivedUsers = json_decode($json);

    $usersOfName = [];
    $sum = 0;
    foreach ($receivedUsers as $user) {
        $usersOfName[$user->name] = ($usersOfName[$user->name] || 0) + 1;
        $sum += $user->age;
    }
    $averageAge = $sum / count($receivedUsers);

    echo '<pre>';
    print_r("Average age is $averageAge");
    echo "\n";
    print_r($usersOfName);
    echo "------------------------------------------------------------------------------\n";
    print_r($receivedUsers);
    echo "===============================================================================\n";
    echo '</pre>';
}