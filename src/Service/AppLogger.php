<?php

namespace App\Service;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        // 适配器模式
        if ($type == self::TYPE_LOG4PHP) {
            \Logger::configure(dirname(__FILE__) .'/config/log4php.properties');
            $log = \Logger::getLogger("Log");

            $this->logger = $log;
        } elseif ($type == self::TYPE_THINK_LOG) {
            $log = (new \think\LogManager());
            $log->init([
                'default'	=>	'file',
                'channels'	=>	[
                    'file'	=>	[
                        'type'	=>	'file',
                        'path'	=>	'./logs/think-log',
                    ],
                ],
            ]);
            $this->logger = $log;
        }
    }

    public function info($message = '')
    {
        if ($this->logger instanceof \think\LogManager) {
            $message = strtoupper($message);
        }

        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        if ($this->logger instanceof \think\LogManager) {
            $message = strtoupper($message);
        }
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        if ($this->logger instanceof \think\LogManager) {
            $message = strtoupper($message);
        }
        $this->logger->error($message);
    }
}