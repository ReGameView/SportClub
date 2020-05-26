<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Абонементы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Завести покупку абонемента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'header' => '#Клиент',
                'format' => 'url',
                'value' => function($data) {
                    return Html::a($data->client->getFullName(), ['/client/view?id='. $data->client->id]);
                },
//                'filter' => Filter
            ],
            [
                'header' => '#Тариф',
                'format' => 'url',
                'value' => function($data) {
                    return Html::a($data->traffic->name, ['/traffic/view?id='. $data->client->id]);
                },
//                'filter' => Filter
            ],
            'price',
            'created_at',
            'expirated_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
