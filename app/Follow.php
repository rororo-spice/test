<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Follow extends Model
{
    protected $table = 'follow_t';
    protected $primaryKey = 'follow_id';

    /**
     * ユーザーのフォロワーを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserFollower($userId)
    {
        $userData = DB::table('follow_t')
            ->join('user_m', 'follow_t.user_id', '=', 'user_m.user_id')
            ->select('follow_t.user_id', 'user_m.last_name', 'user_m.first_name', 'user_m.final_education', 'user_m.company_name')
            ->where('follow_t.follow_user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * ユーザーのフォローを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserFollow($userId)
    {
        $userData = DB::table('follow_t')
            ->join('user_m', 'follow_t.follow_user_id', '=', 'user_m.user_id')
            ->select('follow_t.user_id', 'user_m.last_name', 'user_m.first_name', 'user_m.final_education', 'user_m.company_name')
            ->where('follow_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * フォロワー登録
     * @param $userId
     * @param $followUserId
     * @return bool
     */
    public static function registFollow($userId, $followUserId)
    {
        $result = DB::table('follow_t')
            ->insert(
                ['user_id' => $userId, 'follow_user_id' => $followUserId, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * フォロワー削除
     * @param $followId
     * @return bool
     */
    public static function deleteFollow($followId)
    {
        $result = DB::table('follow_t')
            ->where('follow_id', $followId)
            ->delete();
        return $result;
    }
}
