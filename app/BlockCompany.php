<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlockCompany extends Model
{
    protected $table = 'block_company_t';
    protected $primaryKey = 'block_company_id';

    /**
     * ユーザーのブロック企業を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserBlockCompany($userId)
    {
        $userData = DB::table('block_company_t')
            ->join('user_m', 'block_company_t.block_user_id', '=', 'user_m.user_id')
            ->select('block_company_t.block_company_id', 'user_m.company_name', 'block_company_t.block_user_id')
            ->where('block_company_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * ブロック企業登録
     * @param $userId
     * @param $blockUserId
     * @return bool
     */
    public static function registBlockCompany($userId, $blockUserId)
    {
        $result = DB::table('block_company_t')
            ->insert(
                ['user_id' => $userId, 'block_user_id' => $blockUserId, 'created_at' => Carbon::now()]
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
