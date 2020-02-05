<?php

namespace frontend\controllers;

use app\models\Products;
use app\models\Rating;

class RatingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProduto()
    {
        $model = Products::find()->where(['product_id'])->one();

        return $this->render('_rating', ['product_id'=>$model]);
    }

    public function actionStar()
    {
        $model = Rating::find()->where(['product_id'=>$_POST['id_rating']])->one();
        if(!empty($model)){
            $model->rating=$_POST['rating'];
            if($model->save()){
                return true;
            }
        }
    return false;
    }


}
