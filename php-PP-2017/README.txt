TP PHP pour PopSchool Lens, promotion Jimmy Wales

Philippe Pary <philippe@pop.eu.com>

# Licence

Rien à foutre, faites ce que vous voulez

# Installation

1. Copiez les fichiers dans votre dossier web
2. Installez la base de données avec le fichier database-empty (structure seule) ou database-sample (structure et données de démonstration)
3. Copiez le fichier config/db-sample.php en config/db.php et modifiez les valeurs
4. Lancez la commande ``$ yarn install` pour installer les dépendances
5. C’est tout

# Notes

Projet en PHP vanilla + MySQL + bootstrap

# USAGE

Allez à la racine du projet, ça se passe de notes

# DOCUMENTATION DE L’API

## promotions

* api/promotions.php

Aucun paramètre, renvoie un tableau JSON avec les promotions

* api/change_promotion.php

Un objet JSON avec les champs suivants: id, name, startdate et enddate

Renvoie success ou failure

* api/create_promotion.php

Un objet JSON avec les champs suivants: name, startdate et enddate

Renvoie success ou failure

* api/delete_promotions.php

Un objet JSON avec le champ id

Renvoie success ou failure
