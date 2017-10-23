<?php

namespace App\mailBox\Controllers;

use App\mailBox\Services\MessageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    /** @var MessageService instance */
    private $messageService;


    /**
     * MessageService constructor.
     */
    public function __construct()
    {
        $this->messageService = MessageService::getInstance();
    }

    /**
     * Display a listing of the messageServices
     *
     * @param Request $request
     * @param integer $messageServiceId
     * @return null
     */
    public function index(Request $request, int $messageServiceId =  0)
    {

        if (null !== $request->get('offset')) {
            $this->messageService->offset($request->get('offset'));
        }

        if (null !== $request->get('limit')) {
            $this->messageService->limit($request->get('limit'));
        }

        if (null !== $request->get('status')) {
            $this->messageService->status($request->get('status'));
        }

        if (null !== $messageServiceId) {
            $this->messageService->id($messageServiceId);
        }

        return $this->messageService->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param $action
     * @return int
     */
    public function update($id, $action)
    {
        return $this->messageService->update($id, $action);
    }


}
