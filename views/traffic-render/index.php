<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrafficRenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тарифы-Рендеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traffic-render-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Тариф-Рендер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'header' => 'Время',
                'value' => function ($data) {
                    return $data->time->name;
                },
                'filter' => ''
            ],
            [
                'header' => 'Тип',
                'value' => function ($data) {
                    return $data->type->name;
                },
                'filter' => ''
            ],
            'price',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
