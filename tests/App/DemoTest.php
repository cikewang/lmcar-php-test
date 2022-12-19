<?php

namespace Test\App;

use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;
use App\App\Demo;

class DemoTest extends TestCase
{

    public function test_foo()
    {
        $logger = new AppLogger('log4php');
        $req = new HttpRequest();
        $val = (new Demo($logger, $req))->foo();
        $this->assertEquals("bar", $val);
    }

    public function test_get_user_info()
    {
        $logger = new AppLogger('log4php');
        $req = new HttpRequest();
        $user = (new Demo($logger, $req))->get_user_info();
        if (is_array($user)) {
            $this->assertEquals(1, $user['id']);
            $this->assertEquals("hello world", $user['username']);
        } else {
            $this->assertIsArray($user);
        }
    }
}
