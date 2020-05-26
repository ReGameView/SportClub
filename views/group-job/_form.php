<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker as DateTimePicker;
use yii\helpers\ArrayHelper;

use app\models\Trener;
use app\models\Hall;


/* @var $this yii\web\View */
/* @var $model app\models\GroupJob */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="group-job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'time')->textInput() ?>
<!--    -->
<!--    --><?//= $form->field($model, 'time')->widget('DateTimePicker', [
//        'name' => 'dp_1',
//        'type' => DateTimePicker::TYPE_INPUT,
//        'value' => '23-Feb-1982 10:10',
//        'pluginOptions' => [
//            'autoclose'=>true,
//            'format' => 'dd-M-yyyy hh:ii'
//        ]
//    ]); ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'id_trener')->dropDownList(ArrayHelper::map(Trener::find()->asArray()->all(), 'id', 'double_name')) ?>

    <?= $form->field($model, 'id_hall')->dropDownList(ArrayHelper::map(Hall::find()->asArray()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
