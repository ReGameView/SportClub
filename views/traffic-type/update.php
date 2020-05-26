<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficType */

$this->title = 'Обновить Тариф-Тип: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тариф-Тип', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="traffic-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
