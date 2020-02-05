<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\IdentityInterface;
use yii\helpers\Json;
//use yii\rest\ActiveController;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    //public $modelClass = 'app\models\User';
    /**
     * {@inheritdoc}
     */
   

    public function actionRegist(){

        $request = Yii::$app->request;

        $user = new User();

        $name = $request->post('primeiroNome');
        $surname = $request->post('ultimoNome');
        $email = $request->post('email');
        $password = $request->post('password');
        $birth_date = $request->post('dataDeNascimento');
        $phone_number = $request->post('numeroTelemovel');
        $gender = $request->post('generoMasculino');

        $userEmail = User::findByEmail($email);

        if($userEmail != null)
        {
            echo "O email que inseriu já está associado a outra conta!";
        }
        else
        {
            $user->email = $email;
            $user->name = $name;
            $user->surname = $surname;
            $user->birth_date = $birth_date;
            $user->phone_number = $phone_number;
            $user->gender = $gender;
            $user->password_hash = $password;

            if ($user->save(false)){
                return "Registado com sucesso!";
            }
            else{
                echo "Não foi efetaudo o registo, tente outra vez!";
            }
        }

        $request = Yii::$app->request;

        $user = new User();

    }

    public function actionLogin()
    {
        $request = Yii::$app->request;

        $user = new User();

        $email = $request->post('email');
        $password = $request->post('password');

        $user = User::findByEmail($email);

        if ($user != null)
        {
            if ($password == $user->password_hash)
            {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                //return 'Entrou com sucesso, bem-vindo!';
                return array('status'=>true,'users'=>$user);
            }
            else
            {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return 'A password não corresponde ao email!';
            }
        }
        else
        {
            return 'O email que inseriu não está registado no sistema!';
        }

    }

    public function actionUpdateuser(){

        $request = Yii::$app->request;

        $user = new User();
        //
        $email = $request->post('email');
        $password = $request->post('password');
        $birth_date = $request->post('dataDeNascimento');
        $phone_number = $request->post('numeroTelemovel');
        $gender = $request->post('generoMasculino');
        $weight = $request->post('peso');
        $height = $request->post('altura');
        
        $userEmail = User::findByEmail($email);
        $pass = $userEmail->password_hash;

        if($userEmail!=null)
        {
            $userEmail->birth_date=$birth_date;
            $userEmail->phone_number=$phone_number;
            $userEmail->gender=$gender;
            if (empty($password))
            {
                $userEmail->password_hash=$pass;
            }
            else
            {
                $userEmail->password_hash=$password;
            }
            $userEmail->height=$height;
            $userEmail->weight=$weight;
        }
        else
        {
            echo "email não existe";
        }
            
        if ($userEmail->save(false)){

            echo "Perfil do utilizador editado com sucesso!";
        }
        else{
             echo "Utilizador não editado";
        }
        
        $request = Yii::$app->request;

        $user = new User();
    } 

    public function actionShow(){
        //TODO
    }

    public function actionLogout(){
        Yii::$app->user->logout();
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}