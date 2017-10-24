<?php

namespace App\mailBox\Controllers;

use App\APM\Response\ResponseFactory;
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
     * @param integer $messageId
     * @return null
     */
    public function index(Request $request, int $messageId = 0)
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

        if (null !== $messageId) {
            $this->messageService->id($messageId);
        }

        $result = $this->messageService->get();

        return ResponseFactory::getInstance()->create(
            array(
                'data' => $result,
                'id' => $messageId,
                'status' => $request->get('status'),
                'requestType' => 'email'
            )

        );

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
