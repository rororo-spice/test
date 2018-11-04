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

// レビュー
Route::get('/follow/getUserFollow/{userId}', 'FollowController@getUserFollow');
Route::get('/follow/getUserFollower/{userId}', 'FollowController@getUserFollower');
Route::post('/follow/registFollow', 'FollowController@registFollow');
Route::post('/follow/deleteFollow', 'FollowController@deleteFollow');




