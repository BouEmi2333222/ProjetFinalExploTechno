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

    <h1>Moyenne des températures du <?= date('d/m/Y') ?> (<?= Html::encode($unit == 'tempCelc' ? 'Celsius' : ($unit == 'tempFahr' ? 'Fahrenheit' : 'Kelvin')) ?>)</h1>

    <!-- Formulaire pour sélectionner l'unité -->
    <div>
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['temperature/index'],
        ]); ?>

        <?= $form->field($model, 'unit')->dropDownList([
            'tempCelc' => 'Celsius',
            'tempFahr' => 'Fahrenheit',
            'tempKelv' => 'Kelvin'
        ], ['prompt' => 'Choisir l\'unité']) ?>

        <div class="form-group">
            <?= Html::submitButton('Voir la moyenne', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <!-- Affichage de la moyenne -->
    <?php if ($averageTemperature !== null): ?>
        <p>La moyenne des températures de la journée est : <?= Html::encode(number_format($averageTemperature, 2)) ?> 
            <?= Html::encode($unit == 'tempCelc' ? '°C' : ($unit == 'tempFahr' ? '°F' : 'K')) ?></p>
    <?php else: ?>
        <p>Aucune donnée de température pour aujourd'hui.</p>
    <?php endif; ?>

</div>
