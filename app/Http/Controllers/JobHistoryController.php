<?php

namespace App\Http\Controllers;

use App\JobHistory;
use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    /**
     * ユーザーの職歴取得
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserJobHistory($userId)
    {
        return response(JobHistory::getUserJobHistory($userId));
    }

    /**
     * 職歴の登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registJobHistory(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->companyName))
        {
            return response("error");
        }

        if ((JobHistory::registJobHistory($request->userId, $request->companyName)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * 職歴の登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteJobHistory(Request $request)
    {
        if (empty($request->jobHistoryId))
        {
            return response("error");
        }

        if ((JobHistory::deleteJobHistory($request->jobHistoryId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
