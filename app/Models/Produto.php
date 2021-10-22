<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $table    = 'produtos';

    protected $fillable = [
        'nome',
        'valor',
        'ativo'
    ];

    protected $dates    = [
        'created_at',
        'updated_at',
    ];

    protected $casts    = [
        'id'    => 'integer',
        'ativo' => 'boolean',
    ];

    public function loja(): BelongsTo
    {
        return $this->belongsTo(Loja::class, 'loja_id', 'id');
    }

    public function getValorAttribute($numero): string
    {
        return 'R$ ' . number_format($numero, 2, ',','.');
    }
}
