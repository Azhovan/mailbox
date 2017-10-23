<?php

namespace App\APM\Response;


use App\mailBox\Exceptions\MessageRuntimeException;
use Closure;

class ResponseFactory
{

    /** @var  integer application code */
    private $code;

    /** @var integer id of request or error */
    private $id;

    /** @var  integer http status code */
    private $status;

    /** @var  string */
    private $errorTitle;

    /** @var  string description about error */
    private $details;

    /** @var  array */
    private $data;


    public static function create(Closure $callable)
    {
        if (!is_callable($callable)) {
            throw new MessageRuntimeException('Response factory need closure as argument');
        }

        if (is_null($callable)) {
            throw new MessageRuntimeException('closure is needed');
        }

        $data = $callable();

        if (!empty($data['data'])) {
            $resources = self::data($data);
        }



    }


    /**
     * return message block to client if necessary
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function response()
    {
        $message = array(
            'data' => $this->data(),
            'errors' => $this->errors(),
            'meta' => $this->meta()
        );

        return response($message, $this->code, array(
            'Content-Type' => 'application/json'
        ));

    }

    private static function data($data): array
    {
        // data resource object
        $dataArray = array();

        // collect data
        foreach ($data['data'] as $key => $value) {
            $dataArray[] = array(
                'type' => $data['type'],
                'id' => $value['id'],
                'attributes' => array(
                    'uid' => $value['uid'],
                    'sender' => $value['sender'],
                    'subject' => $value['subject'],
                    'message' => $value['message'],
                    'time_sent' => $value['time_sent'],
                ),
                'links' => array(
                    'self' => url('/messages/' . $value['uid'])
                )
            );
        }

        return $dataArray;
    }

    /**
     * @return array
     */
    private function errors(): array
    {
        $error = array(
            'id' => $this->id,
            'status' => $this->status,
            'code' => $this->code,
            'title' => $this->errorTitle,
            'details' => $this->details
        );

        return $error;
    }

    /**
     * @return array
     */
    private function meta(): array
    {
        return $this->meta;
    }
}
