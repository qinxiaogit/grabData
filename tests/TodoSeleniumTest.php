<?php

declare(strict_types = 1);

use App\Task;

class TodoSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /** @var string */
    private $rootURL = 'todo2';
    /** @var int */
    private $ajaxDelay = 1;

    protected function setUp()
    {
        parent::setUp();
        $this->setBrowser(env('BROWSER'));
        $this->setBrowserUrl('http://' . env('WEBSERVER_URL') . ':' . env('WEBSERVER_PORT'));
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
        $this->ajaxDelay = (int)env('AJAX_DELAY');

        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    }

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

        $this->url($this->rootURL);

        $this->assertContains('Task 1', $this->byTag('body')->text());
        $this->assertContains('Task 2', $this->byTag('body')->text());
        $this->assertContains('Task 3', $this->byTag('body')->text());
    }

    /** @test */
    public function 新增1筆task並顯示在下方()
    {
        $this->url($this->rootURL);
        $this->assertNotContains('Task 1', $this->byTag('body')->text());

        $this->url($this->rootURL);
        $this->byName('name')->value('Task 1');
        $this->byXPath("//button[contains(text(), 'Add Task')]")->click();

        sleep($this->ajaxDelay);

        $this->assertContains('Task 1', $this->byTag('body')->text());
    }
}