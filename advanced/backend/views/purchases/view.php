<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Purchases */

$this->title = 'Darkzone purchases';
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="purchases-view">

    <h1><?= Html::encode('Purchase '.$model->purchase_id) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->purchase_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->purchase_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html:: a('Details',['details', 'id' => $model->purchase_id],['class' => 'btn btn-primary'])
        ?>
    </p>
    <?php

    ?>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchase_id',
            'purchase_date',
            //'adress_id',
            'email:email',
            'payment_id',
        ],
    ]) ?>

</div>
