<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserShow */

$this->title = 'Update User Show: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->email]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-show-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
