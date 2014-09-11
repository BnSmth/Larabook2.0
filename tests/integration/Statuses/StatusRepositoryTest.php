<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    /**
     * @var Larabook\Statuses\StatusRepository
     */
    protected $repository;

    protected function _before()
    {
        $this->repository = new StatusRepository;
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        // Given
        $users = TestDummy::times(2)->create('Larabook\Users\User');
        TestDummy::times(2)->create('Larabook\Statuses\Status', ['user_id' => $users[0]->id]);
        TestDummy::times(2)->create('Larabook\Statuses\Status', ['user_id' => $users[1]->id]);

        // When
        $statusesForUser = $this->repository->getAllForUser($users[0]->id);

        // Then
        $this->assertCount(2, $statusesForUser);
    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        // Given
        $user = TestDummy::create('Larabook\Users\User');
        $unsavedStatus = TestDummy::build('Larabook\Statuses\Status', [
            'body' => 'This is a test status',
            'user_id' => null
        ]);
        // When
        $this->repository->save($unsavedStatus, $user->id);
        // Then
        $this->tester->seeRecord('statuses', [
            'body' => 'This is a test status',
            'user_id' => $user->id
        ]);
    }
}
