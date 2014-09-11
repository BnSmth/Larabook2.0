<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook member.');
$I->wantTo('login to my Larabook account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->canSee('Welcome back');

$I->assertTrue(Auth::check(), 'The user is logged in');