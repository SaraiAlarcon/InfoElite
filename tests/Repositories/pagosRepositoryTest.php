<?php namespace Tests\Repositories;

use App\Models\pagos;
use App\Repositories\pagosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class pagosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var pagosRepository
     */
    protected $pagosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pagosRepo = \App::make(pagosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pagos()
    {
        $pagos = factory(pagos::class)->make()->toArray();

        $createdpagos = $this->pagosRepo->create($pagos);

        $createdpagos = $createdpagos->toArray();
        $this->assertArrayHasKey('id', $createdpagos);
        $this->assertNotNull($createdpagos['id'], 'Created pagos must have id specified');
        $this->assertNotNull(pagos::find($createdpagos['id']), 'pagos with given id must be in DB');
        $this->assertModelData($pagos, $createdpagos);
    }

    /**
     * @test read
     */
    public function test_read_pagos()
    {
        $pagos = factory(pagos::class)->create();

        $dbpagos = $this->pagosRepo->find($pagos->id);

        $dbpagos = $dbpagos->toArray();
        $this->assertModelData($pagos->toArray(), $dbpagos);
    }

    /**
     * @test update
     */
    public function test_update_pagos()
    {
        $pagos = factory(pagos::class)->create();
        $fakepagos = factory(pagos::class)->make()->toArray();

        $updatedpagos = $this->pagosRepo->update($fakepagos, $pagos->id);

        $this->assertModelData($fakepagos, $updatedpagos->toArray());
        $dbpagos = $this->pagosRepo->find($pagos->id);
        $this->assertModelData($fakepagos, $dbpagos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pagos()
    {
        $pagos = factory(pagos::class)->create();

        $resp = $this->pagosRepo->delete($pagos->id);

        $this->assertTrue($resp);
        $this->assertNull(pagos::find($pagos->id), 'pagos should not exist in DB');
    }
}
