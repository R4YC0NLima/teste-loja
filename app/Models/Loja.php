<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $table    = 'lojas';

    protected $fillable = [
        'nome_loja',
        'email'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
