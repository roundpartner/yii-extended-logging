<?php

namespace RoundPartner\YiiLogger;

use \Yii as Yii;

class RoundFileLogRoute extends RoundDetailedFileLogRoute {

    /**
     * Saves log messages in files.
     *
     * @param array $logs list of log messages
     */
    protected function processLogs($logs) {
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

}
