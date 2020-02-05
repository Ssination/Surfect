<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('Inicio');
        $I->seeLink('Entrar');
        $I->click('Entrar');
        $I->see('Login');
    }
}