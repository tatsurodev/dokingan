<?php

namespace App;

use App\Glass;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーション定義
    // Sexモデル
    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
    // Glassモデル
    public function glasses()
    {
        return $this->hasMany(Glass::class);
    }
    // お気に入り、多対多
    public function favorites()
    {
        return $this->belongsToMany(Glass::class, 'favorites')->withTimestamps();
    }
    // オーナー、多対多
    public function owners()
    {
        return $this->belongsToMany(Glass::class, 'owners')->withTimestamps();
    }
}
