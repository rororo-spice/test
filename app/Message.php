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
        $userData = DB::table('message_room_user_relation_t')
            ->join('user_m', 'message_room_user_relation_t.user_id', '=', 'user_m.user_id')
            ->select('user_m.user_id', 'user_m.last_name', 'user_m.first_name', 'message_room_user_relation_t.message_room_id')
            ->whereIn(DB::raw('(message_room_user_relation_t.message_room_id)'),
                function ($query) use ($userId)
                {
                    $query->select('message_room_id')
                        ->from('message_room_user_relation_t')
                        ->where('user_id', $userId);
                })
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
     * チャットメッセージ送信
     * @param $roomId
     * @param $userId
     * @param $messageText
     * @return bool
     */
    public static function postMessage($roomId, $userId, $messageText)
    {
        $result = DB::table('message_t')
            ->insert(
                ['message_room_id' => $roomId, 'user_id' => $userId, 'message_text' => $messageText,
                    'send_time' => Carbon::now(), 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * チャットメッセージ取得
     * @param $roomId
     * @return \Illuminate\Support\Collection
     */
    public static function getMessage($roomId)
    {
        $result = DB::table('message_t')
            ->join('user_m', 'message_t.user_id', '=', 'user_m.user_id')
            ->select('user_m.user_id', 'user_m.last_name', 'user_m.first_name', 'message_t.message_text', 'message_t.send_time')
            ->where('message_room_id', $roomId)
            ->get();
        return $result;
    }
}
