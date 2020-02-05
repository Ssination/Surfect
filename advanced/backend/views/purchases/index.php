<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PurchasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Purchases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered' => true,
   'striped' => false,
   'condensed' =>true ,
   'responsive' =>true,
   'hover' => true,
   'showPageSummary' => false,
   'panel' => [
       'type' => GridView::TYPE_PRIMARY,
       'heading' => true,
   ],
   'persistResize' => false,
   'toggleDataOptions' => ['minCount' => 10],
   'exportConfig' => true,
   'itemLabelSingle' => 'product',
   'itemLabelPlural' => 'products',
        'toolbar' =>  [
            [
                'content' =>
                   
                    Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
                        'class' => 'btn btn-outline-secondary',
                       // 'title'=>Yii::t('kvgrid', 'Reset Grid'),
                        'data-pjax' => 0, 
                    ]), 
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        'columns' => [
           
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                // uncomment below and comment detail if you need to render via ajax
                // 'detailUrl'=>Url::to(['/site/book-details']),
                'detail' => function ($model, $key, $index, $column) {
                    return Yii::$app->controller->renderPartial('view', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'] ,
                'expandOneOnly' => true
            ],

            'purchase_id',
            'purchase_date',
            'address_id',
            'email:email',
            'payment_id',

           // ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
