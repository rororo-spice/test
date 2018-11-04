<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * ユーザーのフォロワーを取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserFollower($userId)
    {
        return response(Follow::getUserFollower($userId));
    }

    /**
     * ユーザーのフォローを取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserFollow($userId)
    {
        return response(Follow::getUserFollow($userId));
    }

    /**
     * フォロワー登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registFollow(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->followUserId))
        {
            return response("error");
        }

        if ((Follow::registFollow($request->userId, $request->followUserId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * フォロワー削除
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteFollow(Request $request)
    {
        if (empty($request->followId))
        {
            return response("error");
        }

        if ((Follow::deleteFollow($request->followId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
