<?php

namespace Modules\Abastecimento\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Motoristas\Entities\Motoristas;
use Modules\Veiculo\Entities\Veiculo;

class Abastecimento extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'veiculo_id', 'motorista_id', 'data', 'tipo_combustivel', 'quantidade_combustivel', 'valor' ];

    protected $table = 'abastecimentos';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Abastecimento $item) {

        });

        static::deleting(function (Abastecimento $item) {


        });

    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function motorista()
    {
        return $this->belongsTo(Motoristas::class);
    }
}
