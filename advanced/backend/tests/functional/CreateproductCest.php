<?php

namespace backend\tests\functional;

use common\fixtures\UserFixture;
use backend\tests\FunctionalTester;

class CreateproductCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }
    protected function prdformParams($name, $price, $stock,$description,$discount,$categories)
    {
        return [
            'ProductForm[products-name]' => $name,
            'ProductForm[products-price]' => $price,
            'ProductForm[stock]' => $stock,
            'ProductForm[description]' => $description,
            'ProductForm[discount]' => $discount,
            'ProductForm[categories]' => $categories,

        ];
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
     
    public function checkCreateproduct(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('ruifmiguel@hotmail.com', '123456'));
        $I->click('Products');
        $I->See('Create Products');
        $I->click('Create Products');
        $I->See('Price');
       $I->fillField('Name', 'Prancha de teste');
       $I->fillField('Price', '999');
       $I->fillField('Stock', '10');
       $I->fillField('Description', 'Este é uma teste');
       $I->fillField('Discount', '10');
       $I->selectOption('#products-category_id', 'Surf');
        $I-> click('Save');
        
    }
}
