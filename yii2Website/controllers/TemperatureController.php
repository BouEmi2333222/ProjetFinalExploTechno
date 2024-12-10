<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Temperature;

class TemperatureController extends Controller{
    public function actionIndex()
    {
        $temperature = Temperature::find()->all();


        return $this->render('index',['temperatures' => $temperature]);
    }
}