<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * ユーザーの口座を取得する
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getUserAccount($userId)
    {
        return response(Account::getUserAccount($userId));
    }

    /**
     * 口座登録
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registAccount(Request $request)
    {
        // Todo:すでに登録されていないか確認する
        if (empty($request->userId) || empty($request->bankName) || empty($request->accountType) || empty($request->officeName) || empty($request->accountNumber) || empty($request->accountName))
        {
            return response("error");
        }

        if ((Account::registAccount($request->userId, $request->bankName, $request->accountType, $request->officeName, $request->accountNumber, $request->accountName)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }

    /**
     * 口座削除
     * @param $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteAccount(Request $request)
    {
        if (empty($request->AccountId))
        {
            return response("error");
        }

        if ((Account::deleteAccount($request->AccountId)))
        {
            return response("ok");
        }
        else
        {
            return response("error");
        }
    }
}
