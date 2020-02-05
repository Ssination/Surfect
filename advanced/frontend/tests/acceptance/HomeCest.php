<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(\yii\helpers\Url::toRoute(['/']));
        //$I->seeLink('Entrar');

       // $I->seeLink('Registar');
      //  $I->click('Entrar');
        $I->wait(2); // wait for page to be opened
        $I->see('Entrar');
        $I->wait(2);
        $I->click('Entrar');
        $I->see('Login');
        $I->fillField('#loginform-email','ruifmiguel@hotmail.com');
        $I->wait(2);
        $I->fillField('#loginform-password','123456');
        $I->click('Entra');
        $I->wait(10);
        $I->see('Perfil');
    }
}
