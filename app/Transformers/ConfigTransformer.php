<?php

namespace App\Transformers;

use App\Models\Config;
use League\Fractal\TransformerAbstract;

class ConfigTransformer extends TransformerAbstract
{
    public function transform(Config $config)
    {
        return [
            'id'          => $config->id,
            'is_on'       => !(boolean)$config->is_on,
            'icp_number'  => $config->icp_number,
            'name'        => $config->name,
            'title'       => $config->title,
            'keywords'    => $config->keywords,
            'description' => $config->description,
            'contact'     => $config->contact,
            'logo'        => $config->logo,
            'email'       => $config->email,
            'code'        => $config->code,
            'address'     => $config->address,
            'copyright'   => $config->copyright,
            'created_at'  => $config->created_at->toDateTimeString(),
            'updated_at'  => $config->updated_at->toDateTimeString(),
        ];
    }
}
