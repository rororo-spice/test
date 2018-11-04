<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = 'review_t';
    protected $primaryKey = 'review_id';

    /**
     * ユーザーが受けたレビューを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserReview($userId)
    {
        $userData = DB::table('review_t')
            ->select('review_id', 'project_id', 'write_user_id', 'to_user_id', 'review_point', 'review_comment')
            ->where('to_user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * ユーザーが記載したレビューを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getWriteUserReview($userId)
    {
        $userData = DB::table('review_t')
            ->select('review_id', 'project_id', 'write_user_id', 'to_user_id', 'review_point', 'review_comment')
            ->where('write_user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * レビュー登録
     * @param $projectId
     * @param $writeUserId
     * @param $toUserId
     * @param $reviewPoint
     * @param $reviewComment
     * @return bool
     */
    public static function registReview($projectId, $writeUserId, $toUserId, $reviewPoint, $reviewComment)
    {
        $result = DB::table('review_t')
            ->insert(
                ['project_id' => $projectId, 'write_user_id' => $writeUserId, 'to_user_id' => $toUserId, 'review_point' => $reviewPoint, 'review_comment' => $reviewComment, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * レビュー削除
     * @param $reviewId
     * @return bool
     */
    public static function deleteReview($reviewId)
    {
        $result = DB::table('review_t')
            ->where('review_id', $reviewId)
            ->delete();
        return $result;
    }
}
