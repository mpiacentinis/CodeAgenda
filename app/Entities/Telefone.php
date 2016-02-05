<?php
/**
 * Created by PhpStorm.
 * User: mpiacentinis
 * Date: 28/01/16
 * Time: 14:43
 */

namespace CodeAgenda\Entities;


use Illuminate\Database\Eloquent\Model;

class Telefone extends  Model
{
    protected $table = 'telefones';

    protected $fillable = [
        'descricao',
        'codipais',
        'ddd',
        'prefixo',
        'sufixo'
    ];

    public function getNumeroAttribute(){
        return "$this->codipais ( $this->ddd )  $this->prefixo  -   $this->sufixo ";
    }

    public function pessoas(){
        return $this->belongsTo(Pessoa::class);
    }


}