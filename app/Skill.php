<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Skill extends Model
{
    protected $table = 'skill_m';
    protected $primaryKey = 'skill_id';

    /**
     * スキル一覧取得
     * @return \Illuminate\Support\Collection
     */
    public static function getSkill()
    {
        $themeList = DB::table('skill_m')
            ->select('skill_id', 'skill_name')
            ->get();
        return $themeList;
    }

    /**
     * 職種ごとのスキルを取得する
     * @param $jobCategoryId
     * @param $skillType
     * @return \Illuminate\Support\Collection
     */
    public static function getJobCategorySkill($jobCategoryId, $skillType)
    {
        $userThemeData = DB::table('skill_m')
            ->join('theme_skill_relation_m', 'skill_m.skill_id', '=', 'theme_skill_relation_m.skill_id')
            ->join('theme_m', 'theme_m.theme_id', '=', 'theme_skill_relation_m.theme_id')
            ->select('skill_m.skill_id', 'skill_m.skill_name', DB::raw('GROUP_CONCAT(theme_m.name) AS skill_theme_name'))
            ->where('skill_m.job_category_id', $jobCategoryId)
            ->where('skill_m.skill_type', $skillType)
            ->groupBy('skill_m.skill_id')
            ->get();
        return $userThemeData;
    }

    /**
     * ユーザーのスキルを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserSkill($userId)
    {
        $userThemeData = DB::table('skill_m')
            ->join('specialty_skill_t', 'skill_m.theme_id', '=', 'specialty_skill_t.skill_id')
            ->select('skill_m.skill_id', 'skill_m.skill_name', 'specialty_skill_t.user_id')
            ->where('specialty_skill_t.user_id', $userId)
            ->get();
        return $userThemeData;
    }

    /**
     * スキル登録
     * @param $userId
     * @param $skillId
     * @return bool
     */
    public static function registSkill($userId, $skillId)
    {
        $result = DB::table('specialty_skill_t')
            ->insert(
                ['user_id' => $userId, 'skill_id' => $skillId, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * スキル削除
     * @param $userId
     * @param $skillId
     * @return bool
     */
    public static function deleteSkill($userId, $skillId)
    {
        $result = DB::table('specialty_skill_t')
            ->where('user_id', $userId)
            ->where('skill_id', $skillId)
            ->delete();
        return $result;
    }
}
