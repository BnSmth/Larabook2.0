<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('follow and unfollow other Larabook members');

$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

$I->click('Browse Users');

$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

// When I follow user
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow OtherUser');

// When I unfollow user
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');
