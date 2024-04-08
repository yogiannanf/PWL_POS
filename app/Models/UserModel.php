<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Monolog\Level;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     * 
     *  @var array
     */
    //protected $fillable = ['level_id', 'username', 'nama'];

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //Jobsheet 3
    // protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    // protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan
}
