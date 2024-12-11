<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Utilisateur;

class UtilisateurController extends Controller
{
    public function actionIndex(){
        $users = Utilisateur::find()->all();
        
        return $this->render('index',['users'=>$users]);
    }
}