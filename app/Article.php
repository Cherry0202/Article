<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //事前に登録できる項目を宣言しておく必要がある
    protected $fillable = ['title', 'body', 'published_at'];

    // published_at で日付ミューテータを使う
    protected $dates = ['published_at'];

    public function getTitleAttribute($value)
    {
        // 大文字に変換
        return mb_strtoupper($value);
    }
    public function setTitleAttribute($value)
    {
        // 小文字に変換
        $this->attributes['title'] = mb_strtolower($value);
    }
    //モデルに scope メソッドを追加
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }
}
