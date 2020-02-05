<?php

namespace frontend\modules\shop\controllers;
use app\models\Products;
use yii\db\Exception;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;
use Yii;
use yii\db\Expression;

class ProductController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $model = $this->findModel($id);
        $related_product = new ActiveDataProvider([
            'query'=>Products::find()->where(['category_id' => $model->category_id])->limit(4)->orderBy(new Expression('rand()')),
            'pagination'=>false,
        ]);
        return $this->render('detail', [
            'model' => $model,
            'related_product' => $related_product,
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    protected function findModel($id){
        $model = Products::findOne($id);
        if(!$model){
            throw  new ForbiddenHttpException("Error Processing Request", 1);
        }
        return $model;
    }

}
