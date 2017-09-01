<?php

// exo 3 if framagit

// déterminer si $i est :
// - plus grand que 500
// - plus petit que 500
// - ou égal à 500
$i = random_int(1, 1000);
echo "$i\n";

if ($i > 500) {
  echo "i est plus grand que 500\n";
  echo "<br />\n";
}
if ($i == 500) {
  echo "i est égal à 500\n";
  echo "<br />\n";
}
if ($i < 500) {
  echo "i est inférieur à 500\n";
  echo "<br />\n";
}

// //exo 4 if framagit
echo "<br />\n";
$i = random_int(0, 100) / 100;

echo "i == $i\n";
//
// // déterminez si $i est plus petit ou égal à 0,5 (bloc "if")
// // ou non (bloc "else")

if ($i <= 0.5) {
  echo "i est inférieur ou égal à 0.5\n";
  echo "<br />\n";
} else {
  echo "i est plus grand que 0.5\n";
  echo "<br />\n";
}

//Exo 5 partie 1 if framagit
echo "<br />\n";
$i = random_int(1, 10);

echo "i == $i\n";

// déterminez si $i est :
// - égal à 5
// - plus grand que 5
// - se trouve dans le dernier cas (dite lequel)

if ($i == 5) {
  echo "i est égal à 5";
  echo "<br />\n";
} elseif ($i > 5) {
  echo "i est supérieur à 5\n";
  echo "<br />\n";
} else {
  echo "i est inférieur à 5";
  echo "<br />\n";
}

//Exo 5 partie 2 if framagit
echo "<br />\n";
$i = random_int(0, 2);
echo "i == $i\n";

// $i représente un nombre de personnes
// en fonction de $i, affichez la phrase correspondante :
// - il n'y a personne
// - il y a une seule personne
// - il y a plusieurs personnes

if ($i == 0) {
  echo "Il n'y a personne\n";
  echo "<br />\n";
} elseif ($i == 1) {
  echo "Il y'a une personne\n";
  echo "<br />\n";
} else {
  echo "Il y'a plusieurs personnes\n";
  echo "<br />\n";
}

//Exo6 if framagit
echo "<br />\n";
$i = random_int(0, 50);

// si $i est compris entre 0 et 9, affichez "i est plus petit que 10"
// si $i est compris entre 10 et 19, affichez "i est plus petit que 20"
// si $i est compris entre 20 et 29, affichez "i est plus petit que 30"
// si $i est compris entre 30 et 39, affichez "i est plus petit que 40"
// sinon "i est plus grand ou égal à 40"

if ($i >=0 && $i < 10) {
  echo "i est plus petit que 10\n";
  echo "<br />\n";
} elseif ($i >= 10 && $i < 20 ) {
  echo "i est plus petit que 20\n";
  echo "<br />\n";
} elseif ($i >= 20 && $i < 30) {
  echo "i est plus petit que 30";
  echo "<br />\n";
} elseif ($i >= 30 && $i < 40) {
  echo "i est plus petit que 40\n";
  echo "<br />\n";
} else {
  echo "i est plus grand que 40\n";
  echo "<br />\n";
}

//Exo7 if framagit
echo "<br />\n";
$age = random_int(12, 25);
$abonne = random_int(0, 1);
echo "$age\n";
echo "$abonne\n";
echo "<br />\n";

// déterminez si un utilisateur a droit ou non d'accéder à une ressource :
// - non si l'utilisateur a moins de 16 ans
// - non si l'utilisateur a 16 ou plus mais qu'il n'est pas abonné
// - oui si l'utlisateur a 16 ou plus et qu'il est abonné

if ($age < 16) {
  echo "Accés refusé\n";
  echo "<br />\n";
} elseif ($age >= 16 && !$abonne) {
  echo "Accés refusé\n";
  echo "<br />\n";
} elseif ($age >= 16 && $abonne) {
  echo "Acces autorisé";
  echo "<br />\n";
}

//Exo8 if framagit
echo "<br />\n";
$scoreJoueur1 = random_int(0, 100);
echo "$scoreJoueur1\n";
$scoreJoueur2 = random_int(0, 100);
echo "$scoreJoueur2\n";

// si au moins un des deux joueurs a un score plus grand que 50
// les joueurs peuvent passer au niveau supérieur
// sinon : game over

if ($scoreJoueur1 > 50 || $scoreJoueur2 > 50) {
  echo "Joueur 1 et 2 passent au niveau supérieur\n";
  echo "<br />\n";
} else {
  echo "Game over\n";
  echo "<br />\n";
}

// Exo 9 if framagit
echo "<br />\n";
$scoreJoueur1 = random_int(0, 100);
$scoreJoueur2 = random_int(0, 100);

$bonusJoueur1 = random_int(0, 1);
$bonusJoueur2 = random_int(0, 1);

echo "joueur 1: $scoreJoueur1\n";
echo "bonus joueur 1: $bonusJoueur1\n";
echo "<br />\n";

echo "joueur 2: $scoreJoueur2\n";
echo "bonus joueur 2: $bonusJoueur2\n";
echo "<br />\n";

// si les deux joueurs ont plus de 50 points
// ou  si un des deux joueurs a attrapé un bonus
// ils peuvent passer au niveau supérieur
// sinon : game over

if (($scoreJoueur1 > 50 && $scoreJoueur2 > 50)
              || $bonusJoueur1 == 1
              || $bonusJoueur2 == 1
) {
  echo "Joueur 1 et Joueur 2 passent au niveau supérieur";
  echo "<br />\n";
} else {
  echo "Game over";
  echo "<br />\n";
}
