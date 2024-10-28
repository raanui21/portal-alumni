<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'password',
        'nama',
        'nim',
        'fakultas',
        'program_studi',
        'jenis_kelamin',
        'email_kampus',
        'email_pribadi',
        'no_hp',
        'tahun_masuk',
        'tahun_lulus',
    ];

    public function survey(): HasOne
    {

        return $this->hasOne(Survey::class, "user_id", "id");
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id; 
    }


    public function getAuthPasswordName()
    {
        return 'password';
    }
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->token;
    }

    public function setRememberToken($value)
    {
        $this->token = $value;
    }

    public function getRememberTokenName()
    {

        return 'token';
    }
}
