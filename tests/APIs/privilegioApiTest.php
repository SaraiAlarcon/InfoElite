<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\privilegio;

class privilegioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_privilegio()
    {
        $privilegio = factory(privilegio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/privilegios', $privilegio
        );

        $this->assertApiResponse($privilegio);
    }

    /**
     * @test
     */
    public function test_read_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/privilegios/'.$privilegio->id
        );

        $this->assertApiResponse($privilegio->toArray());
    }

    /**
     * @test
     */
    public function test_update_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();
        $editedprivilegio = factory(privilegio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/privilegios/'.$privilegio->id,
            $editedprivilegio
        );

        $this->assertApiResponse($editedprivilegio);
    }

    /**
     * @test
     */
    public function test_delete_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/privilegios/'.$privilegio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/privilegios/'.$privilegio->id
        );

        $this->response->assertStatus(404);
    }
}
