<?php

namespace Tests\Unit\App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;

class ProdutoUnitTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillableAttribute()
    {
        $fillable = [
            'nome',
            'valor',
            'ativo'
        ];
        $loja = new Produto();
        $this->assertEquals($fillable, $loja->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [HasFactory::class];
        $lojaTraits = array_keys(class_uses(Produto::class));
        $this->assertEquals($traits, $lojaTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at'];
        $produto = new Produto();
        foreach ($dates as $date) {
            $this->assertContains($date, $produto->getDates());
        }
        $this->assertCount(count($dates), $produto->getDates());
    }

    public function testCastsAttribute()
    {
        $casts = ['ativo' => 'boolean', 'id' => 'integer'];
        $produto = new Produto();
        $this->assertEquals($casts, $produto->getCasts());
    }
}
