<?php

$nom = 'Bouchard';

$query = (new \yii\db\Query())
    ->select(['nom'])
    ->from('utilisateur')
    ->where('nom=:nom',[':nom' => $nom]);

echo $query."<br>";
