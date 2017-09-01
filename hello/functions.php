<?php

function addition($a, $b) {
  return $a + $b;
}

$result = addition(2, 3);

echo $result;
echo "<br />\n";

// créer une fonction echoBoolean qui :
// - prend une variable en paramètre
// - renvoie la chaine de caractère "vrai" si la variable est true
// - renvoie la chaine de caractère "faux" si la variable est false

// appeler cette fonction avec:
// - une valeur true et afficher le résultat
// - une valeur false et affichez le résultat


function echoBoolean($c){
  if ($c == true) {
    return "vrai";
  } else {
    return "faux";
  }
}

echo echoBoolean(true);
echo "<br />\n";
echo echoBoolean(false);
echo "<br />\n";


function booleanToString($booleanValue) {
  return $booleanValue ? "vrai" : "faux";
}

$result = booleanToString(true);
echo $result;
echo "<br />\n";

$result = booleanToString(false);
echo $result;
echo "<br />\n";

function booleanToString3($booleanValue) {
  if ($booleanValue === true) {
    return "vrai";
  } elseif ($booleanValue === false) {
    return "faux";
  } else {
    return false;
  }
}

$result = booleanToString3("foo bar baz");

if ($result == false) {
  echo "booleanValue n'est pas une valeur bolléenne";
  echo "<br />";
} else {
  echo $result;
  echo "<br />\n";
}

//definition d'une fonction avec declaration de type
function booleanToString4(bool $booleanValue){
  return $booleanValue ? "vrai" : "faux";
}

echo "Booléen<br />\n";
echo booleanToString4(true);
echo "<br />\n";

echo booleanToString4(false);
echo "<br />\n";

echo booleanToString4("foo var baz");
echo "<br />\n";
