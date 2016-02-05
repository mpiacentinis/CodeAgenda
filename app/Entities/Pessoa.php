<?php
/**
 * Created by PhpStorm.
 * User: mpiacentinis
 * Date: 28/01/16
 * Time: 14:39
 */

namespace CodeAgenda\Entities;


use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';

    protected $fillable = [
        'name',
        'apelido',
        'cpf',
        'sexo'
    ];

    public function telefone(){
        return $this->hasMany(Telefone::class);
    }

}