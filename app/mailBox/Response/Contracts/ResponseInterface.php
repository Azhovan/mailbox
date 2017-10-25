<?php

namespace App\mailBox\Response\Contracts;

interface ResponseInterface
{
    /** @var string */
    const API_VERSION = 'v1';

    /** @var string */
    const NOT_FOUND_MESSAGE = 'There is no records matched with your request in our database';

    /** @var string */
    const SUCCESSFULL_ACTION_MESSAGE = 'Your action successfully done';

    /** @var string */
    const NOT_FOUND_STATUS = 400;

    /** @var string */
    const NOT_FOUND_APP_CODE = 'BadRequest-400';

    /** @var string */
    const SUCCESS_STATUS = 200;

    /** @var string */
    const SUCCESS_APP_CODE = 'OK-200';

    /** @var string */
    const UNSUCCESSFULL_TITLE = 'Failed';

    /** @var string */
    const SUCCESSFULL_TITLE = 'Success';

    /** @var string */
    const SUCCESS_ACTION = 1;

}