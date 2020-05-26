<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrafficSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тарифы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traffic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание Тарифа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'header' => 'Тариф Рендер',
                'format' => 'html',
                'value' => function($data) {
                    return Html::a($data->render->name, ['/traffic-render/view?id=' . $data->render->id]);
                }
            ],
            [
                'header' => 'Цена',
                'format' => 'raw',
                'value' => function($data) {
                    if($data->discount) {
                        return $data->discPrice . '(скидка)';
                    } else {
                        return $data->render->price;
                    }
                }
            ],
            [
                'header' => 'Активный ли тариф',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->is_archived ? "true" : "false";
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
