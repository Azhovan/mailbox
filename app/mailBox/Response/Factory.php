<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 8/9/17
 * Time: 11:09 AM
 */

namespace App\APM\Response;


class Factory
{

    /** @var  integer application code */
    private $code;

    /** @var  array meta object */
    private $meta;

    /** @var  array */
    private $links;

    /** @var integer id of request or error */
    private $id;

    /** @var  integer http status code */
    private $status;

    /** @var  string */
    private $errorTitle;

    /** @var  string description about error */
    private $details;

    /** @var  string type of resource */
    private $type;


    public static function create()
    {

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

    /**
     * @return array
     */
    private function meta(): array
    {
        return $this->meta;
    }

    /**
     * @return array
     */
    private function links(): array
    {
        return $this->links;
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

    private function data(): array
    {
        return array(
            'type' => $this->type,
            'id' => $this->id,
            'links' => $this->links(),
        );
    }
}
