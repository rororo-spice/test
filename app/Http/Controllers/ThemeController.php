<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * テーマ一覧取得
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Theme::getThemeList());
    }

    /**
     * ユーザーの得意テーマ取得
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserSpecialtyTheme($userId)
    {
        return response(Theme::getUserSpecialtyTheme($userId));
    }

    /**
     * 得意テーマの登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registSpecialtyTheme(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->themeId))
        {
            return response("error");
        }

        if ((Theme::registSpecialtyTheme($request->userId, $request->themeId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * 得意テーマの登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteSpecialtyTheme(Request $request)
    {
        if (empty($request->userId) || empty($request->themeId))
        {
            return response("error");
        }

        if ((Theme::deleteSpecialtyTheme($request->userId, $request->themeId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
