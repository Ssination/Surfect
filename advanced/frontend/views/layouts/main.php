<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    $carrinho = Html::a('<img src="../web/img/carrinho2.png" height="50 !important"');

    NavBar::begin([
        'brandLabel' => Html::img('../web/img/logo.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


    if (Yii::$app->user->isGuest) {

        $menuItems = [

            ['label' => 'Inicio', 'url' => ['/site/index']],
            /*['label' => 'Sobre', 'url' => ['/site/about']],
            ['label' => 'Apoio', 'url' => ['/site/contact']],*/
            ['label' => 'Entrar', 'url' => ['/site/login']],
            ['label' => 'Registar', 'url' => ['/site/signup']],

        ];
    } else {
        $menuItems = [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Perfil', 'url' => ['/user/update']],
            ['label' => 'Loja', 'url' => ['/store/index']],
            ['label' => Html::img('../web/img/carrinho3.png', ['alt'=>Yii::$app->name, 'height'=>"21 !important"]), 'url' => ['/shop/cart/index']],
            ['label' => 'Apoio', 'url' => ['/site/contact']],

        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Sair(' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

   <div class="container">
        <?= Breadcrumbs::widget([

        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode('Surfect') ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>