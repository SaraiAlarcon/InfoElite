<?php namespace Tests\Repositories;

use App\Models\apoderado;
use App\Repositories\apoderadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class apoderadoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var apoderadoRepository
     */
    protected $apoderadoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->apoderadoRepo = \App::make(apoderadoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_apoderado()
    {
        $apoderado = factory(apoderado::class)->make()->toArray();

        $createdapoderado = $this->apoderadoRepo->create($apoderado);

        $createdapoderado = $createdapoderado->toArray();
        $this->assertArrayHasKey('id', $createdapoderado);
        $this->assertNotNull($createdapoderado['id'], 'Created apoderado must have id specified');
        $this->assertNotNull(apoderado::find($createdapoderado['id']), 'apoderado with given id must be in DB');
        $this->assertModelData($apoderado, $createdapoderado);
    }

    /**
     * @test read
     */
    public function test_read_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();

        $dbapoderado = $this->apoderadoRepo->find($apoderado->id);

        $dbapoderado = $dbapoderado->toArray();
        $this->assertModelData($apoderado->toArray(), $dbapoderado);
    }

    /**
     * @test update
     */
    public function test_update_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();
        $fakeapoderado = factory(apoderado::class)->make()->toArray();

        $updatedapoderado = $this->apoderadoRepo->update($fakeapoderado, $apoderado->id);

        $this->assertModelData($fakeapoderado, $updatedapoderado->toArray());
        $dbapoderado = $this->apoderadoRepo->find($apoderado->id);
        $this->assertModelData($fakeapoderado, $dbapoderado->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_apoderado()
    {
        $apoderado = factory(apoderado::class)->create();

        $resp = $this->apoderadoRepo->delete($apoderado->id);

        $this->assertTrue($resp);
        $this->assertNull(apoderado::find($apoderado->id), 'apoderado should not exist in DB');
    }
}
