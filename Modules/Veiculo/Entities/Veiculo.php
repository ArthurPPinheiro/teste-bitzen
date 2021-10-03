<?php

namespace Modules\Veiculo\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Abastecimento\Entities\Abastecimento;

class Veiculo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'placa', 'nome_veiculo', 'tipo_combustivel', 'fabricante', 'ano_fabricacao', 'capacidade_tanque', 'observacoes' ];

    protected $table = 'veiculos';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Veiculo $item) {

        });

        static::deleting(function (Veiculo $item) {


        });

    }

    public function abastecimentos()
    {
        $this->hasMany(Abastecimento::class);
    }
}
