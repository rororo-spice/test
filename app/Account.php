<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    /**
     * ユーザーの口座を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserAccount($userId)
    {
        $userData = DB::table('account_m')
            ->select('account_id', 'user_id', 'bank_name', 'account_type', 'office_name', 'account_number', 'account_name')
            ->where('user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * 口座登録
     * @param $userId
     * @param $bankName
     * @param $accountType
     * @param $officeName
     * @param $accountNumber
     * @param $accountName
     * @return bool
     */
    public static function registAccount($userId, $bankName, $accountType, $officeName, $accountNumber, $accountName)
    {
        $result = DB::table('account_m')
            ->insert(
                ['user_id' => $userId, 'bank_name' => $bankName, 'account_type' => $accountType, 'office_name' => $officeName, 'account_number' => $accountNumber, 'account_name' => $accountName, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 口座削除
     * @param $accountId
     * @return bool
     */
    public static function deleteAccount($accountId)
    {
        $result = DB::table('account_m')
            ->where('account_id', $accountId)
            ->delete();
        return $result;
    }
}
