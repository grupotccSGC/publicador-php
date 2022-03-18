<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'db_contato';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'ddd',
        'telefone',
        'empresa',
        'menssagem',
        'data_de_envio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data_de_envio' => 'datetime',
        'data_de_envio' => 'datetime:d/m/Y',
        'updated_date' => 'datetime'
    ];

    public function scopeSearch($query, $request = null)
    {
        if ($request === null) {
            $request = request();
        }

        $termos = $request->only('nome', 'email', 'telefone');

        foreach ($termos as $chave => $valor) {
            if ($valor) { 
                $query->where($chave, 'LIKE', '%' .$valor. '%');
            }
        }

        
        return $query;
    }
}
