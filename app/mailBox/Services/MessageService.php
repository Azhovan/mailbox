<?php

namespace App\mailBox\Services;


use App\mailBox\Exceptions\MessageException;
use App\mailBox\Services\Config\MessageConfig;

class MessageService extends MessageAbstract implements MessageConfig
{

    /** @var MessageService instance */
    public static $instance = null;

    /** @var integer */
    private $messageId;


    /**
     * @return MessageService
     */
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new MessageService();
        }

        return self::$instance;
    }

    /**
     * get the result
     * @return mixed
     */
    public function get(): array
    {
        $this->validate();

        $result =  $this->model
            ->when($this->status, function ($query) {
                $query->where(MessageConfig::MESSAGE_STATUS_FIELD, $this->status);
            })
            ->when($this->messageId, function ($query) {
                $query->where(MessageConfig::MESSAGE_UID_FIELD, $this->messageId);
            })
            ->skip($this->offset)->take($this->limit)
            ->get()->toArray();
    }

    /**
     * strategy validation
     * @return mixed
     * @exception InvalidArgument
     */
    function validate(): bool
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
     * update the custom message's status
     * @param $messageId
     * @param $action
     */
    public function update($messageId, $action)
    {
        $this->isValidAction($action);

        return $this->model->where(MessageConfig::MESSAGE_UID_FIELD, $messageId)
            ->update([
                MessageConfig::MESSAGE_STATUS_FIELD => $action
            ]);

    }

    /**
     * set the offset of message response
     * @param int $offset
     * @return  MessageService
     */
    public function offset(int $offset): self
    {
        $this->offset = intval($offset);

        return $this;
    }

    /**
     * @param int $limit
     * @return MessageService
     */
    public function limit(int $limit): self
    {
        $this->limit = intval($limit);

        return $this;
    }

    /**
     * @param $status
     * @return MessageService
     */
    public function status(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * if we need to get the specific message, we set its id
     * @param int $id
     * @return MessageService
     */
    public function id(int $id): self
    {
        $this->messageId = $id;

        return $this;
    }


}