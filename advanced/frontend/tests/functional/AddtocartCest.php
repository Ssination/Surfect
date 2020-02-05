<?php

namespace frontend\tests\functional;

use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;

class AddtocartCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }
    protected function formParams($login, $password)
    {
        return [
            'LoginForm[email]' => $login,
            'LoginForm[password]' => $password,
        ];
    }
    /* 
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array*/
     
    public function checkAddtocart(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('ruifmiguel@hotmail.com', '123456'));
        $I->dontSee('Entrar');
        $I->click('Loja');
        $I->See('Detalhes');
        $I->click('Carrinho');
        $I->See('Atualizar Carrinho');
        
    }
}
