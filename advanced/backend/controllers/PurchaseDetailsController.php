<?php

namespace backend\controllers;

use yii\web\ForbiddenHttpException;

class PurchaseDetailsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->can('admin')) {
            return $this->render('index');
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

}
