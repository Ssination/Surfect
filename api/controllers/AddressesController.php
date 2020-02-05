<?php

namespace app\controllers;

use Yii;
use app\models\Addresses;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\IdentityInterface;
use yii\helpers\Json;

class AddressesController extends Controller
{
    //public $modelClass = 'app\models\Addresses';


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


    public function actionAddress()
    {
        $request = Yii::$app->request;

        $address = new Addresses();

        //
        $address_name = $request->post('morada');
        $zip_code = $request->post('codigoPostal');
        $country = $request->post('pais');
        $district = $request->post('distrito');
        $email = $request->post('email');

        $address->address_name = $address_name;
        $address->zip_code = $zip_code;
        $address->country = $country;
        $address->district = $district;
        $address->email = $email;

        if($address->save()){
            echo "Informações de envio atualizadas com sucesso!";
        } else {
            echo "Não atualizado! Tente outra vez!";
        }

        $request = Yii::$app->request;

        $address = new Addresses();

    }

    public function actionMoradas(){
        $request = Yii::$app->request;

        $email = $request->post('email');
        $result = Addresses::find()->where(['email' => $email])->all();
        return Json::encode(array("data"=> $result));
       

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Addresses::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Addresses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}