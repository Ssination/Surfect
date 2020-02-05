<?php
namespace frontend\tests\unit\models;
use Yii;
use common\models\LoginForm;
use yii\mail\MessageInterface;
use common\fixtures\UserFixture;

class LoginFormTest extends \Codeception\Test\Unit{
public function _fixtures(){
    return [
        'user' => [
            'class' => UserFixture::className(),
            'dataFile' => codecept_data_dir() . 'user.php'
        ]
    ];
}
public function testInvalidEmail()
{
    $model = new LoginForm([
        'email' => 'ruifmiguelhotmail.com',
        'password'=>'123456'
    ]);

    expect('model should not login user', $model->login())->false();
    expect('error message should be set', $model->errors)->hasKey('password');
    expect('user should be logged in', Yii::$app->user->isGuest)->true();
}
public function testEmailIncorrect()
{
    $model = new LoginForm([
        'email' => 'tester@hotmail.com',
        'password'=>'test'
    ]);

    expect('model should not login user', $model->login())->false();
    expect('error message not should be set', $model->errors)->hasKey('password');
    expect('user should not be logged in', Yii::$app->user->isGuest)->true();
}
public function testLoginIsntCorrect()
{
    $model = new LoginForm([
        'email' => 'ruifmiguel@hotmail.com',
        'password'=> 'test'
    ]);

    expect('model should  login user', $model->login())->false();
    expect('error message  should be set', $model->errors)->hasKey('password');
    expect('user should  be logged in', Yii::$app->user->isGuest)->true();
}
}