<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriesShow */

$this->title = 'Create Categories';
$this->params['breadcrumbs'][] = ['label' => 'Categories Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-show-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
