<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    /**
     * 与模型关联的数据表
     */
    protected $table = 'user';
    protected $fillable = ['username ','age '];
    protected $guarded = ['created_at','updated_at'];
}
