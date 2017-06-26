<?php

namespace RoundPartner\YiiLogger;

use \Yii as Yii;

class RoundDetailedFileLogRoute extends \CFileLogRoute
{

    /**
     * Formats a log message given different fields.
     *
     * @param string $message message content
     * @param integer $level message level
     * @param string $category message category
     * @param integer $time timestamp
     *
     * @return string formatted message
     */
    protected function formatLogMessage($message, $level, $category, $time)
    {
        $message = "[".Yii::app()->request->getUserHostAddress()."] ".$message;
        return parent::formatLogMessage($message, $level, $category, $time);
    }
}
