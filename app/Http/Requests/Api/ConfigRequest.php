<?php

namespace App\Http\Requests\Api;


class ConfigRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'is_on'       => 'required|numeric:',
            'icp_number'  => 'required|string|max:55',
            'name'        => 'sometimes|required|string|max:255',
            'title'       => 'sometimes|required|string|max:255',
            'keywords'    => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:255',
            'contact'     => 'required|string|max:255',
            'logo'        => 'required|string|max:255',
            'email'       => 'required|email',
            'code'        => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'copyright'   => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'icp_number.required'  => '网站备案号不能为空',
            'icp_number.string'    => '网站备案号必须为字符串类型',
            'icp_number.max'       => '网站备案号最大字符长度不能超过 255 个字符',
            'name.required'        => '网站名称不能为空',
            'name.string'          => '网站名称必须为字符串类型',
            'name.max'             => '网站名称最大字符长度不能超过 255 个字符',
            'title.required'       => '网站标题不能为空',
            'title.string'         => '网站标题必须为字符串类型',
            'title.max'            => '网站标题最大字符长度不能超过 255 个字符',
            'keywords.required'    => '网站关键字不能为空',
            'keywords.string'      => '网站关键字必须为字符串类型',
            'keywords.max'         => '网站关键字最大字符长度不能超过 255 个字符',
            'description.required' => '网站描述不能为空',
            'description.string'   => '网站描述必须为字符串类型',
            'description.max'      => '网站描述最大字符长度不能超过 255 个字符',
            'contact.required'     => '联系方式不能为空',
            'contact.string'       => '联系方式必须为字符串类型',
            'contact.max'          => '联系方式最大字符长度不能超过 255 个字符',
            'logo.required'        => '网站 logo 不能为空',
            'logo.string'          => '网站 logo 必须为字符串类型',
            'logo.max'             => '网站 logo 最大字符长度不能超过 255 个字符',
            'email.required'       => '邮箱不能为空',
            'email.email'          => '邮箱格式不正确',
            'code.required'        => '邮编不能为空',
            'code.string'          => '邮编必须为字符串类型',
            'code.max'             => '邮编最大字符长度不能超过 255 个字符',
            'address.required'     => '公司地址不能为空',
            'address.string'       => '公司地址必须为字符串类型',
            'address.max'          => '公司地址最大字符长度不能超过 255 个字符',
            'copyright.required'   => '版权信息不能为空',
            'copyright.string'     => '版权信息必须为字符串类型',
            'copyright.max'        => '版权信息最大字符长度不能超过 255 个字符',
        ];
    }
}
