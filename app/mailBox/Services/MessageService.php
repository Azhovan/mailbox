<?php

namespace App\mailBox\Services;


class MessageService extends MessageAbstract
{

    /** @var MessageService instance */
    public static $instance = null;

    /**
     * @return MessageService
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new MessageService();
        }

        return self::$instance;
    }


    public function get()
    {
        return [$this->offset, $this->limit];
    }

    /**
     * set the offset of message response
     * @param $offset
     * @return $this
     */
    public function offset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->limit = $limit;

        return $this;
    }


    /**
     * strategy validation
     * @return mixed
     * @exception InvalidArgument
     */
    function validate()
    {
        // TODO: Implement validate() method.
    }
}