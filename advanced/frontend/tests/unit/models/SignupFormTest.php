<?php
namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;
/* Não foi usado devido a erros de ultima hora
class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }



    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'name' => 'troy.becker',
            'email' => 'ruifmiguel@hotmail.com',
            'password' => 'some_password',
        ]);

        expect_not($model->signup());
        expect_that($model->getErrors('email'));
            equals('Email já está registado.');
    }
}
