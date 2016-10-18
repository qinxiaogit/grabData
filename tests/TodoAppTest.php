<?php

declare(strict_types = 1);

use App\Task;

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
    public function 一啟動顯示3筆task()
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
}
