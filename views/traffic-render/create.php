<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficRender */

$this->title = 'Создать рендер';
$this->params['breadcrumbs'][] = ['label' => 'Тарифы-Рендеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traffic-render-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
