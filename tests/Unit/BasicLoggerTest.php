<?php

namespace RoundPartner\Test\Unit;

use RoundPartner\YiiLogger\BasicLogger;
use \Yii as Yii;

class BasicLoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BasicLogger
     */
    protected $logRoute;

    public function setUp()
    {
        if (!Yii::app()) {
            Yii::createConsoleApplication([]);
        }
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
        $this->assertEmpty($this->logRoute->logs);
    }

    public function testBasicLoggerWithOneLog()
    {
        $logger = new \CLogger();
        $logger->log('hello world');

        $this->logRoute->collectLogs($logger, true);
        $this->assertEmpty($this->logRoute->logs);
    }
}
