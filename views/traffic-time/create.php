<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficTime */

$this->title = 'Создать Тариф-Время';
$this->params['breadcrumbs'][] = ['label' => 'Тариф-Время', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traffic-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
