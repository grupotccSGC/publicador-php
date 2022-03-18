<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historias extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'db_historias';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'uf',
        'depoimento',
        'foto',
        'data_cadastro',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data_cadastro' => 'datetime',
        'data_cadastro' => 'datetime:d/m/Y h:m'
    ];

    public function scopeSearch($query, $request = null)
    {
        if ($request === null) {
            $request = request();
        }

        $termos = $request->only('nome', 'email', 'telefone', 'status');

        foreach ($termos as $chave => $valor) {
            if ($valor) { 
                $query->where($chave, '=', $valor );
            }
        }

        
        return $query;
    }


}
