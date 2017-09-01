<?php

$exemple = rand(0, 100);

echo $exemple;
echo '<br />';

//ex 1 :

//créez un tableau nommé $data
//ajoutez-y 100 valeurs aléatoires comprises entre 0 et 10

$data = [];

for ($i = 0; $i < 100; $i++) {
  $data[] = rand(0, 10);
}

echo $data;
echo '<br />';

//ex 2 :

//créez un tableau nommé $words qui contient 50 mots différents
//réinitialiser un tableau vide dans $data
//ajoutez-y 100 tableau ayant la structures suivantes :
//- une clé "word" contenant un des 50 mots du tableau $words sélectionné au hasard
//- une clé "count" contenant une valeur aléatoires comprises entre 0 et 10

$words = [];

$words = array('riri', 'fifi', 'loulou', 'picsou', 'aladdin', 'jasmine', 'crochet', 'peter', 'clochette', 'vidia', 'ondine', 'noa', 'iridessa', 'roselia', 'cendrillon', 'lucifer', 'anastasie', 'javotte', 'henry', 'belle', 'bete', 'lumiere', 'zip', 'alice', 'chapelier', 'lapin', 'prof', 'dormeur', 'timide', 'grincheux', 'simplet', 'atchoum', 'joyeux', 'abu', 'tapis', 'génie', 'pocahontas', 'john', 'flitz', 'meeko', 'wendy', 'jean', 'michel', 'bernard', 'bianca', 'terence', 'simba', 'timon', 'pumbaa', 'nala');

$data = [];
