<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserShowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Shows';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-show-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Show', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            //'name',
            //'surname',
            //'birth_date',
            //'gender',
            //'phone_number',
            //'height',
            //'weight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
