<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\pagos;

class pagosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pagos()
    {
        $pagos = factory(pagos::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pagos', $pagos
        );

        $this->assertApiResponse($pagos);
    }

    /**
     * @test
     */
    public function test_read_pagos()
    {
        $pagos = factory(pagos::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pagos/'.$pagos->id
        );

        $this->assertApiResponse($pagos->toArray());
    }

    /**
     * @test
     */
    public function test_update_pagos()
    {
        $pagos = factory(pagos::class)->create();
        $editedpagos = factory(pagos::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pagos/'.$pagos->id,
            $editedpagos
        );

        $this->assertApiResponse($editedpagos);
    }

    /**
     * @test
     */
    public function test_delete_pagos()
    {
        $pagos = factory(pagos::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pagos/'.$pagos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pagos/'.$pagos->id
        );

        $this->response->assertStatus(404);
    }
}
