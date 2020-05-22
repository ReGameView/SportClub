<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrenerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тренера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trener-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание Тренера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'FIO',
                'header' => 'ФИО Тренера',
                'content' => function($data) {
                    return $data->getFIO();
                },
            ],
            [
                'attribute' => 'sex',
                'value' => function($data) {
                    if($data->sex == 'М') {
                        return "Мужчина";
                    } else {
                        return "Женщина";
                    }
                },
                'filter' => Html::activeDropDownList($searchModel, 'sex', ["М" => "Мужчина", "Ж" => "Женщина"],['class'=>'form-control','prompt' => 'Пол'])
            ],
            'phone_number',
            'email:email',
            //'information:ntext',
            'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
