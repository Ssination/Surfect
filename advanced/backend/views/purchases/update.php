<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Purchases */

$this->title = 'Update Purchases: ' . $model->purchase_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_id, 'url' => ['view', 'id' => $model->purchase_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
