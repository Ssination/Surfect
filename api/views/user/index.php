<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
