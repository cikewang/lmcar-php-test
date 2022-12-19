<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{
    public function testLog4phpInfoLog()
    {
        $logger = new AppLogger('log4php');
        $logger->info('This is info log message');

        $this->assertTrue(!!file_get_contents("./logs/log4php/daily_20221219.log"));
    }

    public function testThinkLogInfoLog()
    {
        $logger = new AppLogger('think-log');
        $logger->info('This is info log message 1');

        $this->assertTrue(!!file_get_contents("./logs/think-log/202212/19_cli.log"));
    }
}