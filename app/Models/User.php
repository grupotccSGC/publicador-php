<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    protected $table = 'db_usuario';

    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    
    protected $fillable = [
        'nome',
        'email',
        'nivel_acesso',
        'avatar',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    
    protected $hidden = [
        'password',
        '_token',
        'removido'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_usuario' => 'datetime:d/m/Y',
        'removido' => 'boolean'
    ];

    public function scopeSearch($query, $request = null)
    {
        if ($request === null) {
            $request = request();
        }

        $termos = $request->only('nome', 'email');

        foreach ($termos as $chave => $valor) {
            if ($valor) { 
                $query->where($chave, 'LIKE', '%' . $valor . '%');
            }
        }

        
        return $query;
    }
    
}