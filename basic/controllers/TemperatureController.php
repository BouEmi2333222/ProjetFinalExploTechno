<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Temperature;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;  // Utilisé pour le débogage
use yii\base\DynamicModel;

class TemperatureController extends Controller{
    public function actionIndex()
    {
        $temperature = Temperature::find()->all();


        return $this->render('index',['temperature' => $temperature]);
    }

    public function actionMoyenne()
    {
        $date = date('Y-m-d'); 
        $temperatures = Temperature::find()
        ->where(['dateEnregistre' => $date]) // Filtrer par date
        ->all();

        $totalTemperatureCelcius = 0;
        $countCelcius = 0;

        $totalTemperatureFahr = 0;
        $countFahr = 0;

        $totalTemperatureKelvin = 0;
        $countKelvin = 0;

        // Calculer la somme des températures de l'unité choisie
        foreach ($temperatures as $temp) {
            $temperature = $temp->tempCelc;
            if ($temperature !== null) {
                $totalTemperatureCelcius += $temperature;
                $countCelcius++;
            }
            $temperature = $temp->tempFahr;
            if ($temperature !== null) {
                $totalTemperatureFahr += $temperature;
                $countFahr++;
            }
            $temperature = $temp->tempKelv;
            if ($temperature !== null) {
                $totalTemperatureKelvin += $temperature;
                $countKelvin++;
            }
        }

        // Calculer la moyenne
        $averageTemperatureCelc = ($countCelcius > 0) ? $totalTemperatureCelcius / $countCelcius : null;
        $averageTemperatureFahr = ($countFahr > 0) ? $totalTemperatureFahr / $countFahr : null;
        $averageTemperatureKelv = ($countKelvin > 0) ? $totalTemperatureKelvin / $countKelvin : null;

        // Passer la moyenne et l'unité à la vue
        return $this->render('moyenne', [
            'averageTemperatureCelc' => $averageTemperatureCelc,
            'averageTemperatureFahr' => $averageTemperatureFahr,
            'averageTemperatureKelvin' => $averageTemperatureKelv, // Passer le modèle pour le formulaire
        ]);
    }
}