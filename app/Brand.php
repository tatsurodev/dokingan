<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // リレーション定義
    // メガネ
    public function glasses()
    {
        return $this->hasMany(Glass::class);
    }
}
