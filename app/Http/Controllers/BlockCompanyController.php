<?php

namespace App\Http\Controllers;

use App\BlockCompany;
use Illuminate\Http\Request;

class BlockCompanyController extends Controller
{
    /**
     * ユーザーのブロック企業を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserBlockCompany($userId)
    {
        return response(BlockCompany::getUserBlockCompany($userId));
    }

    /**
     * ブロック企業登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registBlockCompany(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->blockUserId))
        {
            return response("error");
        }

        if ((BlockCompany::registBlockCompany($request->userId, $request->blockUserId)))
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
