<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupJob */

$this->title = 'Обновить Групповое занятие: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Групповое занятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="group-job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
