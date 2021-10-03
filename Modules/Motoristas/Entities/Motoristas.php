<?php

namespace Modules\Motoristas\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Abastecimento\Entities\Abastecimento;

class Motoristas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'cpf', 'cnh', 'cnh_type', 'birthday', 'status' ];

    protected $table = 'motoristas';

    protected static function boot()
    {
        parent::boot();

        static::saved(function (Motoristas $item) {

        });

        static::deleting(function (Motoristas $item) {


        });

    }

    public function abastecimentos()
    {
        $this->hasMany(Abastecimento::class);
    }
}
