<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = 'Создание Тренера';
$this->params['breadcrumbs'][] = ['label' => 'Тренер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trener-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
