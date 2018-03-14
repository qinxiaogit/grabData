<?php

declare(strict_types = 1);

use App\Model\Task;

class TodoAppTest extends TestCase
{
    /** @var string */
    private $rootURL = 'todo';

    protected function tearDown()
    {
        DB::table('tasks')->truncate();
        parent::tearDown();
    }

    /** @test */
    public function testStart()
    {
        factory(Task::class)->create(['name' => 'Task 1']);
        factory(Task::class)->create(['name' => 'Task 2']);
        factory(Task::class)->create(['name' => 'Task 3']);

        $this->visit($this->rootURL)
            ->see('Task 1')
            ->see('Task 2')
            ->see('Task 3')
            ->seeInDatabase('tasks', [
                'name' => 'Task 1',
            ])
            ->seeInDatabase('tasks', [
                'name' => 'Task 2',
            ])
            ->seeInDatabase('tasks', [
                'name' => 'Task 3',
            ]);
    }

    /** @test */
    public function testTwo()
    {
        $this->visit($this->rootURL)
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->visit($this->rootURL)
            ->type('Task 1', 'name')
            ->press('Add Task')
            ->see('Task 1')
            ->seeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);
    }

    /** @test */
    public function testThree()
    {
        $this->visit($this->rootURL)
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->visit($this->rootURL)
            ->type('Task 1', 'name')
            ->press('Add Task')
            ->see('Task 1')
            ->seeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->post($this->rootURL . '/task/1')
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);
    }
}
