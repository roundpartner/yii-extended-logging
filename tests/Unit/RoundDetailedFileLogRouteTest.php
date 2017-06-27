<?php

require_once BASE_PATH . '/src/RoundDetailedFileLogRoute.php';

class RoundDetailedFileLogRouteTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RoundDetailedFileLogRoute
     */
    protected $logRoute;

    /**
     * @var CLogger
     */
    protected $logger;

    public function setUp()
    {
        if (!Yii::app()) {
            Yii::createConsoleApplication([]);
        }
        $this->logRoute = new RoundDetailedFileLogRoute();
        $this->logRoute->setLogPath(BASE_PATH . '/protected/runtime');

        $this->logger = new CLogger();
    }

    public function testCreateInstance()
    {
        $this->assertInstanceOf('RoundDetailedFileLogRoute', $this->logRoute);
    }

    public function testBasicLoggerWithNoLog()
    {
        $this->logRoute->collectLogs($this->logger, true);
        $this->assertEmpty($this->logRoute->logs);
    }

    public function testBasicLoggerWithOneLog()
    {
        $this->logger->log('hello world');
        $this->logRoute->collectLogs($this->logger, true);
        $this->assertEmpty($this->logRoute->logs);
    }
}
