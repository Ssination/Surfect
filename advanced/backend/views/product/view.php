<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($model->name) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'name',
            'price',
            'stock',
            'description',
            [
                'attriute'=>'photo',
                'value'=> Yii::getAlias('@productsUrl').'/'.$model->photo,
                'label'=> 'Imagem',
                'format'=>['image',['width'=>'100','height'=>'100']]
            ],
            'discount',
            [
                'attribute' => 'pvp',
                'value' => ($model->price - ($model->price * $model->discount) / 100),
            ],
            'category_id',
            array(
                'attribute' => 'category.name',
                'label' => 'Category'
            ),                      
        ],
    ]) ?>

</div>
