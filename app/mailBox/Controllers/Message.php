<?php

namespace App\mailBox\Controllers;

use App\mailBox\Services\MessageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Message extends Controller
{

    /**
     * @param Request $request
     * @return null
     */
    public function index(Request $request)
    {
        // singleton object
        $message = MessageService::getInstance();

        if (null !== $request->get('offset')) {
            $message->offset($request->get('offset'));
        }

        if (null !== $request->get('limit')) {
            $message->limit($request->get('limit'));
        }

        return $message->get();
    }

}
