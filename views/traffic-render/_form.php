<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TrafficTime;
use app\models\TrafficType;

/* @var $this yii\web\View */
/* @var $model app\models\TrafficRender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traffic-render-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_type')->dropDownList(ArrayHelper::map(TrafficType::find()->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'id_time')->dropDownList(ArrayHelper::map(TrafficTime::find()->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
