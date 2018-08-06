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
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api',
    'middleware' => [
        'serializer:array',
        'bindings'
    ]
], function ($api) {
    $api->group([
        'middleware' => 'api.throttle',
        'limit'      => config('api.rate_limits.access.limit'),
        'expires'    => config('api.rate_limits.access.expires'),
    ], function ($api) {
        /**
         * 文章分类管理
         */
        // 添加
        $api->post('article-categories', 'ArticleCategoriesController@store')
            ->name('api.article-categories.store');
        // 更新
        $api->patch('article-categories/{articleCategory}', 'ArticleCategoriesController@update')
            ->name('api.article-categories.update');
        // 删除
        $api->delete('article-categories/{articleCategory}', 'ArticleCategoriesController@destroy')
            ->name('api.article-categories.destroy');
        // 列表
        $api->get('article-categories', 'ArticleCategoriesController@index')
            ->name('api.article-categories.index');
        // 详情
        $api->get('article-categories/{articleCategory}', 'ArticleCategoriesController@show')
            ->name('api.article-categories.show');

        /**
         * 文章管理
         */
        // 添加
        $api->post('articles', 'ArticlesController@store')
            ->name('api.articles.store');
        // 更新
        $api->patch('articles/{article}', 'ArticlesController@update')
            ->name('api.articles.update');
        // 删除
        $api->delete('articles/{article}', 'ArticlesController@destroy')
            ->name('api.articles.destroy');
        // 列表
        $api->get('articles', 'ArticlesController@index')
            ->name('api.articles.index');
        // 详情
        $api->get('articles/{article}', 'ArticlesController@show')
            ->name('api.articles.show');
        // 获取指定文章分类下的文章
        $api->get('category-articles', 'ArticlesController@categoryArticles')
            ->name('api.article-categories.articles');
        // 置顶与取消置顶
        $api->get('articles/change-top/{article}', 'ArticlesController@changeTop')
            ->name('api.articles.change.top');

        /**
         * 轮播图管理
         */
        // 添加
        $api->post('slide-shows', 'SlideShowsController@store')
            ->name('api.slide-shows.store');
        // 更新
        $api->patch('slide-shows/{slideShow}', 'SlideShowsController@update')
            ->name('api.slide-shows.update');
        // 删除
        $api->delete('slide-shows/{slideShow}', 'SlideShowsController@destroy')
            ->name('api.slide-shows.destroy');
        // 列表
        $api->get('slide-shows', 'SlideShowsController@index')
            ->name('api.slide-shows.index');
        // 详情
        $api->get('slide-shows/{slideShow}', 'SlideShowsController@show')
            ->name('api.slide-shows.show');

        /**
         * 友情链接管理
         */
        // 添加
        $api->post('links', 'LinksController@store')
            ->name('api.links.store');
        // 更新
        $api->patch('links/{link}', 'LinksController@update')
            ->name('api.links.update');
        // 删除
        $api->delete('links/{link}', 'LinksController@destroy')
            ->name('api.links.destroy');
        // 列表
        $api->get('links', 'LinksController@index')
            ->name('api.links.index');
        // 详情
        $api->get('links/{link}', 'LinksController@show')
            ->name('api.links.show');

        /**
         * 网站配置管理
         */
        // 添加
        $api->post('config', 'ConfigController@store')
            ->name('api.config.store');
        // 更新
        $api->patch('config/{config}', 'ConfigController@update')
            ->name('api.config.update');
        // 删除
        $api->delete('config/{config}', 'ConfigController@destroy')
            ->name('api.config.destroy');
        // 列表
        $api->get('config', 'ConfigController@index')
            ->name('api.config.index');
        // 详情
        $api->get('config/{config}', 'ConfigController@show')
            ->name('api.config.show');

        /**
         * 用户相关
         */
        // 图片验证码
        $api->get('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        // 刷新 token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
        // 删除token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');

        // 用户列表
        $api->get('users', 'UsersController@index')
                ->name('api.user.index');

        // 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function ($api) {
            // 当前登录用户信息
            $api->get('user', 'UsersController@me')
                ->name('api.user.show');
            // 用户注册
            $api->post('users', 'UsersController@store')
                ->name('api.users.store');
            // 用户信息修改
            $api->put('users', 'UsersController@update')
                ->name('api.users.update');
        });

        /**
         * 公共接口
         */
        // 图片上传
        $api->post('images/upload', 'ImageUploadHandlerController@upload')
            ->name('api.images.upload');
    });
});
