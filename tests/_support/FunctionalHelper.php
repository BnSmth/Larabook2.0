<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module
{

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('body', $body);
        $I->click('Post Status');
    }

    public function signIn()
    {
        $email = 'john@example.com';
        $username = 'john';
        $password = 'password';

        $this->haveAnAccount(compact('email', 'username', 'password'));

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('Email:', $email);
        $I->fillField('Password:', $password);
        $I->click('Sign In');
    }

    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }

    public function have($model, $overrides)
    {
        return TestDummy::create($model, $overrides);
    }

}