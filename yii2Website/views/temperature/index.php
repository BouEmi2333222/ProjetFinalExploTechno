<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Temperatures</h1>
<ul>
<?php foreach ($temperatures as $temperature): ?>
    <li>
        <?= $temperature->tempCelc ?>:
        <?= $temperature->tempFahr ?>:
        <?= $temperature->tempKelv ?>:
        <?= $temperature->dateEnregistre ?>
</li>
<?php endforeach;?>
</ul>

