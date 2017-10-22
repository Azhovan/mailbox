<?php

namespace App\mailBox\Services;


use App\mailBox\Exceptions\MessageException;

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
        $this->validate();

        return $this->model->skip($this->offset)->take($this->limit)
            ->get();
    }

    /**
     * strategy validation
     * @return mixed
     * @exception InvalidArgument
     */
    function validate()
    {

        if ($this->offset < 0) {
            throw new MessageException('offset cannot be smaller than zero, given:' . $this->offset);
        }

        if ($this->limit < 0) {
            throw new MessageException('limit cannot be smaller than zero, given:' . $this->limit);
        }

        return true;
    }

    /**
     * set the offset of message response
     * @param $offset
     * @return $this
     */
    public function offset($offset)
    {
        $this->offset = intval($offset);

        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->limit = intval($limit);

        return $this;
    }
}