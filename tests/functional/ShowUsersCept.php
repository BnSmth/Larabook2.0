<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('list all members who are a member of Larabook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');
