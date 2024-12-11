<?php

$utilisateur = $users::findByCourriel('boucharde64@gmail.com');

echo $utilisateur->prenom;
echo $utilisateur->nom;
echo $utilisateur->courriel;
