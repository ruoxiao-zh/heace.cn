<?php

namespace App\Http\Requests\Api;

class ArticleCategoryRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|max:100',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'required|string|max:100',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '文章分类名称不能为空',
            'name.string'   => '文章分类名称必须为字符串类型',
            'name.max'      => '文章分类名称最大字符长度不能超过 100 个字符',
        ];
    }
}
