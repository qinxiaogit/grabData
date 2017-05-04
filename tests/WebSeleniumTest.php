<?php
use App\Task;
use Illuminate\Support\Facades\DB;
/**
 * Created by PhpStorm.
 * User: xiao
 * Date: 2017/5/4
 * Time: 21:44
 */
class WebSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /*
     * 初始化
     */
    public function setUp()
    {
        $this->setBrowser('chrome');
        $this->setBrowserUrl('https://www.baidu.com');
        $this->setHost(env('SELENIUM_URL'));
        $this->setPort((int)env('SELENIUM_PORT'));
    }
    public function testGetWebPage(){

        $this->url('/');
        $title = $this->title();
        //factory(Task::class)->create(['title'=>$title]);
        //Task::create(['title'=>$title]);
        $res = DB::table('task')->insert(['title'=>$title]);
    }
}