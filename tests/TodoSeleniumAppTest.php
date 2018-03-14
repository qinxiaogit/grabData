<?php

declare(strict_types = 1);

use App\Model\Task;

class TodoSeleniumAppTest extends TestCaseSelenium
{
    /** @var string */
    private $rootURL = 'todo2';

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

    /** @test */
    public function 新增1筆task並顯示在下方()
    {
        $this->visit($this->rootURL)
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->visit($this->rootURL)
            ->type('Task 1', 'name')
            ->press('Add Task')
            ->hold($this->ajaxDelay)
            ->see('Task 1')
            ->seeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);
    }

    /** @test */
    public function 新增1筆task立即刪除()
    {
        $this->visit($this->rootURL)
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->visit($this->rootURL)
            ->type('Task 1', 'name')
            ->press('Add Task')
            ->hold($this->ajaxDelay)
            ->see('Task 1')
            ->seeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);

        $this->press('Delete')
            ->hold($this->ajaxDelay)
            ->dontSee('Task 1')
            ->dontSeeInDatabase('tasks', [
                'name' => 'Task 1'
            ]);
    }
}
