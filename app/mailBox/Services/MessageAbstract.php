<?php

namespace App\mailBox\Services;

use App\mailBox\Exceptions\MessageException;
use App\mailBox\Model\Mail;

abstract class MessageAbstract
{
    /** @var integer */
    const DEFAULT_OFFSET = 0;

    /** @var integer */
    const DEFAULT_LIMIT = 100;

    /** @var  integer */
    protected $offset;

    /** @var  integer */
    protected $limit;

    /** @var  string */
    protected $status;

    /** @var  Mail */
    protected $model;

    /** @var array all actions which are allowed to do on messages */
    protected $allowedActions = array(
        'read',
        'unread',
        'archived'
    );

    /**
     * MessageAbstract constructor.
     */
    public function __construct()
    {
        $this->offset = self::DEFAULT_OFFSET;

        $this->limit = self::DEFAULT_LIMIT;

        $this->model = new Mail;

    }

    /**
     * the way of strategy to get messages
     * @return mixed
     */
    abstract function get(): array;

    /**
     * strategy validation
     * @return mixed
     * @exception InvalidArgument
     */
    abstract function validate(): bool;

    /**
     * @param $action
     * @return bool| MessageException
     * @exception MessageException
     */
    protected function isValidAction($action)
    {
        if (!in_array($action, $this->allowedActions)) {
            throw new MessageException('Action does not allowed, given action : ' . $action);
        }

        return true;
    }


}