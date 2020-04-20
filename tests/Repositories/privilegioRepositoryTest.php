<?php namespace Tests\Repositories;

use App\Models\privilegio;
use App\Repositories\privilegioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class privilegioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var privilegioRepository
     */
    protected $privilegioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->privilegioRepo = \App::make(privilegioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_privilegio()
    {
        $privilegio = factory(privilegio::class)->make()->toArray();

        $createdprivilegio = $this->privilegioRepo->create($privilegio);

        $createdprivilegio = $createdprivilegio->toArray();
        $this->assertArrayHasKey('id', $createdprivilegio);
        $this->assertNotNull($createdprivilegio['id'], 'Created privilegio must have id specified');
        $this->assertNotNull(privilegio::find($createdprivilegio['id']), 'privilegio with given id must be in DB');
        $this->assertModelData($privilegio, $createdprivilegio);
    }

    /**
     * @test read
     */
    public function test_read_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();

        $dbprivilegio = $this->privilegioRepo->find($privilegio->id);

        $dbprivilegio = $dbprivilegio->toArray();
        $this->assertModelData($privilegio->toArray(), $dbprivilegio);
    }

    /**
     * @test update
     */
    public function test_update_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();
        $fakeprivilegio = factory(privilegio::class)->make()->toArray();

        $updatedprivilegio = $this->privilegioRepo->update($fakeprivilegio, $privilegio->id);

        $this->assertModelData($fakeprivilegio, $updatedprivilegio->toArray());
        $dbprivilegio = $this->privilegioRepo->find($privilegio->id);
        $this->assertModelData($fakeprivilegio, $dbprivilegio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_privilegio()
    {
        $privilegio = factory(privilegio::class)->create();

        $resp = $this->privilegioRepo->delete($privilegio->id);

        $this->assertTrue($resp);
        $this->assertNull(privilegio::find($privilegio->id), 'privilegio should not exist in DB');
    }
}
