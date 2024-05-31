<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @mixin IdeHelperUser
 */
class UserModel extends Authenticatable implements JWTSubject
{

    public function getJWTIdentifier()
   {
    return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
    return [];
   }

    protected $table = 'm_user';
    protected $primaryKey = "user_id";

    protected $fillable = [
            'username',
            'nama',
            'password',
            'level_id',
            'image'
        ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    protected function image()
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}
  