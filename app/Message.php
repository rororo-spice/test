<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $table = 'block_company_t';
    protected $primaryKey = 'block_company_id';

    /**
     * ユーザーのメッセージ中の相手一覧を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserMessageList($userId)
    {
        $userData = DB::table('message_room_user_relation_id')
            ->join('user_m', 'block_company_t.block_user_id', '=', 'user_m.user_id')
            ->select('block_company_t.block_company_id', 'user_m.company_name', 'block_company_t.block_user_id')
            ->where('block_company_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * 新規チャット開始
     * @return bool
     */
    public static function registMessageRoom()
    {
        $result = DB::table('message_room_t')
            ->insertGetId(
                ['created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 新規チャット開始ユーザー登録
     * @param $roomId
     * @param $userId
     * @return bool
     */
    public static function registUserMessageRoom($roomId, $userId)
    {
        $result = DB::table('message_room_user_relation_t')
            ->insert(
                ['message_room_id' => $roomId, 'user_id' => $userId, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * ブロック企業削除
     * @param $blockCompanyId
     * @return bool
     */
    public static function deleteBlockCompany($blockCompanyId)
    {
        $result = DB::table('block_company_t')
            ->where('block_company_id', $blockCompanyId)
            ->delete();
        return $result;
    }
}
