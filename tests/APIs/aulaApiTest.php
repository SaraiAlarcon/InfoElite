<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\aula;

class aulaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_aula()
    {
        $aula = factory(aula::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/aulas', $aula
        );

        $this->assertApiResponse($aula);
    }

    /**
     * @test
     */
    public function test_read_aula()
    {
        $aula = factory(aula::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/aulas/'.$aula->id
        );

        $this->assertApiResponse($aula->toArray());
    }

    /**
     * @test
     */
    public function test_update_aula()
    {
        $aula = factory(aula::class)->create();
        $editedaula = factory(aula::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/aulas/'.$aula->id,
            $editedaula
        );

        $this->assertApiResponse($editedaula);
    }

    /**
     * @test
     */
    public function test_delete_aula()
    {
        $aula = factory(aula::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/aulas/'.$aula->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/aulas/'.$aula->id
        );

        $this->response->assertStatus(404);
    }
}
