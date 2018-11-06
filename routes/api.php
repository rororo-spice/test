<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// テーマ
Route::get('/theme', 'ThemeController@index');
Route::get('/theme/userSpecialtyTheme/{userId}', 'ThemeController@userSpecialtyTheme');
Route::post('/theme/registSpecialtyTheme', 'ThemeController@registSpecialtyTheme');
Route::post('/theme/deleteSpecialtyTheme', 'ThemeController@deleteSpecialtyTheme');

// 職種
Route::get('/jobcategory', 'JobCategoryController@index');
Route::get('/jobcategory/getUserJobCategory/{userId}', 'JobCategoryController@getUserJobCategory');
Route::post('/jobcategory/registJobCategory', 'JobCategoryController@registJobCategory');
Route::post('/jobcategory/deleteJobCategory', 'JobCategoryController@deleteJobCategory');

// スキル
Route::get('/skill', 'SkillController@index');
Route::get('/skill/getJobCategorySkill/{jobCategoryId}', 'SkillController@getJobCategorySkill');
Route::get('/skill/getUserSkill/{userId}', 'SkillController@getUserSkill');
Route::post('/skill/registSkill', 'SkillController@registSkill');
Route::post('/skill/deleteSkill', 'SkillController@deleteSkill');

// 職歴
Route::get('/jobhistory/getUserJobHistory/{userId}', 'JobHistoryController@getUserJobHistory');
Route::post('/jobhistory/registJobHistory', 'JobHistoryController@registJobHistory');
Route::post('/jobhistory/deleteJobHistory', 'JobHistoryController@deleteJobHistory');

// ブロック企業
Route::get('/blockcompany/getUserBlockCompany/{userId}', 'BlockCompanyController@getUserBlockCompany');
Route::post('/blockcompany/registBlockCompany', 'BlockCompanyController@registBlockCompany');
Route::post('/blockcompany/deleteBlockCompany', 'BlockCompanyController@deleteBlockCompany');

// 口座
Route::get('/account/getUserAccount/{userId}', 'AccountController@getUserAccount');
Route::post('/account/registAccount', 'AccountController@registAccount');
Route::post('/account/deleteAccount', 'AccountController@deleteAccount');

// レビュー
Route::get('/review/getUserReview/{userId}', 'ReviewController@getUserReview');
Route::get('/review/getUserReview/{userId}', 'ReviewController@getWriteUserReview');
Route::post('/review/registReview', 'ReviewController@registReview');
Route::post('/review/deleteReview', 'ReviewController@deleteReview');

// フォロー
Route::get('/follow/getUserFollow/{userId}', 'FollowController@getUserFollow');
Route::get('/follow/getUserFollower/{userId}', 'FollowController@getUserFollower');
Route::post('/follow/registFollow', 'FollowController@registFollow');
Route::post('/follow/deleteFollow', 'FollowController@deleteFollow');

// 案件
Route::get('/project/getFavoriteProjectList/{userId}', 'ProjectController@getFavoriteProjectList');
Route::get('/project/getAcceptProjectList/{userId}', 'ProjectController@getAcceptProjectList');
Route::get('/project/getRequestProjectList/{userId}', 'ProjectController@getRequestProjectList');
Route::post('/project/getProjectList', 'ProjectController@getProjectList');
Route::post('/project/registProject', 'ProjectController@registProject');
Route::post('/project/updateProject', 'ProjectController@updateProject');

// メッセージ
Route::post('/message/getUserMessageList', 'MessageController@getUserMessageList');
Route::post('/message/startMessage', 'MessageController@startMessage');
Route::post('/message/postMessage', 'MessageController@postMessage');
Route::post('/message/getMessage', 'MessageController@getMessage');

// ユーザー
Route::post('/user/getUserProfile', 'UserController@getUserProfile');
Route::post('/user/updateUserProfile', 'UserController@updateUserProfile');






