<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use kartik\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
    
<head>
    <style>
        .form-control {
            color:black;
        }

    </style>

</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../web/img/logo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<!--<form action="">-->
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="input-group mb-3 links">
							<h2>Login</h2>
						</div>
                         
						<div class="input-group mb-3">
							<div class="input-group-append">
							
							</div>                            
							<!--<input type="text" name="" class="form-control input_user" value="" placeholder="Email">-->
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'maxlength' => 50, 'type'=>'text', 'class' => 'form-control input_user', 'placeholder' => 'Email'])->label(false); ?>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
						
							</div>
							<!--<input type="password" name="" class="form-control input_pass" value="" placeholder="Password">-->
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 50, 'type'=>'password', 'class' => 'form-control input_pass', 'placeholder' => 'Password'])->label(false); ?>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<!--<input type="checkbox" class="custom-control-input" id="customControlInline">-->
                                <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'color:white']])->checkbox() ?>
                                <!--<label class="custom-control-label" for="customControlInline">Lembrar-me</label>-->
							</div>
                           
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
                     <?= Html::submitButton('Entra', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
				   </div>
                   <?php ActiveForm::end(); ?>
					<!--</form>-->
				</div>
				<br>
				<br>
				<div class="mt-4">
				<br>
					<div class="d-flex justify-content-center links">
						Não tens conta? <a href="#" class="ml-2">Regista-te</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Esqueces-te a password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>