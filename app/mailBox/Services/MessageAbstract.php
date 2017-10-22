<?php

namespace App\mailBox\Services;

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
    /** @var  Mail */
    protected $model;

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
    abstract function get();

    /**
     * strategy validation
     * @return mixed
     * @exception InvalidArgument
     */
    abstract function validate();


}