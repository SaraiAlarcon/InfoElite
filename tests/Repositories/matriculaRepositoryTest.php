<?php namespace Tests\Repositories;

use App\Models\matricula;
use App\Repositories\matriculaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class matriculaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var matriculaRepository
     */
    protected $matriculaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->matriculaRepo = \App::make(matriculaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_matricula()
    {
        $matricula = factory(matricula::class)->make()->toArray();

        $createdmatricula = $this->matriculaRepo->create($matricula);

        $createdmatricula = $createdmatricula->toArray();
        $this->assertArrayHasKey('id', $createdmatricula);
        $this->assertNotNull($createdmatricula['id'], 'Created matricula must have id specified');
        $this->assertNotNull(matricula::find($createdmatricula['id']), 'matricula with given id must be in DB');
        $this->assertModelData($matricula, $createdmatricula);
    }

    /**
     * @test read
     */
    public function test_read_matricula()
    {
        $matricula = factory(matricula::class)->create();

        $dbmatricula = $this->matriculaRepo->find($matricula->id);

        $dbmatricula = $dbmatricula->toArray();
        $this->assertModelData($matricula->toArray(), $dbmatricula);
    }

    /**
     * @test update
     */
    public function test_update_matricula()
    {
        $matricula = factory(matricula::class)->create();
        $fakematricula = factory(matricula::class)->make()->toArray();

        $updatedmatricula = $this->matriculaRepo->update($fakematricula, $matricula->id);

        $this->assertModelData($fakematricula, $updatedmatricula->toArray());
        $dbmatricula = $this->matriculaRepo->find($matricula->id);
        $this->assertModelData($fakematricula, $dbmatricula->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_matricula()
    {
        $matricula = factory(matricula::class)->create();

        $resp = $this->matriculaRepo->delete($matricula->id);

        $this->assertTrue($resp);
        $this->assertNull(matricula::find($matricula->id), 'matricula should not exist in DB');
    }
}
