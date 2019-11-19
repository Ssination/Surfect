<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->email], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'auth_key',
           // 'password_hash',
           // 'password_reset_token',
            'email:email',
           // 'status',
           // 'created_at',
          //  'updated_at',
           // 'verification_token',
            'name',
            'surname',
            'birth_date',
            'gender',
            'phone_number',
            'height',
            'weight',
        ],
    ]) ?>

</div>
