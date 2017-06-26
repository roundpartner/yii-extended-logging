<?php

namespace RoundPartner\Test;

use RoundPartner\YiiLogger\BasicLogger;

class BasicLoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        new BasicLogger();
    }
}
