<?php
/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 2018/8/1
 * Time: 15:21
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $fillable = [
        'is_on',
        'icp_number',
        'name',
        'title',
        'keywords',
        'description',
        'contact',
        'logo',
        'email',
        'code',
        'address',
        'copyright',
    ];
}
