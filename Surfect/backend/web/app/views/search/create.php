<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserShow */

$this->title = 'Create User Show';
$this->params['breadcrumbs'][] = ['label' => 'User Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-show-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
