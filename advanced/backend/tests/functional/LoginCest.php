<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    protected function formParams($email, $password)
    {
        return [
            'LoginForm[email]' => $email,
            'LoginForm[password]' => $password,
        ];
    }
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Área do Administrador');
        $I->submitForm('#login-form', $this->formParams('ruifmiguel@hotmail.com', '123456'));
       

        $I->seeLink('Users');
        $I->dontSee('Entrar');

    }
    public function checkEmpty(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->submitForm('#login-form', $this->formParams('', ''));

        $I->See('Email cannot be blank.');
        $I->See('Password cannot be blank.');


    }
}
/*class ContactCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['site/contact']);
    }

    public function checkContact(FunctionalTester $I)
    {
        $I->see('Contact', 'h1');
    }

    public function checkContactSubmitNoData(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', []);
        $I->see('Contact', 'h1');
        $I->seeValidationError('Name cannot be blank');
        $I->seeValidationError('Email cannot be blank');
        $I->seeValidationError('Subject cannot be blank');
        $I->seeValidationError('Body cannot be blank');
        $I->seeValidationError('The verification code is incorrect');
    }

    public function checkContactSubmitNotCorrectEmail(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', [
            'ContactForm[name]' => 'tester',
            'ContactForm[email]' => 'tester.email',
            'ContactForm[subject]' => 'test subject',
            'ContactForm[body]' => 'test content',
            'ContactForm[verifyCode]' => 'testme',
        ]);
        $I->seeValidationError('Email não é valido');
        $I->dontSeeValidationError('Nome obrigatório');
        $I->dontSeeValidationError('Assunto obrigatório');
        $I->dontSeeValidationError('Descrição obrigatória');
        $I->dontSeeValidationError('Verificação incorreta');
    }

    public function checkContactSubmitCorrectData(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', [
            'ContactForm[name]' => 'tester',
            'ContactForm[email]' => 'tester@example.com',
            'ContactForm[subject]' => 'test subject',
            'ContactForm[body]' => 'test content',
            'ContactForm[verifyCode]' => 'testme',
        ]);
        $I->seeEmailIsSent();
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }
}