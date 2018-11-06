<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * ユーザーのメッセージ中の相手一覧を取得する
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserMessageList(Request $request)
    {
        return response(Message::getUserMessageList($request->userId));
    }

    /**
     * 新規チャット開始
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function startMessage(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->sendUserId))
        {
            return response("error");
        }

        $roomId = Message::registMessageRoom();
        if ((Message::registUserMessageRoom($roomId, $request->userId)) && (Message::registUserMessageRoom($roomId, $request->sendUserId)))
        {
            return response($roomId);
        }
        else
        {
            return response("error");
        }
    }

    /**
     * チャットメッセージ登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function postMessage(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->roomId) || empty($request->userId) || empty($request->messageText))
        {
            return response("error");
        }

        if ((Message::postMessage($request->roomId, $request->userId, $request->messageText)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * チャットメッセージ取得
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getMessage(Request $request)
    {
        return response(Message::getMessage($request->roomId));
    }
}
