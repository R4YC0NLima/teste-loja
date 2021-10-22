<?php

namespace Tests\Unit\App\Models;

use App\Models\Loja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;

class LojaUnitTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillableAttribute()
    {
        $fillable = [
            'nome_loja',
            'email'
        ];
        $loja = new Loja();
        $this->assertEquals($fillable, $loja->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [HasFactory::class];
        $lojaTraits = array_keys(class_uses(Loja::class));
        $this->assertEquals($traits, $lojaTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at'];
        $loja = new Loja();
        foreach ($dates as $date) {
            $this->assertContains($date, $loja->getDates());
        }
        $this->assertCount(count($dates), $loja->getDates());
    }
}
