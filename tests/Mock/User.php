<?php

class User implements IApplicationComponent
{
    protected $initialized = false;

    public $id;
    public $username;
    public $account;

    public function init()
    {
        $this->initialized = true;

        $this->id = '1234';
        $this->username = 'mocked_user';
        $this->account = (object) array(
            'account_id' => '1234',
            'database_table' => 'table_test'
        );
    }

    public function getIsInitialized()
    {
        return $this->initialized;
    }
}
