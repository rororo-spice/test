<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'user_m';
    protected $primaryKey = 'user_id';

    /**
     * ユーザーのプロフィールを取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getUserProfile($userId)
    {
        $userData = DB::table('user_m')
            ->select('user_id', 'last_name', 'first_name', 'company_name', 'position'
                    ,'birthday', 'sex', 'leader_experience', 'icon_image'
                    ,'final_education', 'profile')
            ->where('user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * プロフィール更新
     * @param $request
     * @return bool
     */
    public static function updateUserProfile($request)
    {
        $result = DB::table('user_m')
            ->where('user_id', $request->userId)
            ->when($request->lastName, function ($query) use ($request) {
                return $query->update('last_name', $request->lastName);
            })
            ->when($request->firstName, function ($query) use ($request) {
                return $query->update('first_name', $request->firstName);
            })
            ->when($request->companyName, function ($query) use ($request) {
                return $query->update('company_name', $request->companyName);
            })
            ->when($request->position, function ($query) use ($request) {
                return $query->update('position', $request->position);
            })
            ->when($request->birthday, function ($query) use ($request) {
                return $query->update('birthday', $request->birthday);
            })
            ->when($request->sex, function ($query) use ($request) {
                return $query->update('sex', $request->sex);
            })
            ->when($request->leaderExperience, function ($query) use ($request) {
                return $query->update('leader_experience', $request->leaderExperience);
            })
            ->when($request->iconImage, function ($query) use ($request) {
                return $query->update('icon_image', $request->iconImage);
            })
            ->when($request->finalEducation, function ($query) use ($request) {
                return $query->update('final_education', $request->finalEducation);
            })
            ->when($request->profile, function ($query) use ($request) {
                return $query->update('profile', $request->profile);
            });
        return $result;
    }
}
