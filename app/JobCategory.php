<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobCategory extends Model
{
    protected $table = 'job_category_m';
    protected $primaryKey = 'job_category_id';

    /**
     * 職種一覧取得
     * @return \Illuminate\Support\Collection
     */
    public static function getJobCategory()
    {
        $themeList = DB::table('job_category_m')
            ->select('job_category_id', 'job_category_name')
            ->get();
        return $themeList;
    }

    /**
     * ユーザーの職種を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserJobCategory($userId)
    {
        $userThemeData = DB::table('job_category_m')
            ->join('job_category_user_relation_t', 'job_category_m.job_category_id', '=', 'job_category_user_relation_t.job_category_id')
            ->select('job_category_m.job_category_id', 'job_category_m.job_category_name', 'job_category_user_relation_t.user_id')
            ->where('job_category_user_relation_t.user_id', $userId)
            ->get();
        return $userThemeData;
    }

    /**
     * 職種登録
     * @param $userId
     * @param $jobCategoryId
     * @return bool
     */
    public static function registJobCategory($userId, $jobCategoryId)
    {
        $result = DB::table('job_category_user_relation_t')
            ->insert(
                ['user_id' => $userId, 'job_category_id' => $jobCategoryId, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 職種削除
     * @param $userId
     * @param $jobCategoryId
     * @return bool
     */
    public static function deleteJobCategory($userId, $jobCategoryId)
    {
        $result = DB::table('job_category_user_relation_t')
            ->where('user_id', $userId)
            ->where('theme_id', $jobCategoryId)
            ->delete();
        return $result;
    }
}
