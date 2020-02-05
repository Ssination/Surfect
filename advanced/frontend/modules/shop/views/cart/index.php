<?php
$this->title = 'Carrinho de Compras';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <!DOCTYPE html>
    <html lang="pt">

    <head>
        <style>
            body {
                color:white !important;
            }
            td{
                color:black !important;

            }

        </style>
    </head>
    <body>
    <br>
    <br>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <?php if (!empty(Yii::$app->session['cart'])){ ?>
                    <?php $form = ActiveForm::begin() ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (Yii::$app->session['cart'] as $id => $qty) {
                                $product = $this->context->findProduct($id); ?>
                                <tr>
                                    <td><?=$product->name ?></td>
                                    <td><?=Html::textInput($id, $qty, ['class'=>'from-control', 'size'=>1, 'maxlength'=>2]) ?></td>
                                    <td><?=number_format($product->price * $qty, 2)  ?> €</td>
                                </tr>
                            <?php } ?>
                                <tr>
                                    <td></td>
                                    <td><?= $totalItems ?></td>
                                    <td><?=number_format($totalPrice, 2)?> € </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><?=Html::a('Continuar', ['/store/index'], ['class'=>'btn btn-success']) ?></div>
                        <div class="col-sm-6 text-right"><?=Html::submitButton('Atualizar Carrinho', ['class'=>'btn btn-warning']) ?></div>
                    </div>
                    <?php ActiveForm::end() ?>
                <?php } ?>
            </div>
        </div>
    </body>
    </html>
















































