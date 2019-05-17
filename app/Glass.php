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
    // 画像複数
    public function glassImages()
    {
        // 第一引数 関連するモデル名
        // 第二引数 外部キー(従テーブル、リレーション先、参照先に設定)、主テーブルのモデル名_idの場合省略可
        // この場合の第二引数は、従テーブルの外部キーであるglass_idとなり、glassは主テーブルのモデル名なので省略している
        // 第三引数 内部キー(主テーブル、リレーション元、参照元に設定)、idの場合省略可
        // この場合の第三引数は、主テーブルの内部キーであるidとななるので省略している
        return $this->hasMany(GlassImage::class);
    }
    // お気に入り、多対多
    public function favorites()
    {
        // 第一引数 関連するモデル名
        // 第二引数 リレーションを保存するテーブル名、関連するモデル名をアルファベット順にアンダースコアで連結したテーブル名の場合省略可
        // この場合、glass_userというテーブル名でないので指定している
        // 第三引数 リレーションを定義しているモデルの外部キー、リレーションを定義しているモデル_idの場合省略可
        // この場合の第三引数は、今リレーションを定義いているglassモデルのidで規則に則っているので省略している
        // 第三引数 、リレーションを定義をしている現モデルの相手モデルの外部キー、相手モデル_idの場合省略可
        // この場合の第三引数は、相手モデルuserモデルのidで規則に則っているので省略している
        return $this->belongsToMany(User::class, 'favorites');
    }
    // オーナー、多対多
    public function owners()
    {
        return $this->belongsToMany(User::class, 'owners');
    }
}
