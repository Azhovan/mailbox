<?php

namespace App\mailBox\Controllers;

use App\mailBox\Services\MessageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Message extends Controller
{

    /**
     * Display a listing of the messages
     *
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

        if (null !== $request->get('status')) {
            $message->status($request->get('status'));
        }

        return $message->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
