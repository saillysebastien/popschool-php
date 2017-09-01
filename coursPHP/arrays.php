<?php

//création d'un tableau vide

$myArray = [];

//ajout de données

$myArray = [] = 42;
$myArray = [] = 3.14;
$myArray = [] = "foo bar baz";
$myArray = [] = true;

//lecture du tableau avec un index numérique

for ($i = 0; $i < count($myArray); $i++) {
  echo $myArray[$i];
  echo '<br />';
}

//suppression de la donnée située à l'index 2

array_splice($myArray, 2, 1);

//lecture du tableau avec une boucle foreach

foreach ($myArray as $key => $value) {
  echo $key;
  echo '<br />';
  echo $value;
  echo '<br />';
}

//création d'un tableau avec une clé alphanumérique

$myArray2 = [
  "abc" => 123,
  "def" => 456;
  "ghi" => 789;
];

//ajout de données avec une clé alphanumérique

$myArray2["jkl"] = 123;

//suppression de données avec une clé alphanumérique

unset($myArray2["def"]);

//lecture du tableau avec une boucle foreach

foreach ($myArray2 as $key => $value) {
  echo $key;
  echo '<br />';
  echo $value;
  echo '<br />';
}
