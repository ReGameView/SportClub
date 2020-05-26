<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = 'Завести покупку абонемента';
$this->params['breadcrumbs'][] = ['label' => 'Абонемент', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
