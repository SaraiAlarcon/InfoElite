<?php namespace Tests\Repositories;

use App\Models\aula;
use App\Repositories\aulaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class aulaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var aulaRepository
     */
    protected $aulaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->aulaRepo = \App::make(aulaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_aula()
    {
        $aula = factory(aula::class)->make()->toArray();

        $createdaula = $this->aulaRepo->create($aula);

        $createdaula = $createdaula->toArray();
        $this->assertArrayHasKey('id', $createdaula);
        $this->assertNotNull($createdaula['id'], 'Created aula must have id specified');
        $this->assertNotNull(aula::find($createdaula['id']), 'aula with given id must be in DB');
        $this->assertModelData($aula, $createdaula);
    }

    /**
     * @test read
     */
    public function test_read_aula()
    {
        $aula = factory(aula::class)->create();

        $dbaula = $this->aulaRepo->find($aula->id);

        $dbaula = $dbaula->toArray();
        $this->assertModelData($aula->toArray(), $dbaula);
    }

    /**
     * @test update
     */
    public function test_update_aula()
    {
        $aula = factory(aula::class)->create();
        $fakeaula = factory(aula::class)->make()->toArray();

        $updatedaula = $this->aulaRepo->update($fakeaula, $aula->id);

        $this->assertModelData($fakeaula, $updatedaula->toArray());
        $dbaula = $this->aulaRepo->find($aula->id);
        $this->assertModelData($fakeaula, $dbaula->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_aula()
    {
        $aula = factory(aula::class)->create();

        $resp = $this->aulaRepo->delete($aula->id);

        $this->assertTrue($resp);
        $this->assertNull(aula::find($aula->id), 'aula should not exist in DB');
    }
}
