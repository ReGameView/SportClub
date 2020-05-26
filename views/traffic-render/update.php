<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficRender */

$this->title = 'Обновление Тарифа-Рендера: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тарифы-Рендеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="traffic-render-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
