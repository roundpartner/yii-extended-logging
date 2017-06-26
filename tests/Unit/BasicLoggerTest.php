<?php

namespace RoundPartner\Test;

use RoundPartner\YiiLogger\BasicLogger;

class BasicLoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BasicLogger
     */
    protected $logRoute;

    public function setUp()
    {
        $this->logRoute = new BasicLogger();
        $this->logRoute->setLogPath(BASE_PATH . '/protected/runtime');
    }

    public function testCreateInstance()
    {
        $this->assertInstanceOf('\RoundPartner\YiiLogger\BasicLogger', $this->logRoute);
    }

    public function testBasicLoggerWithNoLog()
    {
        $logger = new \CLogger();
        $this->logRoute->collectLogs($logger, true);
    }

    public function testBasicLoggerWithOneLog()
    {
        $logger = new \CLogger();
        $logger->log('hello world');

        $this->logRoute->collectLogs($logger, true);
    }
}
