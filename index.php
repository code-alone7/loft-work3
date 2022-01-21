<?php

include 'functions.php';

file_put_contents('users.json', task1GetUsersJSON(50));

echo '<pre>';
$json = file_get_contents('users.json');
print_r( task1CountUsersByNameFromJSON($json) );
echo "\n-------------------------------\n";
print_r( task1GetAverageAgeFromJSON($json) );
echo '</pre>';