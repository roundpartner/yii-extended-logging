<?php

namespace RoundPartner\Test;

use RoundPartner\YiiLogger\RoundFileLogRoute;

class RoundFileLogRouteTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var RoundFileLogRoute
     */
    protected $logRoute;

    public function setUp()
    {
        $this->logRoute = new RoundFileLogRoute();
        $this->logRoute->setLogPath(BASE_PATH . '/protected/runtime');
    }

    public function testCreateInstance()
    {
        $this->assertInstanceOf('\RoundPartner\YiiLogger\RoundFileLogRoute', $this->logRoute);
    }

}
