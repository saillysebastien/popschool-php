<?php

// exo 1 array framagit
echo "<br />\n";
// affectez un tableau vide à une variable
// en utilisant la notation array()

// affectez un tableau vide à une variable
// en utilisant la notation []

// affectez un tableau de 3 integers à une variable
// en utilisant la notation array()

// affectez un tableau de 3 floats à une variable
// en utilisant la notation []

$tableau = array();
$tableau = [];

var_dump($tableau);
echo "<br />\n";

$tableau1 = array(10, 100, 200);
$tableau2 = [10.5, 100.5, 200.5];
var_dump($tableau1);
echo "<br />\n";
var_dump($tableau2);
echo "<br />\n";

//Exo 2 array framagit
echo "<br />\n";
// affectez un tableau de 3 strings à une variable
// en utilisant la notation array()
// en mettant chaque élément sur 1 ligne
// et en mettant la dernière virgule

// affectez un tableau de 3 strings à une variable
// en utilisant la notation []
// en mettant chaque élément sur 1 ligne
// et en mettant la dernière virgule

$tableau = array(
  'Exo 2 array framagit',
  'Exo 2 array framagit',
  'Exo 2 array framagit',
);

$tab = [
  'Exo 2 array framagit',
  'Exo 2 array framagit',
  'Exo 2 array framagit',
];

var_dump($tableau);
echo "<br />\n";
var_dump($tab);
echo "<br />\n";

//Exo 4 array framagit
echo "<br />\n";

// affectez un tableau vide à une variable
// ensuite, ajoutez-lui 1 booléen, 1 integer et 1 string

// affectez un tableau de 2 floats à une variable
// ensuite, ajoutez-lui 1 booléen, 1 integer et 1 string

$tableau = [];
var_dump($tableau);
echo "<br />\n";
$tableau[] = true;
$tableau[] = 500;
$tableau[] = 'Exo3 array framagit';
var_dump($tableau);
echo "<br />\n";

// Exo 4 array framagit
// affectez un tableau de 5 valeurs (type de données libre)
// puis affichez le premier élément, le 3ème et le dernier
echo "<br />\n";

$tableau = [];
$tableau[] = 100;
$tableau[] = 'vrai';
$tableau[] = 'Exo 5 array framagit';
$tableau[] = 250.7;
$tableau[] = 'faux';

echo $tableau[0] . "\n";
echo "<br />\n";
echo $tableau[2] . "\n";
echo "<br />\n";
echo $tableau[4] . "\n";
echo "<br />\n";

//Exo 5 partie 1 array framagit
echo "<br />\n";
$tab = ['foo', 'bar', 'baz', 'lorem', 'ipsum'];

// affichez le premier élement, le 3ème et le dernier
// en affectant la valeur de l'index à la variable $i
// et en se servant de $i comme index du tableau
$i = 0;
echo $tab[$i] . "\n";
echo "<br />\n";

$i = 2;
echo $tab[$i] . "\n";
echo "<br />\n";

$i = 4;
echo $tab[$i] . "\n";
echo "<br />\n";

//Exo 5 partie 2 array framagit

echo "<br />\n";
$tab = ['foo', 'bar', 'baz', 'lorem', 'ipsum'];

// affichez le premier élement, le 3ème et le dernier
// en en se servant de $i comme index du tableau
// et en utilisant l'opérateur d'incrémentation (++)

$i = 0;
echo $tab[$i] . "\n";
echo "<br />\n";
$i++;
$i++;
echo $tab[$i] . "\n";
echo "<br />\n";
$i++;
$i++;
echo $tab[$i] . "\n";
echo "<br />\n";

// Exo 6 array framagit
echo "<br />\n";

$tableau = [];

$tableau[] = 123;
$tableau[] = 3.14;
$tableau[] = 'foo bar baz';
$tableau[] = true;

$elements = count($tableau);

// affichez le dernier élément du tableau en vous servant de la variable $elements
echo $tableau[$elements - 1] . "\n";
