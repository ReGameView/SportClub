<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupJob */

$this->title = 'Создать Групповое занятие';
$this->params['breadcrumbs'][] = ['label' => 'Group Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-job-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
