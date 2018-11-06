<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザーのプロフィールを取得する
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserProfile(Request $request)
    {
        return response(User::getUserProfile($request->userId));
    }

    /**
     * プロフィール更新
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function updateUserProfile(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId))
        {
            return response("error");
        }

        if ((User::updateUserProfile($request)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
