<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Temperature';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="temperature-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $temperature,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Température (Celsius)',
                'value' => function ($model) {
                    return $model->tempCelc . ' °C';
                },
            ],
            [
                'label' => 'Température (Fahrenheit)',
                'value' => function ($model) {
                    return $model->tempFahr . ' °F';
                },
            ],
            [
                'label' => 'Température (Kelvin)',
                'value' => function ($model) {
                    return $model->tempKelv . ' K';
                },
            ],
            [
                'label' => 'Date d\'enregistrement',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->dateEnregistre);
                },
            ],
        ],
    ]); ?>
</div>

