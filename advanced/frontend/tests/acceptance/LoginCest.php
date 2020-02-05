<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
   
    public function checkLoginome(AcceptanceTester $I)
    {
        $I->amOnPage(\yii\helpers\Url::toRoute(['//login']));
        $I->wait(2); // wait for page to be opened
        $I->see('Entrar');
        $I->fillField('#loginform-email','ruifmiguel@hotmail.com');
        $I->fillField('#loginform-password','123456');
        $I->click('Entra');
        $I->see('Perfil');
        $i->wait(10);
    }
}
