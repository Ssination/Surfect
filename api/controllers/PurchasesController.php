<?php

namespace app\controllers;
use Yii;
use app\models\Purchases;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\IdentityInterface;
use app\models\Products;
use app\models\PurchaseDetails;
class PurchasesController extends ActiveController
{
    public $modelClass = 'app\models\Purchases';

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

    public function actionCompra(){

        $request = Yii::$app->request;
        $email = $request->post('email');
        $preco = $request->post('precoProduto');
        $tamanho = $request->post('tamanhoProduto');
        $quantidade = $request->post('quantidadeProduto');
        $morada = $request->post('morada');
        $produto = $request->post('produto');
        $purchases = new Purchases();
        $payment_id = '1';

        $product = Products::find()
        ->select('products.*')
        ->from('products')
        ->where(['product_id' => $produto])->limit(1)->one();
        $stock = $product->stock - $quantidade;
        $product->stock = $stock;
        $product->save(false);
        $purchases->purchase_date = date('Y-m-d');
        $purchases->address_id = $morada;
        $purchases->email = $email;
        $purchases->payment_id = $payment_id;

        if($purchases->save(false))
        {
            $purchaseDetail = new PurchaseDetails();
            $purchaseDetail->email = $email;
            $purchaseDetail->quantity = $quantidade;
            $purchaseDetail->price = $preco;
            $purchaseDetail->subtotal = $quantidade * $preco;
            $purchaseDetail->size = $tamanho; 
            $purchaseDetail->product_id = $produto;
            $purchaseDetail->purchase_id = $purchases->purchase_id;
            $purchaseDetail->save(false);
        }
   

        

      /* $request = Yii::$app->request;

        $purchases = new Purchases();*/

    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    protected function findModel($id)
    {
        if (($model = Purchases::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
