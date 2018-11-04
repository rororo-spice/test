<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Theme extends Model
{
    protected $table = 'theme_m';
    protected $primaryKey = 'theme_id';

    /**
     * テーマ一覧取得
     * @return \Illuminate\Support\Collection
     */
    public static function getThemeList()
    {
        $themeList = DB::table('theme_m')
            ->select('theme_id', 'name')
            ->get();
        return $themeList;
    }

    /**
     * ユーザーの得意なテーマを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserSpecialtyTheme($userId)
    {
        $userThemeData = DB::table('theme_m')
            ->join('specialty_theme_t', 'theme_m.theme_id', '=', 'specialty_theme_t.theme_id')
            ->select('theme_m.theme_id', 'theme_m.name', 'specialty_theme_t.user_id')
            ->where('specialty_theme_t.user_id', $userId)
            ->get();
        return $userThemeData;
    }

    /**
     * 得意テーマ登録
     * @param $userId
     * @param $themeId
     * @return bool
     */
    public static function registSpecialtyTheme($userId, $themeId)
    {
        $result = DB::table('specialty_theme_t')
            ->insert(
                ['user_id' => $userId, 'theme_id' => $themeId, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 得意テーマ削除
     * @param $userId
     * @param $themeId
     * @return bool
     */
    public static function deleteSpecialtyTheme($userId, $themeId)
    {
        $result = DB::table('specialty_theme_t')
            ->where('user_id', $userId)
            ->where('theme_id', $themeId)
            ->delete();
        return $result;
    }
}
