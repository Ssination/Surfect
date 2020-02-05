<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchasesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'purchase_id') ?>

    <?= $form->field($model, 'purchase_date') ?>

    <?= $form->field($model, 'address_id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'payment_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
