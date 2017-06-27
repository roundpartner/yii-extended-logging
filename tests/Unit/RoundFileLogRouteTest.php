<?php

require_once BASE_PATH . '/src/RoundFileLogRoute.php';
require_once BASE_PATH . '/tests/Mock/User.php';

class RoundFileLogRouteTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var RoundFileLogRoute
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
        $this->logRoute = new RoundFileLogRoute();
        $this->logRoute->setLogPath(BASE_PATH . '/protected/runtime');
        $this->logger = new CLogger();

        $this->getApp()->setComponent('user', new User());
    }

    public function testCreateInstance()
    {
        $this->assertInstanceOf('RoundFileLogRoute', $this->logRoute);
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

    /**
     * @return CApplication
     */
    private function getApp()
    {
        return Yii::app();
    }
}
