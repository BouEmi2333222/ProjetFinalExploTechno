<?php
/* @var $this yii\web\View */
/* @var $averageTemperature float|null */
/* @var $unit string */
/* @var $model yii\base\DynamicModel */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Moyenne des Températures';
?>

<div class="site-index">

    <h1>Moyenne des températures du <?= date('d/m/Y') ?></h1>

    <!-- Tableau pour afficher les moyennes -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Unité</th>
                <th>Moyenne de la Température</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Celsius (°C)</td>
                <td><?= Html::encode($averageTemperatureCelc !== null ? number_format($averageTemperatureCelc, 2) : 'Aucune donnée') ?></td>
            </tr>
            <tr>
                <td>Fahrenheit (°F)</td>
                <td><?= Html::encode($averageTemperatureFahr !== null ? number_format($averageTemperatureFahr, 2) : 'Aucune donnée') ?></td>
            </tr>
            <tr>
                <td>Kelvin (K)</td>
                <td><?= Html::encode($averageTemperatureKelvin !== null ? number_format($averageTemperatureKelvin, 2) : 'Aucune donnée') ?></td>
            </tr>
        </tbody>
    </table>
</div>
