<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use kartik\widgets\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
    
<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
        /* Coded with love by Mutiullah Samim */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #60a3bc !important;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #143046;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}

        .custom-control-label{
            color: white !important
        }

        .form-control {
            min-width: 220;
            width: 255px !important;
            color:red;
        }

        .links{
            color: white !important
        }

		.brand_logo_container {
			position: absolute;
			/*height: 170px;
			width: 170px;*/
			top: -75px;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
            background-color: #60a3bc !important;
			border: 1px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #09EFE3 !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #09EFE3 !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #09EFE3 !important;
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
						<img src="../web/image/logo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<!--<form action="">-->
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="input-group mb-3 links">
							<h2>Área do Administrador</h2>
						</div>
                         
						<div class="input-group mb-3">
							<div class="input-group-append">
							
							</div>                            
							<!--<input type="text" name="" class="form-control input_user" value="" placeholder="Email">-->
                            <?= $form->field($model, 'email')->textInput(['maxlength' => 50, 'type'=>'text', 'class' => 'form-control input_user', 'placeholder' => 'Email'])->label('Email'); ?>
                           
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
						
							</div>
							<!--<input type="password" name="" class="form-control input_pass" value="" placeholder="Password">-->
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 50, 'type'=>'password', 'class' => 'form-control input_pass', 'placeholder' => 'Password'])->label('palavra passe'); ?>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<!--<input type="checkbox" class="custom-control-input" id="customControlInline">-->
                                <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'color:white']])->checkbox() ?>
                                <!--<label class="custom-control-label" for="customControlInline">Lembrar-me</label>-->
							</div>
                           
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
                     <?= Html::submitButton('Entrar', ['class' => 'btn login_btn', 'name' => 'login-button']) ?>
				   </div>
                   <?php ActiveForm::end(); ?>
					<!--</form>-->
				</div>
		
				<div class="mt-4">
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