<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //Eloquentに使用するテーブルを宣言
    protected $table = 'my_flights';
    //created_atとupdated_atがいらない場合は牡蠣を入力
    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    //データベース接続
    protected $connection = 'laravel_study';
}
