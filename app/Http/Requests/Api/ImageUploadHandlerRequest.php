<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class ImageUploadHandlerRequest extends BaseRequest
{
    public function rules()
    {
        return [
            // 'images'   => 'mimes:jpg,jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
            'images'   => 'mimes:jpg,jpeg,bmp,png,gif',
            'filename' => [
                'required',
                Rule::in(['articles', 'slideshows', 'config', 'card']),
            ],
        ];
    }

    public function messages()
    {
        return [
            'images.mimes'      => '图片必须是 jpg, jpeg, bmp, png, gif 格式',
            // 'images.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上',
            'filename.required' => '图片上传文件目录不能为空',
            'filename.in'       => '图片上传文件目录只能是 [articles, slideshows, config, card] 数组中的任一值',
        ];
    }
}
