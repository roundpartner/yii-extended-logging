<?php

class RoundFileLogRoute extends CFileLogRoute
{

    /**
     * Saves log messages in files.
     *
     * @param array $logs list of log messages
     */
    protected function processLogs($logs)
    {
        foreach ($logs as $index => $log) {
            $message = '';
            if (Yii::app()->user->id) {
                $message.=sprintf('Username: %s', Yii::app()->user->username);
                if (Yii::app()->user->account) {
                    $message.=sprintf('  Account: %s  Schema: %s', Yii::app()->user->account->account_id, Yii::app()->user->account->database_table);
                }
                if ($message) {
                    $messages = explode("\n", $logs[$index][0], 2);
                    array_splice($messages, 1, 0, $message);
                    $logs[$index][0] = implode("\n", $messages);
                }
            }
        }
        parent::processLogs($logs);
    }

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
