<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Temperature;

class TemperatureController extends Controller{
    public function actionIndex()
    {
        $temperature = Temperature::find()->all();


        return $this->render('index',['temperature' => $temperature]);
    }
}