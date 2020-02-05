<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

 <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height: 375px;">
        <?= Html::a(Html::img(Yii::getAlias('@productsUrl').'/'.$model->photo, ['/shop/product/detail', 'id' => $model->product_id, 'class'=>'img-responsive','width'=>'98%','style'=>'height:70%;']))  ?>
        <div class="caption">
            <?= Html::a("$model->name", ['/shop/product/detail', 'id' => $model->product_id], ['class' => 'profile-link']) ?>
            <h4 style="color: #1b3f5f!important;"><?= $model->price ?>€</h4>  <!-- Preço real necessario -->
                <!-- Button trigger modal -->
            <a type="button"  class="btn btn-primary botao" data-name="<?php echo $model->name;?>" data-price="<?php echo $model->price;?>" >
            Detalhes
            </a>
            <?= Html::a('<img src="../web/img/carrinho.png" height="22 !important" width="22"   alt="Carrinho">	', ['/shop/cart/add', 'id' => $model->product_id], ['class'=>'btn btn-sm pull-right' ]) ?>



        </div>
    </div>
</div>