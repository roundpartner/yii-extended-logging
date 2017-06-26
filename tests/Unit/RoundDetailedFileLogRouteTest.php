<?php

namespace RoundPartner\Test;

use RoundPartner\YiiLogger\RoundDetailedFileLogRoute;

class RoundDetailedFileLogRouteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RoundDetailedFileLogRoute
     */
    protected $logRoute;

    public function setUp()
    {
        $this->logRoute = new RoundDetailedFileLogRoute();
        $this->logRoute->setLogPath('/tmp/');
    }

    public function testCreateInstance()
    {
        $this->assertInstanceOf('\RoundPartner\YiiLogger\RoundDetailedFileLogRoute', $this->logRoute);
    }

    public function testBasicLoggerWithNoLog()
    {
        $logger = new \CLogger();
        $this->logRoute->collectLogs($logger, true);
    }

    public function testBasicLoggerWithOneLog()
    {

        \Yii::createConsoleApplication([]);

        $logger = new \CLogger();
        $logger->log('hello world');

        $this->logRoute->collectLogs($logger, true);
    }
}
