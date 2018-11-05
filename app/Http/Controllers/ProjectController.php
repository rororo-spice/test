<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * 案件一覧を取得する
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getProjectList(Request $request)
    {
        return response(Project::getProjectList($request->sortType));
    }

    /**
     * お気に入りの案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getFavoriteProjectList($userId)
    {
        return response(Project::getProjectList($userId));
    }

    /**
     * 受注案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getAcceptProjectList($userId)
    {
        return response(Project::getAcceptProjectList($userId));
    }

    /**
     * 依頼案件一覧を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getRequestProjectList($userId)
    {
        return response(Project::getRequestProjectList($userId));
    }


    /**
     * プロジェクト登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registProject(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->projectName) || empty($request->projectDetailText) || empty($request->recruitmentPeople) || empty($request->requirLanguege) || empty($request->requirTool) || empty($request->requirExperience) || empty($request->honorarium) || empty($request->advancePaymentFlg) || empty($request->promanFlg) || empty($request->status) || empty($request->applicationPeriod) || empty($request->deadline))
        {
            return response("error");
        }

        if ((Project::registProject($request->projectName, $request->projectDetailText, $request->recruitmentPeople, $request->requirLanguege, $request->requirTool, $request->requirExperience, $request->honorarium, $request->advancePaymentFlg, $request->promanFlg, $request->status, $request->applicationPeriod, $request->deadline)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * プロジェクト更新
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function updateProject(Request $request)
    {
        if (empty($request->projectId))
        {
            return response("error");
        }

        if ((Project::updateProject($request)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
