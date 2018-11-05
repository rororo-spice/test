<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * ユーザーのメッセージ中の相手一覧を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserMessageList($userId)
    {
        return response(Message::getUserMessageList($userId));
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
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * ブロック企業削除
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteBlockCompany(Request $request)
    {
        if (empty($request->blockCompanyId))
        {
            return response("error");
        }

        if ((BlockCompany::deleteBlockCompany($request->blockCompanyId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
