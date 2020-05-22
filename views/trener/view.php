<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = $model->getFIO();
$this->params['breadcrumbs'][] = ['label' => 'Тренера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trener-view">

    <h1><?= Html::encode($model->getFIO()) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить тренера?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'double_name',
            'patronymic',
            'sex',
            'avatar',
            'phone_number',
            'email:email',
            'information:ntext',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
