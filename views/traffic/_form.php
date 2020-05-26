<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TrafficRender;

/* @var $this yii\web\View */
/* @var $model app\models\Traffic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traffic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_render')->dropDownList(ArrayHelper::map(TrafficRender::find()->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'discount')->checkbox() ?>

    <?= $form->field($model, 'discDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discExpiration')->textInput() ?>

    <?= $form->field($model, 'discPrice')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    document.getElementById('traffic-discdescription').parentElement.style.display = "none";
    document.getElementById('traffic-discexpiration').parentElement.style.display = "none";
    document.getElementById('traffic-discprice').parentElement.style.display = "none";

    document.getElementById('traffic-discount').addEventListener('click', ev => {
        if(ev.target.checked) {
            document.getElementById('traffic-discdescription').parentElement.style.display = "block";
            document.getElementById('traffic-discexpiration').parentElement.style.display = "block";
            document.getElementById('traffic-discprice').parentElement.style.display = "block";
        }else {
            document.getElementById('traffic-discdescription').parentElement.style.display = "none";
            document.getElementById('traffic-discexpiration').parentElement.style.display = "none";
            document.getElementById('traffic-discprice').parentElement.style.display = "none";
        }
    })
</script>
