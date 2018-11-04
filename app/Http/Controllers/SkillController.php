<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * スキル一覧取得
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Skill::getSkill());
    }

    /**
     * 職種ごとのスキル取得
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getJobCategorySkill(Request $request)
    {
        if (empty($request->jobCategoryId) || empty($request->skillType))
        {
            return response("error");
        }
        return response(Skill::getJobCategorySkill($request->jobCategoryId, $request->skillType));
    }

    /**
     * ユーザーのスキル取得
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserSkill($userId)
    {
        return response(Skill::getUserSkill($userId));
    }

    /**
     * スキルの登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registSkill(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->skillId))
        {
            return response("error");
        }

        if ((Skill::registSkill($request->userId, $request->skillId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * スキルの登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteSkill(Request $request)
    {
        if (empty($request->userId) || empty($request->skillId))
        {
            return response("error");
        }

        if ((Skill::deleteSkill($request->userId, $request->skillId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
