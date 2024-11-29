<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Temperature;

class TemperatureController extends Controller{
    public function actionIndex()
    {
        $query = Temperature::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5, 
            'totalCount' => $query=count()
        ]);

        $temperature = $query->orderBy('code')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
            'temperatures' => $temperature,
            'pagination' => $pagination,
        ]);
    }
}