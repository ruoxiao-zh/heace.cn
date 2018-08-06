<?php

namespace App\Http\Requests\Api;

class CardRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title'   => 'required|string|max:100|unique:cards',
                    'images'  => 'required|json',
                    'content' => 'required',
                    'order'   => 'required|numeric',
                ];
                break;
            case 'PATCH':
                return [
                    'title'   => 'required|string|max:100',
                    'images'  => 'required|json',
                    'content' => 'required',
                    'order'   => 'required|numeric',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'title.required'   => '标题不能为空',
            'title.string'     => '标题必须为字符串类型',
            'title.max'        => '标题最大字符长度不能超过 100 个字符',
            'title.unique'     => '标题已经存在',
            'images.required'  => '图片不能为空',
            'images.string'    => '图片必须为 json 类型',
            'content.required' => '内容不能为空',
            'order.required'   => '排序不能为空',
            'order.numeric'    => '排序必须为数字类型',
        ];
    }
}