<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glass extends Model
{
    // リレーション定義
    // 投稿者
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // ブランド
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
