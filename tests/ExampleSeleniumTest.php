<?php

declare(strict_types = 1);

class ExampleSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser(env('BROWSER'));
      //  $this->setBrowserUrl('http://' . env('WEBSERVER_URL') . ':' . env('WEBSERVER_PORT'));
        $this->setBrowserUrl('https://www.baidu.com' );
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
    }

    public function testTitle()
    {
        $this->url('/');
        $this->assertEquals('百度一下，你就知道', $this->title());
    }
}
