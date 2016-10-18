<?php

declare(strict_types = 1);

use Illuminate\Contracts\Console\Kernel;

abstract class TestCaseSelenium extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $ajaxDelay = 1;

    protected function setUp()
    {
        parent::setUp();
        $this->setBrowser(env('BROWSER'));
        $this->setBrowserUrl('http://' . env('WEBSERVER_URL') . ':' . env('WEBSERVER_PORT'));
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
        $this->ajaxDelay = (int)env('AJAX_DELAY');

        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
    }

    /**
     * @param string $path
     * @return TestCaseSelenium
     */
    public function visit(string $path) : TestCaseSelenium
    {
        $this->url($path);

        return $this;
    }

    /**
     * @param string $text
     * @param string $tag
     * @return TestCaseSelenium
     */
    public function see(string $text, string $tag = 'body') : TestCaseSelenium
    {
        $this->assertContains($text, $this->byTag($tag)->text());

        return $this;
    }

    /**
     * @param string $text
     * @param string $tag
     * @return TestCaseSelenium
     */
    public function dontSee(string $text, string $tag = 'body') : TestCaseSelenium
    {
        $this->assertNotContains($text, $this->byTag($tag)->text());

        return $this;
    }

    /**
     * @param string $value
     * @param string $name
     * @return TestCaseSelenium
     */
    public function type(string $value, string $name) : TestCaseSelenium
    {
        $this->byName($name)->value($value);

        return $this;
    }

    /**
     * @param $text
     * @return TestCaseSelenium $this
     */
    public function press(string $text) : TestCaseSelenium
    {
        $this->byXPath("//button[contains(text(), '{$text}')]")->click();

        return $this;
    }

    /**
     * @param $seconds
     * @return TestCaseSelenium $this
     */
    public function hold(int $seconds) : TestCaseSelenium
    {
        sleep($seconds);

        return $this;
    }

    /**
     * @param $table
     * @param array $data
     * @param null $connection
     * @return $this
     */
    public function seeInDatabase($table, array $data, $connection = null)
    {
        $database = App::make('db');

        $connection = $connection ?: $database->getDefaultConnection();

        $count = $database->connection($connection)->table($table)->where($data)->count();

        $this->assertGreaterThan(0, $count, sprintf(
            'Unable to find row in database table [%s] that matched attributes [%s].', $table, json_encode($data)
        ));

        return $this;
    }

    /**
     * @param  string $table
     * @param  array $data
     * @param  string $connection
     * @return $this
     */
    protected function dontSeeInDatabase($table, array $data, $connection = null)
    {
        return $this->notSeeInDatabase($table, $data, $connection);
    }

    /**
     * @param  string $table
     * @param  array $data
     * @param  string $connection
     * @return $this
     */
    protected function notSeeInDatabase($table, array $data, $connection = null)
    {

        $database = App::make('db');

        $connection = $connection ?: $database->getDefaultConnection();

        $count = $database->connection($connection)->table($table)->where($data)->count();

        $this->assertEquals(0, $count, sprintf(
            'Found unexpected records in database table [%s] that matched attributes [%s].', $table, json_encode($data)
        ));

        return $this;
    }
}