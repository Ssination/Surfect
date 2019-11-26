<?php

namespace backend\controllers;

use Yii;
use backend\models\CategoriesShow;
use backend\models\CategoriesShowSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriesController implements the CRUD actions for CategoriesShow model.
 */
class CategoriesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoriesShow models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('admin')) {
            $searchModel = new CategoriesShowSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Displays a single CategoriesShow model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    { if (Yii::$app->user->can('admin')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    else
    {
        throw new ForbiddenHttpException;
    }
    }

    /**
     * Creates a new CategoriesShow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('admin')) {
            $model = new CategoriesShow();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->category_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing CategoriesShow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->category_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing CategoriesShow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else
        {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the CategoriesShow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CategoriesShow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CategoriesShow::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
