<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'project_m';
    protected $primaryKey = 'project_id';

    /**
     * 案件一覧を取得する
     * @param $sortType
     * @return \Illuminate\Support\Collection
     */
    public static function getProjectList($sortType)
    {
        $userData = DB::table('project_m')
            ->select('project_id', 'project_name', 'recruitment_people', 'requir_languege', 'requir_tool', 'requir_experience', 'honorarium', 'status', 'application_period', 'deadline')
            ->when($sortType == 1, function ($query) {
                return $query->orderBy('create_at', 'desc');
            })
            ->when($sortType == 2, function ($query) {
                return $query->orderBy('create_at', 'desc');
            })
            ->when($sortType == 3, function ($query) {
                return $query->orderBy('create_at', 'desc');
            })
            ->get();
        return $userData;
    }

    /**
     * お気に入りの案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getFavoriteProjectList($userId)
    {
        $userData = DB::table('project_m')
            ->join('favorite_project_t', 'project_m.project_id', '=', 'favorite_project_id.project_id')
            ->select('project_m.project_id', 'project_m.project_name', 'project_m.recruitment_people', 'project_m.requir_languege', 'project_m.requir_tool', 'project_m.requir_experience', 'project_m.honorarium', 'project_m.status', 'project_m.application_period', 'project_m.deadline')
            ->where('favorite_project_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * 受注案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getAcceptProjectList($userId)
    {
        $userData = DB::table('project_m')
            ->join('accept_project_t', 'project_m.user_id', '=', 'accept_project_t.user_id')
            ->select('project_m.project_id', 'project_m.project_name', 'project_m.recruitment_people', 'project_m.requir_languege', 'project_m.requir_tool', 'project_m.requir_experience', 'project_m.honorarium', 'project_m.status', 'project_m.application_period', 'project_m.deadline')
            ->where('accept_project_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * 依頼案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public static function getRequestProjectList($userId)
    {
        $userData = DB::table('project_m')
            ->join('request_project_t', 'project_m.user_id', '=', 'request_project_t.user_id')
            ->select('project_m.project_id', 'project_m.project_name', 'project_m.recruitment_people', 'project_m.requir_languege', 'project_m.requir_tool', 'project_m.requir_experience', 'project_m.honorarium', 'project_m.status', 'project_m.application_period', 'project_m.deadline')
            ->where('request_project_t.user_id', $userId)
            ->get();
        return $userData;
    }

    /**
     * 案件登録
     * @param $projectName
     * @param $projectDetailText
     * @param $recruitmentPeople
     * @param $requirLanguege
     * @param $requirTool
     * @param $requirExperience
     * @param $honorarium
     * @param $advancePaymentFlg
     * @param $promanFlg
     * @param $status
     * @param $applicationPeriod
     * @param $deadline
     * @return bool
     */
    public static function registProject($projectName, $projectDetailText, $recruitmentPeople, $requirLanguege, $requirTool, $requirExperience, $honorarium, $advancePaymentFlg, $promanFlg, $status, $applicationPeriod, $deadline)
    {
        $result = DB::table('project_m')
            ->insert(
                ['project_name' => $projectName, 'project_detail_text' => $projectDetailText, 'recruitment_people' => $recruitmentPeople
                ,'requir_languege' => $requirLanguege, 'requir_tool' => $requirTool, 'requir_experience' => $requirExperience
                ,'honorarium' => $honorarium, 'advance_payment_flg' => $advancePaymentFlg, 'promane_flg' => $promanFlg
                ,'status' => $status, 'application_period' => $applicationPeriod, 'deadline' => $deadline, 'created_at' => Carbon::now()]
            );
        return $result;
    }

    /**
     * 案件更新
     * @param $request
     * @return bool
     */
    public static function updateProject($request)
    {
        $result = DB::table('project_m')
            ->where('project_id', $request->projectId)
            ->when($request->projectName, function ($query) use ($request) {
                return $query->update('project_name', $request->projectName);
            })
            ->when($request->projectDetailText, function ($query) use ($request) {
                return $query->update('project_detail_text', $request->projectDetailText);
            })
            ->when($request->recruitmentPeople, function ($query) use ($request) {
                return $query->update('recruitment_people', $request->recruitmentPeople);
            })
            ->when($request->requirLanguege, function ($query) use ($request) {
                return $query->update('requir_languege', $request->requirLanguege);
            })
            ->when($request->requirTool, function ($query) use ($request) {
                return $query->update('requir_tool', $request->requirTool);
            })
            ->when($request->requirExperience, function ($query) use ($request) {
                return $query->update('requir_experience', $request->requirExperience);
            })
            ->when($request->honorarium, function ($query) use ($request) {
                return $query->update('honorarium', $request->honorarium);
            })
            ->when($request->advancePaymentFlg, function ($query) use ($request) {
                return $query->update('advance_payment_flg', $request->advancePaymentFlg);
            })
            ->when($request->promanFlg, function ($query) use ($request) {
                return $query->update('promane_flg', $request->promanFlg);
            })
            ->when($request->status, function ($query) use ($request) {
                return $query->update('status', $request->status);
            })
            ->when($request->applicationPeriod, function ($query) use ($request) {
                return $query->update('application_period', $request->applicationPeriod);
            })
            ->when($request->deadline, function ($query) use ($request) {
                return $query->update('deadline', $request->deadline);
            });
        return $result;
    }
}
