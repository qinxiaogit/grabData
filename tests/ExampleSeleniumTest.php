<?php

declare(strict_types = 1);

class ExampleSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser(env('BROWSER'));
        $this->setBrowserUrl('http://' . env('WEBSERVER_URL') . ':' . env('WEBSERVER_PORT'));
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
    }

    public function testTitle()
    {
        $this->url('/');
        $this->assertEquals('Laravel', $this->title());
    }
}
