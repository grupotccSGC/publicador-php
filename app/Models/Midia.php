<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Midia extends Model
{

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'db_midia';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'tamanho',
        'largura',
        'altura',
        'url',
        'data_cadastro'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'removido'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data_cadastro' => 'datetime',
        'data_cadastro' => 'datetime:d/m/Y',
        'removido' => 'boolean'
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

   
    public function scopeSearch($query, $request = null)
    {
        if ($request === null) {
            $request = request();
        }

        $termos = $request->only('data_cadastro');

        foreach ($termos as $chave => $valor) {
            if ($valor) { 
                $query->where($chave, 'LIKE', '%' . $valor . '%');
            }
        }

        
        return $query;
    }

   

}
