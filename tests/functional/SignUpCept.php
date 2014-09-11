<?php
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a Larabook account');

$I->amOnPage('/');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'JohnDoe');
$I->fillField('Email:', 'john@example.com');
$I->fillField('Password:', 'password');
$I->fillField('Password Confirmation:', 'password');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Glad to have you as a new Larabook member');

$I->seeRecord('users', [
   'username' => 'JohnDoe'
]);

$I->assertTrue(Auth::check(), 'The user is logged in');