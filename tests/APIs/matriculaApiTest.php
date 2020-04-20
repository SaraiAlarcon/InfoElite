<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\matricula;

class matriculaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_matricula()
    {
        $matricula = factory(matricula::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/matriculas', $matricula
        );

        $this->assertApiResponse($matricula);
    }

    /**
     * @test
     */
    public function test_read_matricula()
    {
        $matricula = factory(matricula::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/matriculas/'.$matricula->id
        );

        $this->assertApiResponse($matricula->toArray());
    }

    /**
     * @test
     */
    public function test_update_matricula()
    {
        $matricula = factory(matricula::class)->create();
        $editedmatricula = factory(matricula::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/matriculas/'.$matricula->id,
            $editedmatricula
        );

        $this->assertApiResponse($editedmatricula);
    }

    /**
     * @test
     */
    public function test_delete_matricula()
    {
        $matricula = factory(matricula::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/matriculas/'.$matricula->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/matriculas/'.$matricula->id
        );

        $this->response->assertStatus(404);
    }
}
