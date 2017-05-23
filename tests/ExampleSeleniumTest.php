<?php

declare(strict_types = 1);

class ExampleSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser(env('BROWSER'));
      //  $this->setBrowserUrl('http://' . env('WEBSERVER_URL') . ':' . env('WEBSERVER_PORT'));
        $this->setBrowserUrl('https://dev.newugo.cn' );
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
    }

    public function testTitle()
    {
        $this->url('/panel/login');
        $this->element('css selector', 'input[name=login-username]')->value(array('value' => str_split('fitone')));
        $this->element('css selector', 'input[name=login-password]')->value(array('value' => str_split('getgoodgo')));
        //模拟点击登入按钮
        $elements = $this->element('css selector', '.c-btn-oran-big')->click();

        //打开 m.taobao.com，此时已获取到cookie
        $this->open('dev.newugo.cn/panel/club');

        //等待ajax加载完毕
        waitForAjax();
        $elements = $this->element('css selector', 'body')->text();
        var_dump($elements);
    }
}
