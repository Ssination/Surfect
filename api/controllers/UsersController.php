<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
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

    //encontrar user
    public function actionGetUser(){
       $email = $_REQUEST['email'];
       $password = $_REQUEST['password'];
       echo $email . $password;
    }


    public function actionRegistation(){
        

       /* $response = array();
        $newuser = new User;


        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);


        if(isset($input['email']) && isset($input['password']) && isset($input['name'])){
            $email = $input['username'];
            $password = $input['password'];
            $name = $input['name'];


            if(!userExists($email)){

                //Get a unique Salt
                $salt         = getSalt();

                //Generate a unique password Hash
                $passwordHash = password_hash(concatPasswordWithSalt($password,$salt),PASSWORD_DEFAULT);

                //Query to register new user
                $insertQuery  = "INSERT INTO member(username, full_name, password_hash, salt) VALUES (?,?,?,?)";
                if($stmt = $con->prepare($insertQuery)){
                    $stmt->bind_param("ssss",$email,$name,$passwordHash,$salt);
                    $stmt->execute();
                    $response["status"] = 0;
                    $response["message"] = "User created";
                    $stmt->close();
                }
            }
            else{
                $response["status"] = 1;
                $response["message"] = "User exists";
            }
        }
        else{
            $response["status"] = 2;
            $response["message"] = "Missing mandatory parameters";
        }
        echo json_encode($response);

        /*$newuser-> email;
        $newuser-> name;
        $newuser-> surname;
        $newuser-> birth_date;
        $newuser-> gender;
        $newuser-> phone_number;
        $newuser-> password;
        $newuser-> height;
        $newuser-> weight;*/
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
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
