<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Apoio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="site-contact">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            Se necessita de ajuda entre em contacto conosco.
        </p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'subject')->label('Assunto') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Descrição') ?>

                    <?= $form->field($model, 'verifyCode')->label('Código de verificação')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submeter', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>