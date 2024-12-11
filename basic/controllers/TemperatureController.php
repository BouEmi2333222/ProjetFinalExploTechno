<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Temperature;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TemperatureController extends Controller{
    public function actionIndex()
    {
        $temperature = Temperature::find()->all();


        return $this->render('index',['temperature' => $temperature]);
    }

    public function actionMoyenne()
    {
        // Créer un modèle temporaire pour le formulaire
        $model = new \yii\base\DynamicModel(['unit']);
        
        // Par défaut, l'unité choisie sera Celsius
        $unit = 'tempCelc'; 

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            // Si le formulaire est soumis, récupérer l'unité sélectionnée
            $unit = $model->unit;
        }

        // Date du jour
        $date = date('Y-m-d'); 

        // Récupérer les températures du jour pour le calcul de la moyenne
        $temperatures = Temperature::find()
            ->where(['dateEnregistre' => $date]) // Filtrer par date
            ->all();

        $totalTemperature = 0;
        $count = 0;

        // Calculer la somme des températures de l'unité choisie
        foreach ($temperatures as $temp) {
            $totalTemperature += $temp->$unit;
            $count++;
        }

        // Calculer la moyenne
        $averageTemperature = ($count > 0) ? $totalTemperature / $count : null;

        // Passer la moyenne et l'unité à la vue
        return $this->render('moyenne', [
            'averageTemperature' => $averageTemperature,
            'unit' => $unit,
            'model' => $model, // Passer le modèle pour le formulaire
        ]);
    }
}