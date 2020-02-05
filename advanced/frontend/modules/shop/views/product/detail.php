<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">

</script>


<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\base\Widget;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <style>
        body {
            color:white !important;
        }
        li> a{
            color:white !important;
        }
        li.active > a{
            color:black !important;
        }
        a:hover{
            color:#101010 !important;
        }

    </style>
</head>
<body>
<br>
<br>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="row">
            <div class="col-md-6">
                <?= Html::img(Yii::getAlias('@productsUrl').'/'.$model->photo, ['/shop/product/detail', 'id' => $model->product_id, 'class'=>'img-responsive','width'=>'100%','style'=>'height:60%;']) ?>
                <br>
                <?= Html::a('<img src="../web/img/carrinho2.png" height="50 !important"   alt="Carrinho">	', ['/shop/cart/add', 'id' => $model->product_id], ['class'=>'btn btn-sm pull-right' ]) ?>
               <!--  Html::a('<img src="../web/img/wishlist.png" height="50 !important"   alt="Lista de desejo">	', ['/shop/product/wishlist', 'id' => $model->product_id], ['class'=>'btn btn-sm pull-right' ]) -->

            </div>

            <div class="col-md-6">
                <h1><?=$this->title ?></h1>
                <h2><?=Html::encode($model->price) ?> €</h2>
                <?= HtmlPurifier::process($model->description) ?>
                <hr/>

                <?=Tabs::widget([
                        'items'=> [
                        [
                            'label' => 'Detalhe',
                            'content'=> HtmlPurifier::process($model->description),
                            'active'=>true
                        ],
                            [
                                'label' => 'Avaliação',
                                'content'=>  $this->render('_rating'),
                                'options'=>['id'=>'sdfsdawdqwdwdawdawdfs'],
                            ],
                       ],
                ]) ?>
            </div>
        </div>
        <hr />
        <div class="text-center"><h1>Produtos Relacionados</h1></div>
            <div class="row">
                <div class="col-4">

                    <div class="row">
                        <?=ListView::widget([
                            'dataProvider' => $related_product,
                            'summary' => false,
                            'itemView' => '_product'
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-3">
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                        </button>
                        <h5 class="modal-title" id="nome">Modal title</h5>

                        <p id="produtoNome" style="text-align: center;color:black!important;margin-top:10px" ></p>
                    </div>
                    <div class="modal-body">

                        <img class="card-img-top" src="../web/img/surf.jpg" width="565"  alt="Card image cap">

                        <p id="preco" style="text-align: center;color:black!important;margin-top:10px" ></p>
                        <p id="descricao" style="text-align: center;color:black!important;margin-top:10px"></p>

                        <p></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    $('.botao').on("click",function(){
        $('#exampleModalCenter').appendTo("body").modal('show');
        var preco =  $(this).attr('data-price')+" €";
        var descricao =  $(this).attr('data-descricao');
        var nome =  $(this).attr('data-name');

        $("p" ).empty();
        $('#produtoNome').append(nome);
        $('#preco').append(preco);
        $('#descricao').append(descricao);
    });
</script>

</body>
</html>

