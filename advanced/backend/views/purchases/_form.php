<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Purchases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchases-form">

    <?php $form = ActiveForm::begin(); ?>




    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
    $purchase_pay = \app\models\Purchases::find()->all();
    $listData=ArrayHelper::map($purchase_pay,'payment_id','payment_id');
    ?>

    <?= $form->field($model, 'payment_id')->dropDownList($listData,['prompt'=>'']) ?>

    <?php
    $purchase_adress = \app\models\Purchases::find()->all();
    $listData=ArrayHelper::map($purchase_adress,'adress_id','adress_id');
    ?>

    <?= $form->field($model, 'adress_id')->dropDownList($listData,['prompt'=>'']) ?>

    <?= $form->field($model, 'purchase_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
