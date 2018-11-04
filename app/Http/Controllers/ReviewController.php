<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * ユーザーが受けたレビューを取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserReview($userId)
    {
        return response(Review::getUserReview($userId));
    }

    /**
     * ユーザーが記載したレビューを取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getWriteUserReview($userId)
    {
        return response(Review::getWriteUserReview($userId));
    }

    /**
     * レビュー登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registReview(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->projectId) || empty($request->writeUserId) || empty($request->toUserId) || empty($request->reviewPoint) || empty($request->reviewComment))
        {
            return response("error");
        }

        if ((Review::registReview($request->projectId, $request->writeUserId, $request->toUserId, $request->reviewPoint, $request->reviewComment)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * レビュー削除
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteReview(Request $request)
    {
        if (empty($request->ReviewId))
        {
            return response("error");
        }

        if ((Review::deleteReview($request->ReviewId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
