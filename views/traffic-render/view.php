<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficRender */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тарифы-Рендеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="traffic-render-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить Рендер?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'Время',
                'value' => function ($data) {
                    return $data->time->name;
                },
            ],
            [
                'attribute' => 'Тип',
                'value' => function ($data) {
                    return $data->type->name;
                },
            ],
            'price',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
