<?php

namespace Tests\Unit;

use App\Http\Controllers\ProducaoController;
use App\Models\Producao;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;


class ProducaoTest extends TestCase
{
    use DatabaseMigrations;

    public function testCriarSaborParaProducao()
    {
        //      Arrange
        $producao = new Producao();
        $request = Request::create('/producao/adicionar', 'POST', [
            'sabor' => 'Morango',
            'data' => '2023-04-26',
            'quantidade' => '10L',
        ]);
        $controller = new ProducaoController();

        //        Act
        $response = $controller->store($request);
        $producao = Producao::where('sabor', 'Morango')->first();

        //        Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotNull($producao);

    }

    public function testEditarSabor()
    {
        //      Arrange
        $producao = new Producao();
        $controller = new ProducaoController();
        $request = Request::create('/producao/editar', 'POST', [
            'id' => 1,
            'sabor' => 'Chocolate',
            'data' => '2023-04-26',
            'quantidade' => '20L',
        ]);

        //        Act
        $producao = Producao::factory()->create();
        $producao = Producao::find(1);
        $response = $controller->update($request, $producao);
        $producao = Producao::where('sabor', 'Chocolate')->first();

        //        Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotNull($producao);
        $this->assertEquals('Chocolate', $producao->sabor);

    }
}
