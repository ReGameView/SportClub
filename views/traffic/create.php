<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Traffic */

$this->title = 'Создание Тарифа';
$this->params['breadcrumbs'][] = ['label' => 'Тариф', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traffic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
