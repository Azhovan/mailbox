<?php

namespace App\APM\Response;


interface ResponseConfig
{

    /** @var string */
    const RESPONSE_UID_FIELD = 'uid';

    /** @var string */
    const RESPONSE_SENDER_FIELD = 'sender';
    const RESPONSE_SUBJECT_FIELD = 'subject';
    const RESPONSE_MESSAGE_FIELD = 'message';
    const RESPONSE_TIME_FIELD = 'time_sent';

}