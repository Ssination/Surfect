<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .form-control {
        color:black;
    }

</style>

<div class="d-flex justify-content-center h-100">
    <div class="user_card_registar">
        <div class="site-signup">
            <h1>Editar dados</h1>
            <br>
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-xs-6">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Nome')?>
                    <?= $form->field($model, 'gender')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => ''])
                    ->label('Género')?>
                    <?= $form->field($model, 'email')->textInput([
                        'readonly' => true,
                    ]);?>


                    <?= $form->field($model, 'birth_date')->widget(
                        DatePicker::className(), [
                        'inline' => true,
                        'template' => '<div class="well well-sm" style="background-color: #fff; width:270px">{input}</div>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label('Data de Nascimento');?>


                </div>

                <div class="col-xs-6">
                    <?=$form->field($model, 'surname')->textInput( ['autofocus'=>true])->label('Apelido') ?>

                    <?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '999-999-999',
                    ])->label('Nº de Telemóvel') ?>

                    <?= $form->field($model, 'height')->textInput()->label('Altura') ?>

                    <?= $form->field($model, 'weight')->textInput(['maxlength' => true])->label('Peso') ?>
                    <div class="form-group">

                        <?= Html::submitButton('Alterar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                </div>






                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


</div>
</div>

