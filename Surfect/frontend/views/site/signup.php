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
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])?>
                <?=$form->field($model, 'surname')->textInput( ['autofocus'=>true]) ?>
                <?= $form->field($model, 'female')->checkbox() ?>
                <?= $form->field($model, 'male')->checkbox() ?>

                <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '999-999-999',
            ]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

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

                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
