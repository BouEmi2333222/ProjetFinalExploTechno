<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Utilisateur;

class UtilisateurController extends Controller
{
    public function actionIndex(){
        $users = new Utilisateur;
        
        return $this->render('index',['users'=>$users]);
    }
}