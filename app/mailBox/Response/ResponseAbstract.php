<?php

namespace App\APM\Response;

abstract class ResponseAbstract
{

    /** @var  array */
    protected $data = array();

    /** @var  string  application code */
    protected $appCode;

    /** @var  integer http code */
    protected $status;

    /** @var  array */
    protected $error = array();

    public function __construct()
    {
        // default value for status
        $this->status = 200 ;

        // default value for application response code
        $this->appCode = 'Success-200';
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getAppCode(): string
    {
        return $this->appCode;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }


    /**
     * main function for any strategy to handle the data generation
     * @param $data
     * @return ResponseAbstract
     */
    abstract public function handle($data): ResponseAbstract ;

    /**
     * generate data | resource  block
     * @param $data
     * @return array
     */
    abstract protected function data($data): array;

    /**
     * generate error block
     * @return array
     */
    abstract protected function error(): array;

    /**
     * general meta function
     * @return array
     */
    public function meta(): array
    {
        return array(
            "copyright" => "Copyright 2015 Oberlo Corp.",
            "Api" => array(
                "version" => 0.1,
                "documentation" => 'www.oberlo.com/api/documentation/'
            )
        );
    }


}