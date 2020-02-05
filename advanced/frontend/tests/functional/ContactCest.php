<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

/* @var $scenario \Codeception\Scenario */

class ApoioCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['site/contact']);
    }

    public function checkApoio(FunctionalTester $I)
    {
        $I->see('Apoio', 'h1');
    }

    public function checkApoioSubmitNoData(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', []);
        $I->see('Apoio', 'h1');
        $I->see('Preenchimento Obrigatório.');

    }


  /*  public function checkApoioSubmitCorrectData(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', [
            'ContactForm[assunto]' => 'test subject',
            'ContactForm[descrição]' => 'test content',
            'ContactForm[Código de verificação]' => 'captcha',
        ]);
        //$I->seeEmailIsSent();
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }*/
}