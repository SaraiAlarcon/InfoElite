<?php namespace Tests\Repositories;

use App\Models\grado;
use App\Repositories\gradoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class gradoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var gradoRepository
     */
    protected $gradoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->gradoRepo = \App::make(gradoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_grado()
    {
        $grado = factory(grado::class)->make()->toArray();

        $createdgrado = $this->gradoRepo->create($grado);

        $createdgrado = $createdgrado->toArray();
        $this->assertArrayHasKey('id', $createdgrado);
        $this->assertNotNull($createdgrado['id'], 'Created grado must have id specified');
        $this->assertNotNull(grado::find($createdgrado['id']), 'grado with given id must be in DB');
        $this->assertModelData($grado, $createdgrado);
    }

    /**
     * @test read
     */
    public function test_read_grado()
    {
        $grado = factory(grado::class)->create();

        $dbgrado = $this->gradoRepo->find($grado->id);

        $dbgrado = $dbgrado->toArray();
        $this->assertModelData($grado->toArray(), $dbgrado);
    }

    /**
     * @test update
     */
    public function test_update_grado()
    {
        $grado = factory(grado::class)->create();
        $fakegrado = factory(grado::class)->make()->toArray();

        $updatedgrado = $this->gradoRepo->update($fakegrado, $grado->id);

        $this->assertModelData($fakegrado, $updatedgrado->toArray());
        $dbgrado = $this->gradoRepo->find($grado->id);
        $this->assertModelData($fakegrado, $dbgrado->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_grado()
    {
        $grado = factory(grado::class)->create();

        $resp = $this->gradoRepo->delete($grado->id);

        $this->assertTrue($resp);
        $this->assertNull(grado::find($grado->id), 'grado should not exist in DB');
    }
}
