<?php

namespace App\mailBox\Response\Strategy;

use App\APM\Response\ResponseAbstract;

class ResponseEmail extends ResponseAbstract
{

    /**
     * generate response based on action
     * @param $data
     * @return ResponseAbstract
     */
    public function handle($data): ResponseAbstract
    {

        // generate data block
        if (isset($data['data']) && !empty($data['data'])) {
            $this->data($data);

        } else {

            // we had not data
            // but we have a successful action by the way
            if (isset($data['action']) && self::SUCCESS_ACTION == $data['action']) {
                $this->error([
                    'status' => self::SUCCESS_STATUS,
                    'appCode' => self::SUCCESS_APP_CODE,
                    'title' => self::SUCCESSFULL_TITLE,
                    'details' => self::SUCCESSFULL_ACTION_MESSAGE
                ]);

            // we got error
            } else {
                $this->error([
                    'status' => self::NOT_FOUND_STATUS,
                    'appCode' => self::NOT_FOUND_APP_CODE,
                    'title' => self::UNSUCCESSFULL_TITLE,
                    'details' => self::NOT_FOUND_MESSAGE
                ]);
            }

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
                    'status' => $value['status'],
                    'sender' => $value['sender'],
                    'subject' => $value['subject'],
                    'message' => $value['message'],
                    'time_sent' => $value['time_sent'],
                    'created_at' => $value['created_at'],
                    'updated_at' => $value['updated_at'],
                ),
                'links' => array(
                    'self' => url('api/'. self::API_VERSION. '/messages/' . $value['uid'])
                )
            );
        }

        return $this->data;
    }

    /**
     * generate error block
     * @param array $error
     * @return array
     */
    protected function error($error = array()): array
    {
        $this->status = $error['status'];
        $this->appCode = $error['appCode'];

        $this->error = array(
            'status' => $error['status'],// http error code
            'code' => $error['appCode'], // application code
            'title' => $error['title'],
            'details' => $error['details']
        );

        return $this->error;
    }
}