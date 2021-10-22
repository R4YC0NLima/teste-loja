<?php

namespace Tests\Feature\Models;

use App\Models\Loja;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduto()
    {

        $produto            = new Produto();
        $produto->nome      = 'arroz';
        $produto->valor     = 10;
        $produto->loja_id   = $this->createLoja();
        $produto->ativo     = 1;
        $produto->save();

        $this->compareColunas();

        $assert = Produto::where('nome', 'arroz')->first();

        $this->assertNotNull($assert);
        $this->assertUpdateProduto($produto);
        $this->assertDeleteProduto($produto);

    }

    public function CreateLoja()
    {
        $loja = new Loja();
        $loja->nome_loja    = 'Super 10';
        $loja->email        = 'super10@gmail.com';
        $loja->save();

        return $loja->id;
    }

    private function assertUpdateProduto($produto)
    {
        $data = [
            'nome'  => 'feijão',
            'valor' => 10,
        ];

        $produto->update($data);

        $update = Produto::where('nome', 'feijão')->first();

        $this->assertNotNull($update);
    }

    private function assertDeleteProduto($produto)
    {
        $produto->delete();
        $delete = Produto::where('id', $produto->id)->first();
        $this->assertNull($delete);
    }
    private function compareColunas()
    {
        $produtos = Produto::all();
        $this->assertCount($produtos->count(), $produtos);

        $produtoKey = array_keys($produtos->first()->getAttributes());

        $this->assertEqualsCanonicalizing(
            [
                'id',
                'nome',
                'valor',
                'loja_id',
                'ativo',
                'created_at',
                'updated_at',
            ],
            $produtoKey
        );
    }
}
