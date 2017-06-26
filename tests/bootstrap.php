<?php

define('BASE_PATH', dirname(__DIR__));

class PHPUnit_Extensions_SeleniumTestCase
{
}
class PHPUnit_Extensions_Database_TestCase
{
}
class PHP_Invoker
{
}

require BASE_PATH . '/vendor/yiisoft/yii/framework/yii.php';
require BASE_PATH . '/vendor/autoload.php';
YiiBase::app();
