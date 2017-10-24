<?php

namespace App\mailBox\Response\Strategy;

use App\APM\Response\ResponseAbstract;

class ResponseEmail extends ResponseAbstract
{

    /**
     * @param $data
     * @return ResponseAbstract
     */
    public function handle($data): ResponseAbstract
    {
        if (!empty($data['data'])) {
            $this->data($data);
        } else {
            $this->status = 400;
            $this->appCode = 'ERR-400';
            $this->error();
        }

        return $this;
    }

    /**
     * @param $data
     * @return array
     */
    protected function data($data): array
    {
        // data resource object
        $this->data = array();

        // collect data
        foreach ($data['data'] as $key => $value) {
            $this->data[] = array(
                'type' => $data['requestType'],
                'id' => $value['id'],
                'attributes' => array(
                    'uid' => $value['uid'],
                    'sender' => $value['sender'],
                    'subject' => $value['subject'],
                    'message' => $value['message'],
                    'time_sent' => $value['time_sent'],
                    'created_at' => $value['created_at'],
                    'updated_at' => $value['updated_at'],
                ),
                'links' => array(
                    'self' => url('api/messages/' . $value['uid'])
                )
            );
        }

        return $this->data;
    }

    /**
     * generate error block
     * @return array
     */
    protected function error(): array
    {
        $this->error = array(
            'status' => $this->status,// http error code
            'code' => $this->appCode, // application code
            'title' => 'Not Found',
            'details' => 'There is no records matched with your request in our database'
        );

        return $this->error;
    }
}