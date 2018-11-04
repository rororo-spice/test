<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobHistory extends Model
{
    protected $table = 'job_history_t';
    protected $primaryKey = 'job_history_id';

    /**
     * ユーザーの職歴を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserJobHistory($userId)
    {
        $userThemeData = DB::table('job_history_t')
            ->select('job_history_id', 'company_name')
            ->where('user_id', $userId)
            ->get();
        return $userThemeData;
    }

    /**
     * 職歴登録
     * @param $userId
     * @param $companyName
     * @return bool
     */
    public static function registJobHistory($userId, $companyName)
    {
        $result = DB::table('job_history_t')
            ->insert(
                ['user_id' => $userId, 'company_name' => $companyName, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 職歴削除
     * @param $jobHistoryId
     * @return bool
     */
    public static function deleteJobHistory($jobHistoryId)
    {
        $result = DB::table('job_history_t')
            ->where('job_history_id', $jobHistoryId)
            ->delete();
        return $result;
    }
}
