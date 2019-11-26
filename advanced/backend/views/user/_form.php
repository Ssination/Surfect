<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'surname')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999',])?>
    <?= $form->field($model, 'birth_date')->widget(
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
