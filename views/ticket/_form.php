<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Client;
use app\models\Traffic;
use app\models\TrafficRender;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->dropDownList(ArrayHelper::map(Client::find()->asArray()->all(), 'id', 'first_name'), [
        'prompt' => 'Выберите клиента'
    ]) ?>

    <?= $form->field($model, 'id_traffic')->dropDownList(ArrayHelper::map(Traffic::find()->asArray()->all(), 'id', 'name'), [
        'prompt' => 'Выберите тариф'
    ]) ?>

<!--    --><?//= $form->field()->dropDownList(['1_month' => '1 Месяц', '2_month' => '2 месяца', '3_month' => '3 месяца']) ?>
<!---->
<!---->
    <?= $form->field($model, 'price')->textInput(['disabled' => true, 'value' => 0]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script>
    document.getElementById('ticket-id_traffic').addEventListener('change', ev => {
        // TODO:: Ценик
    });
</script>
