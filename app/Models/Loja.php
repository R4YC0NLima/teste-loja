<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loja extends Model
{
    use HasFactory;

    protected $table    = 'lojas';

    protected $fillable = [
        'nome_loja',
        'email'
    ];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
