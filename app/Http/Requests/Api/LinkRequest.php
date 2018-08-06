<?php
/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 2018/8/1
 * Time: 12:03
 */

namespace App\Http\Requests\Api;

class LinkRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|max:255|unique:links',
                    'url'  => 'required|url|max:255|unique:links',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'required|string|max:255',
                    'url'  => 'required|url|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '友情链接不能为空',
            'name.string'   => '友情链接必须为字符串类型',
            'name.max'      => '友情链接最大字符长度不能超过 255 个字符',
            'name.unique'   => '友情链接已经存在',
            'url.required'  => '链接 URL 不能为空',
            'url.url'       => '链接 URL 非法',
            'url.max'       => '链接 URL 最大字符长度不能超过 255 个字符',
            'url.unique'    => '链接 URL 已经存在',
        ];
    }
}