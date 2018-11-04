<?php

namespace App\Http\Controllers;

use App\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * テーマ一覧取得
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(JobCategory::getJobCategory());
    }

    /**
     * ユーザーの職種取得
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserJobCategory($userId)
    {
        return response(JobCategory::getUserJobCategory($userId));
    }

    /**
     * 職種の登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registJobCategory(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->jobCategoryId))
        {
            return response("error");
        }

        if ((JobCategory::registJobCategory($request->userId, $request->jobCategoryId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * 職種の登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteJobCategory(Request $request)
    {
        if (empty($request->userId) || empty($request->jobCategoryId))
        {
            return response("error");
        }

        if ((JobCategory::deleteJobCategory($request->userId, $request->jobCategoryId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
