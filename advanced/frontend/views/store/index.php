<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>

<?php



use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\base\Widget;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<body>
<div class="products-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?php Pjax::begin() ?>
        <div class="row">
            <div class="col-4">
                <h1>PRODUTOS</h1>

                <div class="row">
                    <?=ListView::widget([
                        'dataProvider' => $dataProviderProduct,
                        'summary' => false,
                        'itemView' => '_product'
                    ]) ?>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        <?php Pjax::end(); ?>
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
                    <p></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.botao').on("click",function(){
            $('#exampleModalCenter').appendTo("body").modal('show');
            var preco =  $(this).attr('data-price');
            var nome =  $(this).attr('data-name');

            $("p" ).empty();
            $('#produtoNome').append(nome);
            $('#preco').append(preco);
        });
    </script>

</div>
</body>
    <!-- Modal-->


