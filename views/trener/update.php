<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = 'Изменение Тренера: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тренер', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="trener-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
