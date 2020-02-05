<?php

namespace app\controllers;

use app\models\Products;
use yii\rest\ActiveController;
use yii\web\Controller;

class ProductsController extends ActiveController
{
    public $modelClass = 'app\models\Products';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSurf(){
        $produtos = Products::find()
            ->select('products.*')
            ->leftJoin('categories', '`categories`.`category_id` = `products`.`category_id`')
            ->where(['products.category_id' => 1])
            ->orderBy(['product_id'=>SORT_DESC])
            ->asArray()
            ->all();

        return $produtos;
    }

    public function actionRoupa(){
        $produtos = Products::find()
            ->select('products.*')
            ->leftJoin('categories', '`categories`.`category_id` = `products`.`category_id`')
            ->where(['products.category_id' => 2])
            ->orderBy(['product_id'=>SORT_DESC])
            ->asArray()
            ->all();

            return $produtos;
    }

    public function actionAcessorios(){
        $produtos = Products::find()
            ->select('products.*')
            ->leftJoin('categories', '`categories`.`category_id` = `products`.`category_id`')
            ->where(['products.category_id' => 3])
            ->orderBy(['product_id'=>SORT_DESC])
            ->asArray()
            ->all();

            return $produtos;
    }
}
