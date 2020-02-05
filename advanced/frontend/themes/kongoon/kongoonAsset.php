<?php
namespace frontend\themes\kongoon;

use yii\web\AssetBundle;

class KongoonAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/kongoon/assets';
    public $css = [
        'css/bootstrap.css'
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        ];
}