<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\apoderado;

class apoderadoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_apoderado()
    {
        $apoderado = factory(apoderado::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/apoderados', $apoderado
        );

        $this->assertApiResponse($apoderado);
    }

    /**
     * @test
     */
    public function test_read_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/apoderados/'.$apoderado->id
        );

        $this->assertApiResponse($apoderado->toArray());
    }

    /**
     * @test
     */
    public function test_update_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();
        $editedapoderado = factory(apoderado::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/apoderados/'.$apoderado->id,
            $editedapoderado
        );

        $this->assertApiResponse($editedapoderado);
    }

    /**
     * @test
     */
    public function test_delete_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/apoderados/'.$apoderado->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/apoderados/'.$apoderado->id
        );

        $this->response->assertStatus(404);
    }
}
