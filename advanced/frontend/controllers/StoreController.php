<?php

namespace frontend\controllers;

use Yii;
use app\models\Products;
use frontend\models\StoreSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * StoreController implements the CRUD actions for Products model.
 */
class StoreController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $query = Products::find();

        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $products = $query->orderBy(['product_id'=>SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        $dataProviderProduct = new ActiveDataProvider([
            'query' => $products
        ]);

         return $this->render('index', [
             'dataProviderProduct' => $dataProviderProduct,
             'pagination' => $pagination,
        
             ]); 
            

       /* if (Yii::$app->user->can('view.store')) {
            $searchModel = new StoreSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


             return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }*/
        }




    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


  


    public function actionView($id)
    {
        
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        
    }



    public function actionMyAction() {
        if (Yii::app()->request->isAjaxRequest) {
    
            // to avoid jQuery and other core scripts from loading when the fourth parameter of renderPartial() is TRUE.
            // this is useful if you want another ajaxButton in the modal or anything with scripts.
            // http://www.yiiframework.com/forum/index.php/topic/5455-creating-ajax-elements-from-inside-ajax-request/page__p__30114#entry30114
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
        
            $body = $this->renderPartial('_loadContent', array(
                'label' => 'Success!',
            ), true, true); // processOutput
    
            echo CJSON::encode(array(
                // this will be used in the Modal header
                'header' => 'Success! Modal was opened',
    
                // this will be used in the Modal body
                'body' => $body,
            ));
            exit;
        }
        else
            throw new CHttpException('403', 'Forbidden access.');
    }


    public function actionViewImage($id)

	{
       
            $model = $this->loadModel($id);

            

            echo $model->name; // This works and is displaying the name inside the modal
        
            //echo $model; // this one does throw an error
       
	}




    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /* public function actionUpdate($id)
    {
        if (Yii::$app->user->can('create.purchase')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->product_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }
*/
    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
