<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        .form-control {
            color:black;
        }

    </style>

</head>
<body>
	
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card_registar">
                    <div class="site-signup">
    <h1>Registar</h1>
    <br>
    <p>Por favor, registe os seguintes campos:</p>

    <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-xs-6">
            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Nome')?>
            <?= $form->field($model, 'gender')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>
            <?= $form->field($model, 'email')?>
            <?= $form->field($model, 'password')->passwordInput()->label('Palavra-passe') ?>


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
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '999-999-999',
            ])->label('Nº de Telemóvel') ?>      

            <div class="form-group">

                    <?= Html::submitButton('Registar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                
            </div>
           

               

                

            <?php ActiveForm::end(); ?>
        
    </div>
</div>
				</div>
				
			
		</div>
	</div>
</body>
</html>