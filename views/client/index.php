<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'FullName',
                'header' => 'ФИО',
                'value' => function($data) {
                    return $data->FullName;
                },
//                'filter' => Html::activeDropDownList(
//                    $searchModel,
//                    'fullName',
//                    ArrayHelper::map(, 'id', 'fullName')
//                )
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
            //'avatar',
            'phone_number',
            'email:email',
            'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
