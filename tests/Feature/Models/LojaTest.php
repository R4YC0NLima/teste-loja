<?php

namespace Tests\Feature\Models;

use App\Models\Loja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LojaTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateLoja()
    {

        $loja = Loja::create([
            'nome_loja' => 'Super 10',
            'email'     => 'super10@gmail.com'
        ]);

        $this->compareColunas();

        $assert = Loja::where('nome_loja', 'Super 10')->first();

        $this->assertNotNull($assert);
        $this->assertUpdateLoja($loja);
        $this->assertDeleteLoja($loja);

    }

    private function assertUpdateLoja($loja)
    {
        $data = [
            'nome_loja'     => 'Super 11',
            'email'         => 'super11@gmail.com',
        ];

        $loja->update($data);

        $update = Loja::where('nome_loja', 'Super 11')->first();

        $this->assertNotNull($update);
    }

    private function assertDeleteLoja($loja)
    {
        $loja->delete();

        $delete = Loja::where('id', $loja->id)->first();

        $this->assertNull($delete);
    }
    private function compareColunas()
    {
        $lojas = Loja::all();
        $this->assertCount($lojas->count(), $lojas);

        $lojaKey = array_keys($lojas->first()->getAttributes());

        $this->assertEqualsCanonicalizing(
            [
                'id',
                'nome_loja',
                'email',
                'updated_at',
                'created_at',
            ],
            $lojaKey
        );
    }
}
